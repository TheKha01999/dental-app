<?php

use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Services\ServiceCategoryController;
use App\Http\Controllers\Admin\Services\ServiceController;
use App\Http\Controllers\Client\About\ClientAboutController;
use App\Http\Controllers\Client\Blog\ClientBlogController;
use App\Http\Controllers\Client\Doctor\ClientDoctorController;
use App\Http\Controllers\Client\Faqs\ClientFaqsController;
use App\Http\Controllers\Client\Home\ClientHomeController;
use App\Http\Controllers\Client\ProductsController as ClientProductsController;
use App\Http\Controllers\Client\Services\ClientServicesController;
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

//Page Home of Client Management Below
Route::get('/', [ClientHomeController::class, 'index'])->name('home');

//Client Management
Route::prefix('home')->name('home.')->group(function () {
    //Page About
    Route::get('about', [ClientAboutController::class, 'index'])->name('about');

    //Page Doctor
    Route::get('doctors', [ClientDoctorController::class, 'index'])->name('doctors');

    //Pgae Faqs
    Route::get('faqs', [ClientFaqsController::class, 'index'])->name('faqs');

    //Page Services
    Route::get('services', [ClientServicesController::class, 'index'])->name('services');

    //Page Product
    Route::get('product', [ClientProductsController::class, 'index'])->name('product');
    Route::get('product/{id}', [ClientProductsController::class, 'detail'])->name('product.detail');
    Route::get('product/single/{id}', [ClientProductsController::class, 'showSingle'])->name('product.single');

    //Page Blog
    Route::get('blog/{id}', [ClientBlogController::class, 'index'])->name('blog');
    Route::get('blog/detail/{id}', [ClientBlogController::class, 'detail'])->name('blog.detail');
});

//Admin Management
Route::prefix('admin')->name('admin.')->group(function () {
    //Product Categories table
    Route::resource('product_categories', ProductCategoriesController::class);

    //Products table
    Route::resource('products', ProductsController::class);
    Route::post('products/slug', [ProductsController::class, 'createSlug'])->name('products.create.slug');

    //Blog Categories table
    Route::resource('blog_categories', BlogCategoryController::class);

    //Blogs Table
    Route::resource('blogs', BlogController::class);
    Route::post('blogs/slug', [BlogController::class, 'createSlug'])->name('blogs.create.slug');
    Route::post('blogs/ckeditor-upload-image', [BlogController::class, 'uploadImage'])->name('blogs.ckedit.upload.image');

    //Branchs table
    Route::resource('branchs', BranchController::class);

    //Service_categories table
    Route::resource('service_categories', ServiceCategoryController::class);

    //Services table
    Route::resource('services', ServiceController::class);
    Route::post('services/slug', [ServiceController::class, 'createSlug'])->name('services.create.slug');
    Route::post('services/ckeditor-upload-image', [ServiceController::class, 'uploadImage'])->name('services.ckedit.upload.image');

    //Doctors table
    Route::resource('doctors', DoctorController::class);
});

Route::get('admin', function () {
    return view('admin.layout.master');
})->name('admin.master');
