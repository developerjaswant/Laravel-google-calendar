<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;
use App\Http\Controllers\EventController;

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



Route::group(['middleware' => 'auth'], function () {
	
	
    Route::get('/', [HomeController::class, 'home']);
	
// Route::get('/event', function () {
// 		$event = new Event;

// $event->name = 'A new full day event';
// $event->startDate = Carbon\Carbon::now();
// $event->endDate = Carbon\Carbon::now()->addDay();

// $event->save();
// 		$e = Event::get();
// 		dd($e);
// 	});

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	// Route::get('user-management', function () {
	// 	return view('laravel-examples/user-management');
	// })->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('admin/logout', [SessionsController::class, 'destroy']);
    Route::get('admin/login', [SessionsController::class, 'create'])->name('login');

    // Route::get('admin/login', function () {
	// 	return view('dashboard');
	// })->name('sign-up');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/register', [RegisterController::class, 'create']);
    Route::post('/admin/register', [RegisterController::class, 'store']);
    Route::get('/admin/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/admin/session', [SessionsController::class, 'store']);
	Route::get('/admin/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/admin/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/admin/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/admin/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});



    // category Controller
    Route::get('/admin/category',[CategoryController::class, 'index'])->name('admin.category.list');
    Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store',[CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}',[CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/admin/category/show/{id}',[CategoryController::class, 'show'])->name('admin.category.show');
// Product Controller 
Route::get('/admin/product',[ProductController::class, 'index'])->name('admin.product.list');
Route::get('/admin/product/create',[ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/store',[ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/edit/{id}',[ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/admin/product/update/{id}',[ProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/product/delete/{id}',[ProductController::class, 'destroy'])->name('admin.product.destroy');
Route::get('/admin/product/show/{id}',[ProductController::class, 'show'])->name('admin.product.show');

Route::get('/admin/slider','App\Http\Controllers\SliderController@index')->name('admin.slider.show');
Route::get('/admin/slider/create','App\Http\Controllers\SliderController@create')->name('admin.slider.create');
Route::post('/admin/slider/create','App\Http\Controllers\SliderController@store')->name('admin.slider.store');
Route::get('/admin/slider/edit/{id}','App\Http\Controllers\SliderController@edit')->name('admin.slider.edit');
Route::post('/admin/slider/edit/{id}','App\Http\Controllers\SliderController@update')->name('admin.slider.update');
Route::get('/admin/slider/delete/{id}','App\Http\Controllers\SliderController@destroy')->name('admin.slider.destroy');

Route::get('/admin/page','App\Http\Controllers\PageController@index')->name('admin.page.show');
Route::get('/admin/page/create','App\Http\Controllers\PageController@create')->name('admin.page.create');
Route::post('/admin/page/create','App\Http\Controllers\PageController@store')->name('admin.page.store');
Route::get('/admin/page/edit/{id}','App\Http\Controllers\PageController@edit')->name('admin.page.edit');
Route::post('/admin/page/edit/{id}','App\Http\Controllers\PageController@update')->name('admin.page.update');
Route::get('/admin/page/delete/{id}','App\Http\Controllers\PageController@destroy')->name('admin.page.destroy');



Route::group(['middleware' => 'auth'], function () {
Route::any('/admin/event','App\Http\Controllers\EventController@index')->name('admin.event.create');
Route::any('/admin/event/create','App\Http\Controllers\EventController@create')->name('admin.event.store');

});
Route::get('/home', 'App\Http\Controllers\sliderController@home');
Route::get('/home', 'App\Http\Controllers\PageController@home');
Route::get('/about', 'App\Http\Controllers\PageController@about');
Route::get('/service', 'App\Http\Controllers\PageController@service');
Route::get('/gallery', 'App\Http\Controllers\PageController@gallery');
Route::get('/contact', 'App\Http\Controllers\PageController@contact');
