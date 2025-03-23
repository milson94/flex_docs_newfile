<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf; // Use Spatie Laravel-PDF
use App\Models\CV; // Assuming you have a CV model
use Illuminate\Support\Facades\File;

class CVController extends Controller
{
    public function download($template)
    {
        // Retrieve CV data from session
        $sessionData = session('cv_data');

        // Retrieve CV data from the database (if available)
        $cv = CV::where('user_id', auth()->id())->latest()->first();

        // If CV exists in the database, fetch related data
        if ($cv) {
            $experiences = $cv->experiences;
            $educations = $cv->educations;
            $languages = $cv->languages;
            $additional_information = $cv->additional_information;
            $references = $cv->references;
        } else {
            // Fallback to session data if no CV is found in the database
            $experiences = $sessionData['experiences'] ?? [];
            $educations = $sessionData['educations'] ?? [];
            $languages = $sessionData['languages'] ?? [];
            $additional_information = $sessionData['additional_information'] ?? [];
            $references = $sessionData['references'] ?? [];
        }

        // Prepare data for the template
        $data = [
            'first_name' => $sessionData['first_name'],
            'last_name' => $sessionData['last_name'],
            'role' => $sessionData['role'],
            'email' => $sessionData['email'],
            'linkedin' => $sessionData['linkedin'],
            'location' => $sessionData['location'],
            'summary' => $sessionData['summary'],
            'place_of_birth' => $sessionData['place_of_birth'],
            'nationality' => $sessionData['nationality'],
            'phone_number' => $sessionData['phone_number'],
            'date_of_birth' => $sessionData['date_of_birth'],
            'gender' => $sessionData['gender'],
            'skills' => $sessionData['skills'],
            'experiences' => $experiences,
            'educations' => $educations,
            'languages' => $languages,
            'additional_information' => $additional_information,
            'references' => $references,
        ];

        // Define the PDF path
        $pdfPath = public_path('cv.pdf');

        // Generate the PDF directly from the Blade view
        Pdf::view("cv_templates." . str_replace('.blade', '', $template), $data)
            ->format('A4')
            ->margins(0, 0, 0, 0) // Set all margins to 0 to fill the entire page
            ->withBrowsershot(function ($browsershot) {
                $browsershot
                    ->setOption('printBackground', true) // Ensure background image is included
                    ->setTimeout(60000) // Increase timeout to 60 seconds
                    ->waitUntilNetworkIdle(); // Wait for network resources to load
            })
            ->save($pdfPath);

        // Return the PDF for download
        return response()->download($pdfPath, 'cv.pdf', [], 'inline')->deleteFileAfterSend(true);
    }

    public function preview(Request $request)
    {
        // Store CV data in session
        $cvData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'linkedin' => $request->input('linkedin'),
            'location' => $request->input('location'),
            'summary' => $request->input('summary'),
            'place_of_birth' => $request->input('place_of_birth'),
            'nationality' => $request->input('nationality'),
            'phone_number' => $request->input('phone_number'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'skills' => $request->input('skills'),
            'experiences' => [],
            'educations' => [],
            'languages' => [],
            'additional_information' => $request->input('additional_information') ?? [],
            'references' => [],
        ];

        // Process experiences
        if ($request->company_name) {
            foreach ($request->company_name as $key => $company) {
                $cvData['experiences'][] = [
                    'company_name' => $company,
                    'title' => $request->title[$key] ?? '',
                    'start_date' => $request->start_date[$key] ?? '',
                    'end_date' => $request->current[$key] ?? false ? '' : ($request->end_date[$key] ?? ''),
                    'company_description' => $request->company_description[$key] ?? '',
                    'achievements' => $request->achievements[$key] ?? '',
                    'duties' => $request->duties[$key] ?? [], // Keep as array for multiple duties
                ];
            }
        }

        // Process educations
        if ($request->school) {
            foreach ($request->school as $key => $school) {
                $cvData['educations'][] = [
                    'school' => $school,
                    'degree' => $request->degree[$key] ?? '',
                    'year_of_completion' => $request->year_of_completion[$key] ?? '',
                ];
            }
        }

        // Process languages
        if ($request->language) {
            foreach ($request->language as $key => $lang) {
                $cvData['languages'][] = [
                    'language' => $lang,
                    'speaking_level' => $request->speaking_level[$key] ?? '',
                    'reading_level' => $request->reading_level[$key] ?? '',
                    'writing_level' => $request->writing_level[$key] ?? '',
                ];
            }
        }

        // Process references
        if ($request->reference_name) {
            foreach ($request->reference_name as $key => $name) {
                $cvData['references'][] = [
                    'reference_name' => $name,
                    'reference_position' => $request->reference_position[$key] ?? '',
                    'reference_phone' => $request->reference_phone[$key] ?? '',
                ];
            }
        }

        $request->session()->put('cv_data', $cvData);

        // Redirect to template selection page
        return redirect()->route('cv.templates');
    }

