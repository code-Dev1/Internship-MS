<?php

use App\Http\Controllers\back\ApplicationController;
use App\Http\Controllers\back\CompanyController;
use App\Http\Controllers\back\dashboard\DashboradController;
use App\Http\Controllers\back\InternshipController;
use App\Http\Controllers\back\language\LanguadeController;
use App\Http\Controllers\back\SettingController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\front\InternshipController as FrontInternshipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role'])->group(function () {
    // Route::prefix('admin')->middleware(['auth', 'role'])->group(function () {
    Route::get('/dashboard', [DashboradController::class, 'index'])->name('dashboard');
    Route::resource('/user', UserController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/internship', InternshipController::class);
    Route::resource('/application', ApplicationController::class);
    Route::get('/locale/{locale}', [LanguadeController::class, 'index'])->name('locale');
    Route::put('/accepted/{accept}', [ApplicationController::class, 'accepted'])->name('accepted.update');
    Route::put('/rejected/{reject}', [ApplicationController::class, 'rejected'])->name('reject.update');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.get');
    Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
});


Route::get('/', function () {
    return view('front.home');
})->name('home');


// front routes 

Route::get('internships', [FrontInternshipController::class, 'index'])->name('front.int');
Route::get('/internshipDescription/{int}', [FrontInternshipController::class, 'singleInternship'])->name('front.single');
Route::post('/internshipDescription', [FrontInternshipController::class, 'store'])->name('apply.store')->middleware('auth');






Route::get('home', function () {
    return view('front.home');
})->name('home');
Route::get('about', function () {
    return view('front.about');
})->name('about');
Route::get('contact', function () {
    return view('front.contact');
})->name('contact');

Route::fallback(function () {
    return view('404');
});

require __DIR__ . '/auth.php';
