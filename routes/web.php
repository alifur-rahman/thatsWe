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



Route::get('/', [App\Http\Controllers\TravelController::class, 'welcome'])->name('welcome-page');
Route::get('/about', [App\Http\Controllers\TravelController::class, 'about'])->name('about-page');
Route::get('/offer', [App\Http\Controllers\TravelController::class, 'offer'])->name('offer-page');
Route::post('/offer/submit', [App\Http\Controllers\TravelController::class, 'submitOffer'])->name('submit-offer');
Route::get('/recommendation', [App\Http\Controllers\TravelController::class, 'recommendation'])->name('recommendation');
Route::post('/recommendation/submit', [App\Http\Controllers\TravelController::class, 'submitRecommendation'])->name('submit-recommendation');
Route::get('/policy', [App\Http\Controllers\TravelController::class, 'policy'])->name('policy-page');
Route::get('change/lang', [App\Http\Controllers\LanguageController::class, 'switch'])->name('LangChange');
