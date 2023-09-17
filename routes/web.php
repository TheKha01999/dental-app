<?php

use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Client\ProductsController as ClientProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('client.pages.Home.home');
// })->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Luu y auth ở đây nên check có ng đăng nhập chưa ở link này vs email veryfied ở đây luôn

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', function () {
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
Route::get('home/blog', function () {
    return view('client.pages.Blog.blog');
})->name('home.blog');

Route::get('home/product', [ClientProductsController::class, 'index'])->name('home.product');
Route::get('home/product/{id}', [ClientProductsController::class, 'detail'])->name('home.product.detail');


Route::get('admin', function () {
    return view('admin.layout.master');
})->name('admin.master');


//Admin Management
Route::prefix('admin')->name('admin.')->group(function () {
    //Product Categories table
    Route::resource('product_categories', ProductCategoriesController::class);

    //Products table
    Route::resource('products', ProductsController::class);
    Route::post('products/slug', [ProductsController::class, 'createSlug'])->name('products.create.slug');
});
