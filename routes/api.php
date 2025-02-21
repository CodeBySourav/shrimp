<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

use App\Http\Controllers\Api\ApiController2;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProductCategory;
use App\Http\Controllers\Api\VendorFormSubmissionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/notifications', [ApiController2::class, 'getNotifications']);

Route::post('/login',[AuthController::class, 'login']); 
Route::post('/logout',[AuthController::class, 'logout']);

Route::post('/profile', [ApiController2::class, 'profile']);

Route::post('/get_products_by_name', [ApiController2::class, 'get_products_by_name']);

Route::post('/my_postings', [ApiController2::class, 'my_postings']);

Route::post('/product_price_details', [ApiController2::class, 'product_price_details']);

Route::post('/save-vendor-form', [ApiController2::class, 'store']);

Route::post('/contact', [ApiController2::class, 'contactstore']);
//////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);

Route::get('/all_vender', [AuthController::class, 'all_vender']);

Route::get('/contacts', [ContactController::class, 'index']); // Get all contacts
Route::get('/contacts/{id}', [ContactController::class, 'show']); // Get a specific contact

Route::get('/product-section/{section}', [ProductCategory::class, 'getProductsBySection']); 
Route::get('/product-categories/{id}', [ProductCategory::class, 'show']); // Get category by ID
 
Route::get('/vendor-postings', [VendorFormSubmissionController::class, 'getVendorPostings']);
 