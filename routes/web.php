<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('home', function () {
    return view('client.pages.Home.home');
})->name('home');
Route::get('home/about', function () {
    return view('client.pages.About.about');
})->name('home.about');
Route::get('home/doctors', function () {
    return view('client.pages.Doctors.list');
})->name('home.doctors');
Route::get('home/faqs', function () {
    return view('client.pages.Faqs.faqs');
})->name('home.faqs');
Route::get('home/services', function () {
    return view('client.pages.OurServices.list');
})->name('home.services');
