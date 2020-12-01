<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'product']);
Route::get('/products/{slug}', [App\Http\Controllers\HomeController::class, 'productDetail']);
Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);
Route::get('/service/{slug}', [App\Http\Controllers\HomeController::class, 'serviceDetails']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function (){
	//Dashboard
	Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

	//Login
	Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

	//Register
	Route::get('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'showRegisterForm'])->name('admin.register');
	Route::post('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'register'])->name('admin.register.submit');

	//Logout
	Route::get('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

	//Category
	Route::resource('category', App\Http\Controllers\Admin\CategoriesController::class);

	//Products
	Route::post('/product/deleteimg/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'removeImage'])->name('admin.productImage.remove');
	Route::resource('product', App\Http\Controllers\Admin\ProductsController::class);

	//Slider
	Route::resource('slider', App\Http\Controllers\Admin\SlidersController::class);		

	//Service
	Route::resource('service', App\Http\Controllers\Admin\ServicesController::class);			

	//Blogs
	Route::resource('blog', App\Http\Controllers\Admin\BlogsController::class);				

	//Pages
	Route::resource('page', App\Http\Controllers\Admin\PagesController::class);		

	//Site Setting
	Route::get('/setting', [App\Http\Controllers\Admin\SettingsController::class, 'index']);	
	Route::post('/setting/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'update']);
});
