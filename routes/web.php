<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\CategotyController;
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
Route::group(['prefix'=>'admin'],function(){

    Route::get('login',[AdminAuthController::class,'create'])->name('admin.login');
    Route::post('dlogin',[AdminAuthController::class,'store'])->name('admin.post.login');
    Route::get('logout',[AdminAuthController::class,'logout'])->name('admin.logout');
    Route::get('register',[AdminAuthController::class,'register'])->name('admin.register');
    Route::post('register',[AdminAuthController::class,'storeRegister'])->name('admin.post.register');

});

Route::group(['prefix'=>'admin'],function(){

    Route::get('/dashboard',[AdminAuthController::class,'index'])->name('admin.dashboard');
    Route::get('/categories',[CategotyController::class,'index'])->name('admin.category');
    Route::get('/add-category',[CategotyController::class,'create'])->name('admin.add.category');
    Route::post('/store-category',[CategotyController::class,'store'])->name('admin.category.store');
    Route::get('/edit-category/{id}',[CategotyController::class,'edit'])->name('admin.category.edit');
    Route::post('/update-category/{id}',[CategotyController::class,'update'])->name('admin.category.update');
    Route::get('/delete-category/{id}',[CategotyController::class,'delete'])->name('admin.category.delete');
    
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/admin/dashboard', function () {
//     return view('backend.dashboard');
// })->name('admin.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
