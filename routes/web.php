<?php

use App\Http\Controllers\Admin\Appointment\BookingController;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\Cart\CartController;
use App\Http\Controllers\Admin\Dashboard\AdminController;
use App\Http\Controllers\Admin\Dashboard\UserController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Services\ServiceCategoryController;
use App\Http\Controllers\Admin\Services\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Client\About\ClientAboutController;
use App\Http\Controllers\Client\Appointment\ClientBookingController;
use App\Http\Controllers\Client\Blog\ClientBlogController;
use App\Http\Controllers\Client\CheckOut\OrderController;
use App\Http\Controllers\Client\Doctor\ClientDoctorController;
use App\Http\Controllers\Client\Faqs\ClientFaqsController;
use App\Http\Controllers\Client\Google\GoogleController;
use App\Http\Controllers\Client\Home\ClientHomeController;
use App\Http\Controllers\Client\ProductsController as ClientProductsController;
use App\Http\Controllers\Client\Services\ClientServicesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

    $bookings = DB::table('bookings')
        ->select('bookings.*', 'branchs.name as branch_name', 'service_categories.name as service_name', 'doctors.name as doctor_name', 'booking_times.time as time', 'booking_status.status as status', 'users.name as name')
        ->where('bookings.user_id', Auth::user()->id)
        ->join('branchs', 'branchs.id', '=', 'bookings.branch_id')
        ->join('service_categories', 'service_categories.id', '=', 'bookings.service_id')
        ->join('doctors', 'doctors.id', '=', 'bookings.doctor_id')
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->join('booking_times', 'booking_times.code', '=', 'bookings.time_code')
        ->join('booking_status', 'booking_status.code', '=', 'bookings.status_code')
        ->orderBy('bookings.created_at', 'desc')
        ->get();
    // dd($bookings);

    return view('dashboard', ['bookings' => $bookings]);
})->middleware(['auth', 'verified', 'auth.checkadmin'])->name('dashboard');
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
    Route::get('doctors', [ClientDoctorController::class, 'showAllDoctor'])->name('allDoctors');
    Route::get('doctors/detail/{id}', [ClientDoctorController::class, 'showSingleDoctor'])->name('singleDoctor');

    //Pgae Faqs
    Route::get('faqs', [ClientFaqsController::class, 'index'])->name('faqs');

    //Page Services
    Route::get('services/{id}', [ClientServicesController::class, 'showServicePost'])->name('services');

    //Page Product
    Route::get('product', [ClientProductsController::class, 'index'])->name('product');
    Route::get('product/{id}', [ClientProductsController::class, 'detail'])->name('product.detail');
    Route::get('product/single/{id}', [ClientProductsController::class, 'showSingle'])->name('product.single');

    //Page Blog
    Route::get('blog/{id}', [ClientBlogController::class, 'index'])->name('blog');
    Route::get('blog/detail/{id}', [ClientBlogController::class, 'detail'])->name('blog.detail');

    //Page Appointmnet
    Route::get('appointment', [ClientBookingController::class, 'index'])->name('appointment')->middleware(['auth', 'auth.checkadmin']);
    Route::post('appointment/store', [ClientBookingController::class, 'store'])->name('appointment.store')->middleware(['auth', 'auth.checkadmin']);
    Route::post('appointment/show-doctor-ajax', [ClientBookingController::class, 'showDoctor'])->name('appointment.show-doctor-ajax');

    //Page cart
    // Route::get('product/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('product.add-to-cart');
    Route::middleware('auth')->group(function () {
        Route::get('product/add-to-cart/{productId}/{qty?}', [CartController::class, 'addToCart'])->name('product.add-to-cart');
        Route::get('product/delete-item-in-cart/{productId}', [CartController::class, 'deleteItem'])->name('product.delete-item-in-cart');
        Route::get('product/update-item-in-cart/{productId}/{qty?}', [CartController::class, 'updateItem'])->name('product.update-item-in-cart');
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('product/emmptyCart', [CartController::class, 'emmptyCart'])->name('product.emmptyCart');
        Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

        Route::post('placeorder', [OrderController::class, 'placeOrder'])->name('place-order');
        Route::get('vnpay-callback', [OrderController::class, 'vnpayCallback'])->name('vnpay-callback');
    });
});
//Login with google
Route::get('google-redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('google-callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('check', function () {
    dd(session()->get('cart'));
});

Route::get('test-send-sms', function () {
    $sid = env('TWILIO_ACCOUNT_SID');
    $token = env('TWILIO_AUTH_TOKEN');
    $client = new Twilio\Rest\Client($sid, $token);
    // Use the Client to make requests to the Twilio REST API
    $client->messages->create(
        // The number you'd like to send the message to
        '+840777171086',
        [
            // A Twilio phone number you purchased at https://console.twilio.com
            'from' => env('TWILIO_PHONE_NUMBER'),
            // The body of the text message you'd like to send
            'body' => "Test Send SMS"
        ]
    );
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Admin Management
Route::prefix('admin')->middleware('auth.admin')->name('admin.')->group(function () {
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
    Route::post('doctors/ckeditor-upload-image', [DoctorController::class, 'uploadImage'])->name('doctors.ckedit.upload.image');

    //Bookings Table
    Route::resource('bookings', BookingController::class);
    Route::post('bookings/show-doctor-ajax', [BookingController::class, 'showDoctor'])->name('bookings.show-doctor-ajax');

    //User Controller
    Route::resource('users', UserController::class);
    Route::post('users/update-user-password/{user}', [UserController::class, 'updatePassword'])->name('users.update-user-password');

    //Admin Controller
    Route::resource('admins', AdminController::class);
    Route::post('admins/update-admin-password/{admin}', [AdminController::class, 'updatePassword'])->name('admins.update-admin-password');
});

Route::get('admin', function () {
    return view('admin.layout.master');
})->name('admin.master');
