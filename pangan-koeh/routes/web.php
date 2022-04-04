<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DataVolunteerController;
use App\Http\Controllers\DaftarVolunteerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UbahProfileController;

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

Route::get('/', function () {
    return view('main.index');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('admin')->group(function () {
    Route::get('/loginadmin', [LoginAdminController::class, 'index']);
    Route::post('/loginadmin', [LoginAdminController::class, 'authenticate']);
    Route::get('/approval', [ApprovalController::class, 'index']);
    Route::get('/DataVolunteer', [DataVolunteerController::class, 'index']);
});

Route::middleware('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/DaftarVolunteer', [DaftarVolunteerController::class, 'index']);
    Route::get('/UbahProfile', [UbahProfileController::class, 'index']);
    Route::get('/Profile', [ProfileController::class, 'index']);
});
