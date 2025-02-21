<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AuthCheckController;
use App\Http\Controllers\CorporateUserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\ShrimpProduct;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContactController;
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

    $product_category = ShrimpProduct::where('section', "Product Category")->get();
    return view('index', ['product_category' => $product_category]);
});


Route::get('/index', function () {


    return view('index');
});
 
Route::get('/vendor/register', [VendorController::class, 'showRegistrationForm']);
Route::post('/vendor/register', [VendorController::class, 'register'])->name('vendor.register.submit');
Route::get('corporate_users/register', [CorporateUserController::class, 'showRegistrationForm'])->name('corporate_users.register');
Route::post('/corporate_users/register', [CorporateUserController::class, 'register'])->name('corporate_users.register.submit');

Route::middleware('auth', 'role:2')->group(function () {

Route::get('/vender', [CorporateUserController::class, 'vender'])->name('corporate_users.all_vender');
Route::get('/awaiting_vender', [CorporateUserController::class, 'awaiting_vender'])->name('corporate_users.awaiting_vender');
Route::get('/all_posting', [CorporateUserController::class, 'all_posting'])->name('corporate_users.all_posting');
Route::get('/enquiries', [CorporateUserController::class, 'enquiries'])->name('corporate_users.enquiries');
 
Route::post('/change_venderstatus', [CorporateUserController::class, 'change_venderstatus'])->name('change_venderstatus');
Route::post('/change_status', [CorporateUserController::class, 'change_status'])->name('change_status');

// Route::get('/dashboard', [AuthCheckController::class, 'dashboard'])->name('dashboard');

// Route::get('/profile-view', [ProfileController::class, 'profile_view'])->name('profile');

Route::get('categories_corporate_users', [CorporateUserController::class, 'categories_corporate_users'])->name('categories_corporate_users');

Route::get('/add_corporateuser', [CorporateUserController::class, 'add_corporateuser'])->name('add_corporateuser');

Route::post('/get-user-details', [AjaxController::class, 'getProductNames'])->name('get.user.details');
// Route::post('/get-product-count', [AjaxController::class, 'getProductCount'])->name('get.product.count');
Route::post('/delete-vendor', [AjaxController::class, 'deleteVendor'])->name('delete.vendor');
Route::delete('/enquiries/{id}', [CorporateUserController::class, 'deleteEnquiry'])->name('enquiries.delete');

});
Route::get('/dashboard', [AuthCheckController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-view', [ProfileController::class, 'profile_view'])->name('profile'); 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 

    Route::post('/get-product-count', [AjaxController::class, 'getProductCount'])->name('get.product.count');

});

//vender role middleware 
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/categories_vender', [VendorController::class, 'categories_vender'])->name('categories_vender');
    Route::get('/categories_product/{id}', [VendorController::class, 'product_show'])->name('product.show');
    Route::post('/save-vendor-form-submission', [VendorController::class, 'storeVendorFormSubmission'])->name('vendor_form.save');
    Route::get('/my_posting', [VendorController::class, 'my_posting'])->name('my_posting');

    // Route::get('/dashboard', [AuthCheckController::class, 'dashboard'])->name('dashboard');
    // Route::get('/profile-view', [ProfileController::class, 'profile_view'])->name('profile');
    Route::post('/get-vendor-products', [AjaxController::class, 'getVendorProducts'])->name('get.vendor.products');
    // Route::post('/get-product-count', [AjaxController::class, 'getProductCount'])->name('get.product.count');
    
});
 

Route::get('not_approve', function () {
    return view('not_approve');
});

Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('categories', [PageController::class, 'categories'])->name('categories');
Route::get('/product/{id}', [PageController::class, 'product_show'])->name('guest_product.show');
require __DIR__.'/auth.php';
