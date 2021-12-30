<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });
Route::post('/payment', [App\Http\Controllers\PaymentController::class, 'update']);
Route::resource('/expense', ExpenseController::class);

Route::resource('/payment', PaymentController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
