<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Models\CV; // Assuming you might still want to save it later
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View; // Import View facade
use Illuminate\Support\Str;

class CVController extends Controller
{
    // Keep the templates method as it is
    public function templates()
    {
        $templatePath = resource_path('views/cv_templates');
        $templates = []; // Initialize as empty array

        // Check if the directory exists before trying to read files
        if (!File::isDirectory($templatePath)) {
            Log::error("Template directory not found: " . $templatePath);
            // Return the view with an empty templates array and maybe an error message
            return view('cv_templates', compact('templates'))->withErrors('Template directory not found.');
        }

        $templateFiles = File::files($templatePath);

        foreach ($templateFiles as $file) {
            $fileName = $file->getFilename(); // e.g., "template1.blade.php"

            // Ensure we only process actual .blade.php files
            if (str_ends_with($fileName, '.blade.php')) {
                // Use Str::beforeLast to get the part before ".blade.php"
                $templateName = Str::beforeLast($fileName, '.blade.php'); // Correctly gets "template1"

                // Optional but good: Check if the name follows the expected pattern
                if (strpos($templateName, 'template') === 0) {
                    $templates[] = $templateName; // Add the *correct* name to the array
                } else {
                    Log::warning("Skipping file in template directory (does not match 'template*' pattern): " . $fileName);
                }
            } else {
                 Log::warning("Skipping non-blade file in template directory: " . $fileName);
            }
        }

        // Sort templates naturally (template1, template2, template10)
        natsort($templates);
        $templates = array_values($templates); // Re-index array after sorting

        Log::info("Templates found: ", $templates); // Log the templates found
        Log::info('--- VERIFYING TEMPLATES IN CONTROLLER ---', $templates);

        return view('cv_templates', compact('templates')); // The view name is 'cv_templates'
    }

    // This method will now handle the form submission AND generate the PDF
    public function preview(Request $request)
    {
        // --- 1. Get Data ---
        Log::info("CV Generation request data:", $request->all());

        // You might want validation here before proceeding
        // $validatedData = $request->validate([...]); // Add validation rules

        $cvData = [
            'first_name' => $request->input('first_name', 'N/A'),
            'last_name' => $request->input('last_name', 'N/A'),
            'role' => $request->input('role', 'N/A'),
            'email' => $request->input('email', 'N/A'),
            'linkedin' => $request->input('linkedin', ''), // Use empty string for optional fields if needed by template
            'location' => $request->input('location', ''),
            'summary' => $request->input('summary', ''),
            'place_of_birth' => $request->input('place_of_birth', ''),
            'nationality' => $request->input('nationality', ''),
            'phone_number' => $request->input('phone_number', ''),
            'date_of_birth' => $request->input('date_of_birth', ''),
            'gender' => $request->input('gender', ''),
            'skills' => $request->input('skills', ''),
            'experiences' => $this->formatExperiences($request), // Helper function needed
            'educations' => $this->formatEducations($request),   // Helper function needed
            'languages' => $this->formatLanguages($request),     // Helper function needed
            'additional_information' => $request->input('additional_information', []),
            'references' => $this->formatReferences($request),     // Helper function needed
        ];

        // --- 2. Get Template ---
        $templateName = $request->input('template');
        Log::info("Template requested: {$templateName}");

        if (empty($templateName)) {
            Log::error("Template name is empty or not provided.");
            // Redirect back with an error
            return redirect()->back()->withInput()->withErrors(['template' => 'No template was selected or provided.']);
        }

        $templatePath = "cv_templates.{$templateName}";
        Log::info("Template view path: {$templatePath}");

        if (!View::exists($templatePath)) {
            Log::error("Template view not found: {$templatePath}");
            // Redirect back with an error
            return redirect()->back()->withInput()->withErrors(['template' => "The selected template ({$templateName}) could not be found."]);
        }

        // --- 3. Generate PDF ---
        // Define a temporary path for the PDF in the storage directory
        $pdfDirectory = storage_path('app/public/cv_exports'); // Store in storage/app/public
        $pdfName = 'cv_' . uniqid() . '.pdf';
        $pdfPath = $pdfDirectory . '/' . $pdfName;

        // Ensure the directory exists
        if (!File::isDirectory($pdfDirectory)) {
            File::makeDirectory($pdfDirectory, 0755, true, true);
        }

        try {
            Log::info("Attempting to generate PDF for template: {$templatePath} at path: {$pdfPath}");

            // Use Browsershot::html() or Browsershot::view() for better reliability
            // Option A: Render view to HTML first
             $html = view($templatePath, $cvData)->render();
             Browsershot::html($html)
                 ->setOption('printBackground', true) // Crucial for styles
                 // ->showBackground() // Alternative for some Browsershot versions
                 ->margins(10, 10, 10, 10) // Optional: Set margins in mm (top, right, bottom, left)
                 ->format('A4') // Or 'Letter', etc.
                 ->waitUntilNetworkIdle() // Wait for images/fonts if loaded from network
                 ->timeout(120) // Increase timeout (seconds) for complex pages
                 ->savePdf($pdfPath);

            // Option B: Use Browsershot::view() directly (often cleaner)
            /*
            Browsershot::view($templatePath, $cvData)
                ->setOption('printBackground', true)
                ->margins(10, 10, 10, 10)
                ->format('A4')
                ->waitUntilNetworkIdle()
                ->timeout(120)
                ->savePdf($pdfPath);
            */

            Log::info("PDF generated successfully: {$pdfPath}");

        } catch (\Exception $e) {
            Log::error("Browsershot PDF generation failed: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            // Delete temporary file if it exists but is potentially corrupt
             if (File::exists($pdfPath)) {
                  File::delete($pdfPath);
             }
            // Redirect back with a generic error
            return redirect()->back()->withInput()->withErrors(['pdf_error' => 'Could not generate the CV PDF. Please check server logs or contact support. Error: ' . $e->getMessage()]);
        }

        // --- 4. Return Download Response ---
        if (!File::exists($pdfPath)) {
            Log::error("PDF file was not found after generation attempt: {$pdfPath}");
            return redirect()->back()->withInput()->withErrors(['pdf_error' => 'Failed to create the PDF file after generation.']);
        }

        // Clean the desired filename for the user
        $downloadName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $cvData['first_name'] . '_' . $cvData['last_name']) . '_CV.pdf';

        return response()->download($pdfPath, $downloadName)->deleteFileAfterSend(true);
    }

