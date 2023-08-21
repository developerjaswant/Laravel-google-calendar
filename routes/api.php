<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\BlogController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    // echo "hello";exit;
   
    Route::post('login', [ApiAuthController::class,'login']);
    Route::post('register', [ApiAuthController::class,'register']);  
    Route::post('product', [ApiAuthController::class,'product']);  
    Route::post('order', [ApiAuthController::class,'order']);  
    Route::post('banner', [ApiAuthController::class,'banner']);  
    Route::post('profile', [ApiAuthController::class,'profile']);  
    Route::post('Forgotpassword', [ApiAuthController::class,'Forgotpassword']);
});
Route::resource('blogs', BlogController::class);
