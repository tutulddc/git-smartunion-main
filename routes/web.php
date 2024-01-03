<?php

use App\Http\Controllers\login_controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhanaStoreController;
use App\Http\Controllers\KhanaUpdateController;
use App\Http\Controllers\reports;
use App\Http\Controllers\TaxController;

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
    return view('layouts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//login
Route::get('/loginpanel', [login_controller::class,'login_panel'])->name('login.panel');
// Route::get('/admin/login', [login_controller::class,'admin_login'])->name('admin.login');
Route::get('/adminlogin', [login_controller::class,'admin_login'])->name('adminlogin');

Route::post('/confirm/login', [login_controller::class, 'admin_login_confirm'])->name('admin.login.confirm');

//user profile
Route::get('/user/profile', [UserController::class, 'user_profile'])->name('user.profile');
Route::post('/user/profile/update', [UserController::class, 'user_profile_update'])->name('user.profile.update');
Route::post('/password/update', [UserController::class, 'password_update'])->name('user.pass.update');
Route::post('/user/photo/update', [UserController::class, 'user_photo_update'])->name('user.photo.update');


//user
Route::get('/user/list', [UserController::class, 'user_list'])->name('user.list');
Route::get('/user/remove/{user_id}', [UserController::class, 'user_remove'])->name('user.remove');
Route::post('/user/register/', [UserController::class, 'custom_register'])->name('custom.register');
Route::POST('/getDistrict', [UserController::class, 'getDistrict']);
Route::POST('/getUpazila', [UserController::class, 'getUpazila']);
Route::POST('/getUnion', [UserController::class, 'getUnion']);


// খানা ফরম / তথ্য কালেকশন  ফরম
Route::get('khana/form/',[KhanaStoreController::class,'khana'])->name('khana');
Route::post('khana/store',[KhanaStoreController::class,'khana_store'])->name('khana.store');
Route::GET('/getPersonid', [KhanaStoreController::class, 'getPersonid']);
Route::GET('/getPersonid1', [KhanaStoreController::class, 'getPersonid1']);

Route::get('/khana/prodhan/list', [KhanaStoreController::class, 'khana_prodhan_list'])->name('khana.prodhan.list');
// Route::get('/khana/persons/list', [KhanaStoreController::class, 'khana_persons_list'])->name('khana.persons.list');
Route::get('/khana/persons/list/{khana_id}', [KhanaStoreController::class, 'khana_persons_list'])->name('khana.persons.list');
Route::get('/khana/person/edit/{unique_id}', [KhanaStoreController::class, 'khana_person_edit'])->name('khana.person.edit');


// খানা ফরম / তথ্য হালনাগাদ / update
Route::post('/khana/personal/info/update/{unique_id}', [KhanaUpdateController::class, 'khana_personal_info_update'])->name('khana.personal.info.update');
Route::post('/khana/benefit/info/update/{unique_id}', [KhanaUpdateController::class, 'khana_benefit_info_update'])->name('khana.benefit.info.update');
Route::post('/khana/family/info/update/{khana_id}', [KhanaUpdateController::class, 'khana_family_info_update'])->name('khana.family.info.update');
Route::post('/khana/tax/info/update/{khana_id}', [KhanaUpdateController::class, 'khana_tax_info_update'])->name('khana.tax.info.update');



//misc
Route::get('/misc', [KhanaUpdateController::class, 'misc'])->name('misc');

//tax
Route::get('/holding/tax', [TaxController::class, 'holding_tax'])->name('holding.tax');
Route::post('/seach/khana', [TaxController::class, 'search_khana'])->name('search.khana');


