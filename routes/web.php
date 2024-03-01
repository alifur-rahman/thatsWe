<?php

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

Route::middleware(['guest'])->group(function () {
    Route::get('/cms/login', [App\Http\Controllers\auth\AuthController::class, 'login_page'])->name('login-page');
    Route::post('/login/submit', [App\Http\Controllers\auth\AuthController::class, 'login'])->name('login');
});



Route::get('/', [App\Http\Controllers\TravelController::class, 'welcome'])->name('welcome-page');
Route::get('/about', [App\Http\Controllers\TravelController::class, 'about'])->name('about-page');
Route::get('/offer', [App\Http\Controllers\TravelController::class, 'offer'])->name('offer-page');
Route::post('/offer/submit', [App\Http\Controllers\TravelController::class, 'submitOffer'])->name('submit-offer');
Route::get('/recommendation', [App\Http\Controllers\TravelController::class, 'recommendation'])->name('recommendation');
Route::post('/recommendation/submit', [App\Http\Controllers\TravelController::class, 'submitRecommendation'])->name('submit-recommendation');
Route::get('/policy', [App\Http\Controllers\TravelController::class, 'policy'])->name('policy-page');
Route::post('/sujjection/submit', [App\Http\Controllers\TravelController::class, 'sujjectionSubmit'])->name('sujjection-submit');
Route::get('change/lang', [App\Http\Controllers\LanguageController::class, 'switch'])->name('LangChange');
Route::get('/order', [App\Http\Controllers\TravelController::class, 'order'])->name('order-page');
Route::post('/order/submit', [App\Http\Controllers\TravelController::class, 'orderSubmit'])->name('order-submit');

Route::get('/images', [App\Http\Controllers\TravelController::class, 'images'])->name('images-page');
// auth 
Route::get('/cms/login', [App\Http\Controllers\auth\AuthController::class, 'login_page'])->name('login-page');
Route::any('/cms/logout', [App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
Route::post('/login/submit', [App\Http\Controllers\auth\AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/cms/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'dashboard'])->name('dashboard');
});