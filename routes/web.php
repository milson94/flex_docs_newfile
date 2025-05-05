<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GoogleController;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Your User model

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\CVController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController; // Assuming this controller shows the CV form
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default welcome page (if you have one)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// --- Core CV Generation Flow ---

Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');


Route::get('/login/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        // Find or create user
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id, // Use a dedicated column like 'google_id'
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token, // Optional: Store token
            'google_refresh_token' => $googleUser->refreshToken, // Optional: Store refresh token
            'password' => isset($user->password) ? $user->password : Hash::make(Str::random(24)) // Handle password if user didn't exist
        ]);

        Auth::login($user, true); // Log in the user (true remembers them)

        return redirect('/dashboard'); // Or wherever you want logged-in users to go

    } catch (\Exception $e) {
        // Log the error: Log::error($e->getMessage());
        return redirect('/login')->withErrors(['google_login' => 'Unable to login using Google. Please try again. Error: ' . $e->getMessage()]);
    }
})->name('google.callback');



Route::post('/cv/generate-with-data/{templateName}', [CVController::class, 'generateWithData'])
    ->middleware('auth') // Ensure user is logged in
    ->name('cv.generate_with_data');
    
// 1. Route to SHOW the template selection page
// Access: Anyone (or logged-in users if needed)
// View: resources/views/cv_templates.blade.php
// Controller Action: CVController@templates
Route::get('/cv/templates', [CVController::class, 'templates'])->name('cv.templates');

// 2. Route to SHOW the CV form page
// Access: Logged-in users (implied by your 'home' route often being auth-protected)
// Controller Action: HomeController@index (or whichever controller returns the form view)
// Note: This route receives the '?template=templateX' query parameter from the selection page
// Ensure this route is protected by 'auth' middleware if necessary (often done in RouteServiceProvider or controller constructor)
Route::get('/home', [HomeController::class, 'index'])->name('home'); // Keep this as is, assuming it shows the form

// 3. Route to HANDLE the form submission, generate PDF, and initiate download
// Access: Logged-in users
// Controller Action: CVController@preview (This method now handles the PDF generation and download)
// Method: POST (because it's handling form submission)
// Note: This route MUST be within the 'auth' middleware group if form access requires login.
// The form action should be: action="{{ route('cv.preview') }}" method="POST"
Route::post('/cv/preview', [CVController::class, 'preview'])
    ->middleware('auth') // Apply auth middleware directly here or ensure the group below covers it
    ->name('cv.preview');

// --- Other Routes ---

// Laravel's built-in Authentication Routes (Login, Register, etc.)
Auth::routes();

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth') // Ensure only logged-in users can logout
    ->name('logout');

// Google Authentication Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Admin Authentication Routes & Admin Area
Route::prefix('admin')->name('admin.')->group(function () { // Added name prefix for convenience
    // Admin Login Routes
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login'); // admin.login
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit'); // admin.login.submit

    // Admin Authenticated Routes
    Route::middleware(['auth:admin'])->group(function () {
        // Corrected: Use AdminController@index for the dashboard landing page
        Route::get('/', [AdminController::class, 'index'])->name('dashboard'); // admin.dashboard
        // Removed redundant route pointing to login controller for dashboard
        // Route::get('/dashboard', [AdminLoginController::class, 'login'])->name('admin.dashboard'); // Redundant/Incorrect
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout'); // admin.logout
        // Add other admin routes here...
    });
});

// Other Authenticated User Routes (Optional Grouping)
Route::middleware('auth')->group(function () {
    // Route to SAVE CV data to database (if you have a separate "Save" button/feature)
    Route::post('/cv/store', [CVController::class, 'store'])->name('cv.store');

    // User Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Note: cv.preview is already defined above with middleware. You could move it inside this group
    // if you prefer, but defining it separately as done above is also fine.
});

// --- Commented Out Redundant Route ---
// Route::get('/cv/download/{template}', [CVController::class, 'download'])->name('cv.download'); // Removed - Handled by cv.preview POST route now