    public function templates()
    {
        $templatePath = resource_path('views/cv_templates');
        $templateFiles = File::files($templatePath);
        $templates = [];

        foreach ($templateFiles as $file) {
            $templateName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $templates[] = $templateName;
        }

        return view('cv_templates', compact('templates'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'place_of_birth' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'company_name' => 'nullable|array',
            'title' => 'nullable|array',
            'company_description' => 'nullable|array',
            'achievements' => 'nullable|array',
            'duties' => 'nullable|array',
            'start_date' => 'nullable|array',
            'end_date' => 'nullable|array',
            'current' => 'nullable|array',
            'school' => 'nullable|array',
            'degree' => 'nullable|array',
            'year_of_completion' => 'nullable|array',
            'language' => 'nullable|array',
            'speaking_level' => 'nullable|array',
            'reading_level' => 'nullable|array',
            'writing_level' => 'nullable|array',
            'additional_information' => 'nullable|array',
            'reference_name' => 'nullable|array',
            'reference_position' => 'nullable|array',
            'reference_phone' => 'nullable|array',
            'skills' => 'nullable|string',
        ]);

        // Save the CV data to the database
        $cv = CV::create([
            'user_id' => auth()->id(),
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'role' => $validatedData['role'],
            'email' => $validatedData['email'],
            'linkedin' => $validatedData['linkedin'],
            'location' => $validatedData['location'],
            'summary' => $validatedData['summary'],
            'place_of_birth' => $validatedData['place_of_birth'],
            'nationality' => $validatedData['nationality'],
            'phone_number' => $validatedData['phone_number'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gender' => $validatedData['gender'],
            'skills' => $validatedData['skills'],
            'languages' => $this->formatLanguages($validatedData),
            'additional_information' => $validatedData['additional_information'],
            'references' => $this->formatReferences($validatedData),
        ]);

        // Save Experience
        if (!empty($validatedData['company_name'])) {
            foreach ($validatedData['company_name'] as $index => $companyName) {
                $cv->experiences()->create([
                    'company_name' => $companyName,
                    'title' => $validatedData['title'][$index] ?? '',
                    'company_description' => $validatedData['company_description'][$index] ?? '',
                    'achievements' => $validatedData['achievements'][$index] ?? '',
                    'duties' => $validatedData['duties'][$index] ?? [], // Store as array
                    'start_date' => $validatedData['start_date'][$index] ?? '',
                    'end_date' => $validatedData['current'][$index] ?? false ? null : ($validatedData['end_date'][$index] ?? ''),
                    'current' => $validatedData['current'][$index] ?? false,
                ]);
            }
        }

        // Save Education
        if (!empty($validatedData['school'])) {
            foreach ($validatedData['school'] as $index => $school) {
                $cv->educations()->create([
                    'school' => $school,
                    'degree' => $validatedData['degree'][$index] ?? '',
                    'year_of_completion' => $validatedData['year_of_completion'][$index] ?? '',
                ]);
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'CV salvo com sucesso!');
    }

    private function formatLanguages($data)
    {
        $languages = [];
        if (!empty($data['language'])) {
            foreach ($data['language'] as $index => $language) {
                $languages[] = [
                    'language' => $language,
                    'speaking_level' => $data['speaking_level'][$index] ?? '',
                    'reading_level' => $data['reading_level'][$index] ?? '',
                    'writing_level' => $data['writing_level'][$index] ?? '',
                ];
            }
        }
        return $languages;
    }

    private function formatReferences($data)
    {
        $references = [];
        if (!empty($data['reference_name'])) {
            foreach ($data['reference_name'] as $index => $name) {
                $references[] = [
                    'reference_name' => $name,
                    'reference_position' => $data['reference_position'][$index] ?? '',
                    'reference_phone' => $data['reference_phone'][$index] ?? '',
                ];
            }
        }
        return $references;
    }
}