    // --- Helper functions to format array data from request ---
    // Adapt these based on your actual form input names (e.g., experiences[0][company_name])

    private function formatExperiences(Request $request)
    {
        $experiences = [];
        $companyNames = $request->input('company_name', []); // Assuming 'company_name' is an array
        foreach ($companyNames as $index => $companyName) {
            if (!empty($companyName)) { // Only add if company name is provided
                $experiences[] = [
                    'company_name' => $companyName,
                    'title' => $request->input("title.{$index}", ''),
                    'company_description' => $request->input("company_description.{$index}", ''),
                    'achievements' => $request->input("achievements.{$index}", ''),
                    'duties' => $request->input("duties.{$index}", []), // Assuming duties might be multi-select or similar
                    'start_date' => $request->input("start_date.{$index}", ''),
                    'end_date' => $request->input("current.{$index}") ? null : $request->input("end_date.{$index}", ''),
                    'current' => (bool) $request->input("current.{$index}", false),
                ];
            }
        }
        return $experiences;
    }

    private function formatEducations(Request $request)
    {
        $educations = [];
        $schools = $request->input('school', []);
        foreach ($schools as $index => $school) {
            if (!empty($school)) {
                $educations[] = [
                    'school' => $school,
                    'degree' => $request->input("degree.{$index}", ''),
                    'year_of_completion' => $request->input("year_of_completion.{$index}", ''),
                    // Add other education fields if needed
                ];
            }
        }
        return $educations;
    }

     // Use the one from your original 'store' method if it matches the form names
     private function formatLanguages(Request $request)
     {
         $languages = [];
         $languageNames = $request->input('language', []); // Ensure form name is 'language[]'
         if (!empty($languageNames)) {
             foreach ($languageNames as $index => $language) {
                 if (!empty($language)) {
                     $languages[] = [
                         'language' => $language,
                         'speaking_level' => $request->input("speaking_level.{$index}", ''),
                         'reading_level' => $request->input("reading_level.{$index}", ''),
                         'writing_level' => $request->input("writing_level.{$index}", ''),
                     ];
                 }
             }
         }
         return $languages;
     }

     // Use the one from your original 'store' method if it matches the form names
     private function formatReferences(Request $request)
     {
         $references = [];
         $refNames = $request->input('reference_name', []); // Ensure form name is 'reference_name[]'
         if (!empty($refNames)) {
             foreach ($refNames as $index => $name) {
                 if (!empty($name)) {
                     $references[] = [
                         'reference_name' => $name,
                         'reference_position' => $request->input("reference_position.{$index}", ''),
                         'reference_phone' => $request->input("reference_phone.{$index}", ''),
                     ];
                 }
             }
         }
         return $references;
     }


    // The 'store' method can remain if you want a separate action to SAVE the CV to the database
    // You might call this via AJAX after successful download, or have a separate "Save CV" button.
    public function store(Request $request)
    {
       // Your existing store logic remains here...
       // ...
       return redirect()->back()->with('success', 'CV salvo com sucesso!');
    }

    // The old 'download' method is now redundant because 'preview' handles the download.
    // You can remove it or comment it out.
    /*
    public function download($template)
    {
        // This logic is now integrated into the 'preview' method
    }
    */
}