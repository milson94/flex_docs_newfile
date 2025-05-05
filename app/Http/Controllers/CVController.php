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
    // templates method remains the same
    public function templates()
    {
        $templatePath = resource_path('views/cv_templates');
        $templates = []; // Initialize as empty array

        // Check if the directory exists before trying to read files
        if (!File::isDirectory($templatePath)) {
            Log::error("Template directory not found: " . $templatePath);
            return view('cv_templates', compact('templates'))->withErrors('Template directory not found.');
        }

        $templateFiles = File::files($templatePath);

        foreach ($templateFiles as $file) {
            $fileName = $file->getFilename();
            if (str_ends_with($fileName, '.blade.php')) {
                $templateName = Str::beforeLast($fileName, '.blade.php');
                if (strpos($templateName, 'template') === 0) {
                    $templates[] = $templateName;
                } else {
                    Log::warning("Skipping file in template directory (does not match 'template*' pattern): " . $fileName);
                }
            } else {
                 Log::warning("Skipping non-blade file in template directory: " . $fileName);
            }
        }

        natsort($templates);
        $templates = array_values($templates);

        Log::info("Templates found: ", $templates);
        Log::info('--- VERIFYING TEMPLATES IN CONTROLLER ---', $templates);

        return view('cv_templates', compact('templates'));
    }

    // Handles form submission and PDF generation
    public function preview(Request $request)
    {
        // --- 1. Get Data ---
        Log::info("CV Generation Request Data Received:", $request->all()); // Log raw data

        // Basic validation example (expand as needed)
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'template' => 'required|string',
        //     'experience.*.company_name' => 'nullable|string|max:255', // Example for array validation
        //     'experience.*.title' => 'nullable|string|max:255',
        //     'experience.*.start_date' => 'nullable|date',
        //     // Add more validation rules...
        // ]);

        $cvData = [
            'first_name' => $request->input('first_name', 'N/A'),
            'last_name' => $request->input('last_name', 'N/A'),
            'role' => $request->input('role', 'N/A'),
            'email' => $request->input('email', 'N/A'),
            'linkedin' => $request->input('linkedin', ''),
            'location' => $request->input('location', ''),
            'summary' => $request->input('summary', ''),
            'place_of_birth' => $request->input('place_of_birth', ''),
            'nationality' => $request->input('nationality', ''),
            'phone_number' => $request->input('phone_number', ''),
            'date_of_birth' => $request->input('date_of_birth', ''),
            'gender' => $request->input('gender', ''),
            'skills' => $request->input('skills', ''), // Skills are likely a single string or array handled directly
            // *** Call the CORRECTED helper functions ***
            'experiences' => $this->formatExperiences($request),
            'educations' => $this->formatEducations($request),
            'languages' => $this->formatLanguages($request),
            'additional_information' => $request->input('additional_information', []), // This was likely correct
            'references' => $this->formatReferences($request),
        ];

        Log::info("Formatted CV Data Prepared:", $cvData); // Log the data AFTER formatting

        // --- 2. Get Template ---
        $templateName = $request->input('template');
        Log::info("Template requested: {$templateName}");

        if (empty($templateName)) {
            Log::error("Template name is empty or not provided.");
            return redirect()->back()->withInput()->withErrors(['template' => 'No template was selected or provided.']);
        }

        $templatePath = "cv_templates.{$templateName}";
        Log::info("Template view path: {$templatePath}");

        if (!View::exists($templatePath)) {
            Log::error("Template view not found: {$templatePath}");
            return redirect()->back()->withInput()->withErrors(['template' => "The selected template ({$templateName}) could not be found."]);
        }

        // --- 3. Generate PDF ---
        $pdfDirectory = storage_path('app/public/cv_exports');
        $pdfName = 'cv_' . Str::uuid() . '.pdf'; // Use UUID for better uniqueness
        $pdfPath = $pdfDirectory . '/' . $pdfName;

        File::ensureDirectoryExists($pdfDirectory); // More robust way to ensure directory exists

        try {
            Log::info("Attempting to generate PDF for template: {$templatePath} at path: {$pdfPath}");

            // Option A: Render view to HTML first (often more reliable for complex JS/CSS)
            $html = view($templatePath, $cvData)->render();
            Browsershot::html($html)
                ->setOption('printBackground', true)
                ->margins(10, 10, 10, 10) // Use integers for margins if needed by your Browsershot version
                ->format('A4')
                ->waitUntilNetworkIdle(true) // Pass true to ensure JS execution finishes
                ->timeout(120)
                // ->setNodeBinary('/path/to/your/node') // Uncomment and set if node isn't in default PATH
                // ->setNpmBinary('/path/to/your/npm')  // Uncomment and set if npm isn't in default PATH
                ->savePdf($pdfPath);

             // Option B: Use Browsershot::view() directly
             /*
             Browsershot::view($templatePath, $cvData)
                 ->setOption('printBackground', true)
                 ->margins(10, 10, 10, 10)
                 ->format('A4')
                 ->waitUntilNetworkIdle(true)
                 ->timeout(120)
                 ->savePdf($pdfPath);
             */

            Log::info("PDF generated successfully: {$pdfPath}");

        } catch (\Exception $e) {
            Log::error("Browsershot PDF generation failed: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            if (File::exists($pdfPath)) {
                File::delete($pdfPath);
            }
            // Provide more specific error if possible, fallback to generic
            $errorMessage = 'Could not generate the CV PDF. Please check server logs or contact support.';
            if (str_contains($e->getMessage(), 'timeout')) {
                 $errorMessage = 'Could not generate the CV PDF: The process timed out. The CV might be too complex or the server is under heavy load.';
            } elseif (str_contains($e->getMessage(), 'Node.js') || str_contains($e->getMessage(), 'npm')) {
                 $errorMessage = 'Could not generate the CV PDF: Browsershot configuration issue. Please check Node.js/npm paths and installation.';
            } else {
                 $errorMessage .= ' Error: ' . $e->getMessage(); // Append original error in non-production env
            }

            return redirect()->back()->withInput()->withErrors(['pdf_error' => $errorMessage]);
        }

        // --- 4. Return Download Response ---
        if (!File::exists($pdfPath)) {
            Log::error("PDF file was not found after generation attempt: {$pdfPath}");
            return redirect()->back()->withInput()->withErrors(['pdf_error' => 'Failed to create the PDF file after generation.']);
        }

        $downloadName = Str::slug($cvData['first_name'] . '_' . $cvData['last_name'], '_') . '_CV.pdf';

        return response()->download($pdfPath, $downloadName)->deleteFileAfterSend(true);
    }

    // --- CORRECTED Helper functions ---

    private function formatExperiences(Request $request): array
    {
        $formattedExperiences = [];
        // Get the entire 'experience' array from the request
        $experienceData = $request->input('experience', []);

        // Check if it's actually an array before looping
        if (!is_array($experienceData)) {
             Log::warning("Experience data received is not an array.", ['data' => $experienceData]);
             return []; // Return empty if data format is wrong
        }

        foreach ($experienceData as $index => $exp) {
            // Ensure $exp is an array and has a key field (like company_name) to be considered valid
            if (is_array($exp) && !empty($exp['company_name'])) {
                $formattedExperiences[] = [
                    // Use null coalescing operator (??) for safe access
                    'company_name' => $exp['company_name'] ?? '',
                    'title' => $exp['title'] ?? '',
                    'company_description' => $exp['company_description'] ?? '',
                    'achievements' => $exp['achievements'] ?? '',
                    // Ensure duties is an array, even if it's empty or wasn't submitted
                    'duties' => isset($exp['duties']) && is_array($exp['duties']) ? array_filter($exp['duties']) : [],
                    'start_date' => $exp['start_date'] ?? '',
                    // Check 'current' checkbox value correctly
                    'current' => isset($exp['current']) && $exp['current'] == '1', // Check for '1' as value
                    'end_date' => (isset($exp['current']) && $exp['current'] == '1') ? null : ($exp['end_date'] ?? ''),
                ];
            } else {
                 // Log if an item in the array is invalid
                 Log::debug("Skipping invalid experience item at index {$index}.", ['item' => $exp]);
            }
        }
        return $formattedExperiences;
    }

    private function formatEducations(Request $request): array
    {
        $formattedEducations = [];
        // Get the entire 'education' array
        $educationData = $request->input('education', []);

        if (!is_array($educationData)) {
            Log::warning("Education data received is not an array.", ['data' => $educationData]);
            return [];
        }

        foreach ($educationData as $index => $edu) {
             if (is_array($edu) && !empty($edu['school'])) { // Check for school name
                $formattedEducations[] = [
                    'school' => $edu['school'] ?? '',
                    'degree' => $edu['degree'] ?? '',
                    'year_of_completion' => $edu['year_of_completion'] ?? '',
                ];
             } else {
                 Log::debug("Skipping invalid education item at index {$index}.", ['item' => $edu]);
             }
        }
        return $formattedEducations;
    }

     private function formatLanguages(Request $request): array
     {
         $formattedLanguages = [];
         // Get the entire 'languages' array
         $languageData = $request->input('languages', []); // Note: 'languages' (plural) based on form

         if (!is_array($languageData)) {
             Log::warning("Languages data received is not an array.", ['data' => $languageData]);
             return [];
         }

         foreach ($languageData as $index => $lang) {
              if (is_array($lang) && !empty($lang['language'])) { // Check for language name
                 $formattedLanguages[] = [
                     'language' => $lang['language'] ?? '',
                     'speaking_level' => $lang['speaking_level'] ?? '',
                     'reading_level' => $lang['reading_level'] ?? '',
                     'writing_level' => $lang['writing_level'] ?? '',
                 ];
              } else {
                  Log::debug("Skipping invalid language item at index {$index}.", ['item' => $lang]);
              }
         }
         return $formattedLanguages;
     }

     private function formatReferences(Request $request): array
     {
         $formattedReferences = [];
         // Get the entire 'references' array
         $referenceData = $request->input('references', []);

         if (!is_array($referenceData)) {
             Log::warning("References data received is not an array.", ['data' => $referenceData]);
             return [];
         }

         foreach ($referenceData as $index => $ref) {
             if (is_array($ref) && !empty($ref['reference_name'])) { // Check for reference name
                 $formattedReferences[] = [
                     'reference_name' => $ref['reference_name'] ?? '',
                     'reference_position' => $ref['reference_position'] ?? '',
                     'reference_phone' => $ref['reference_phone'] ?? '',
                 ];
             } else {
                 Log::debug("Skipping invalid reference item at index {$index}.", ['item' => $ref]);
             }
         }
         return $formattedReferences;
     }


    // store method remains the same
    public function store(Request $request)
    {
       // Your existing store logic remains here...
       // ...
       return redirect()->back()->with('success', 'CV salvo com sucesso!');
    }

    // download method is still redundant
    /*
    public function download($template)
    {
        // This logic is now integrated into the 'preview' method
    }
    */
}