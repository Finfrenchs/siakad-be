<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    //return view('welcome');
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function(){
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
    })->name('home');
    Route::resource('user', UserController::class);
});

// Route::get('/login', function () {
//     return view('pages.auth.auth-login', ['type_menu' => '']);
// })->name('login');
// Route::get('/register', function () {
//     return view('pages.auth.auth-register', ['type_menu' => '']);
// })->name('register');
// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password', ['type_menu' => '']);
// })->name('forgot');
// Route::get('/reset-password', function () {
//     return view('pages.auth.auth-reset-password', ['type_menu' => '']);
// })->name('reset-password');
