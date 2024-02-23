<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

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

Route::get('/', [CartController::class, 'Index']);
Route::get('/AddCart/{id}', [CartController::class, 'AddCart']);
Route::get('/DeleteItemCart/{id}', [CartController::class, 'DeleteItemCart']);

// List Cart
Route::get('/ListCart', [CartController::class, 'ViewListCart']);
Route::get('/SaveItemListCart/{id}/{quanty}', [CartController::class, 'SaveListItemCart']);
Route::get('/DeleteItemListCart/{id}', [CartController::class, 'DeleteListItemCart']);

// Contact
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');

// Mail
Route::get('mail-handle',[MailController::class, 'index'])->name('mail');
Route::post('mail-handle',[MailController::class, 'index'])->name('handle-mail');

// Home
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/shop',[HomeController::class, 'shop'])->name('shop');
Route::get('/why',[HomeController::class, 'why'])->name('why');
Route::get('/testimonial',[HomeController::class, 'testimonial'])->name('testimonial');

// Search
Route::get('/search', [CartController::class, 'search'])->name('search');
