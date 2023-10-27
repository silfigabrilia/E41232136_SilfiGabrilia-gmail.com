<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\managementUserController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\Auth;
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

// Route::get('admin/profile', function(){
//     //
// })->middleware(CheckAge::class);

// Route::get('/', function() {
//     //
// })->middleware('first', 'second');

// Route::get('/', function() {
//     //
// })->middleware('web');

// Route::group(['middleware' => ['web']], function() {
//     //
// })->middleware('web');

// Route::middleware(['web', 'subscribed'])->group(function () {
//     //
// });

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/session/create', [SessionController::class, 'create']);
// Route::get('/session/show', [SessionController::class, 'show']);
// Route::get('/session/delete', [SessionController::class, 'delete']);
// // Route::get('/pegawai/index', [PegawaiController::class, 'index']);
// Route::get('/formulir', PegawaiController::class);
// Route::get('/session/post', [SessionController::class, 'proses']);
// Route::get('/cobaerror/index', [CobaController::class, 'index']);

// Route::get('/user', function () {
//     return "Hello guys!";
// });

// Route::get('/user', [ManagementUserController::class, 'index']);
Route::resource('/user', ManagementUserController::class);

Route::get('/home', function(){
    return view("home");
});

Route::group(['namespace' => 'Frontend'], function(){
    Route::resource('/home', HomeController::class);
});
Route::group(['namespace' => 'Backend'], function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/pendidikan', PendidikanController::class);
    Route::resource('/pengalaman_kerja', PengalamanKerjaController::class);
    // Route::resource('/session/create', SessionController::class);
});
Auth::routes();
// Route::group(['namespace' => 'Backend'], function(){
//     Route::resource('/dashboard', 'DashboardController');
//     Route::resource('/pendidikan', 'PendidikanController');
//     Route::resource('/pengalaman_kerja', 'PengalamanKerjaController');
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
