<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


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

Route::get('/home', [BookController::class, 'index']);  
Route::get('/', [BookController::class, 'index']);  
Route::get('/about', [BookController::class, 'about']);  
Route::get('/shopping-cart', [BookController::class, 'bookCart'])->name('shopping.cart');
Route::get('/book/{id}', [BookController::class, 'addBooktoCart'])->name('addbook.to.cart');
Route::patch('/update-shopping-cart', [BookController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [BookController::class, 'deleteProduct'])->name('delete.cart.product');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [BookController::class, 'index']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/products', [BookController::class, 'list'])->name('products');
    Route::get('/users', [UserController::class, 'index'])->name('index');
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::get('/orders', [OrderController::class, 'getorders'])->name('orders.getorders');
    Route::get('/products/create', [BookController::class, 'create'])->name('products.create');
    Route::post('/products', [BookController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [BookController::class, 'edit'])->name('products.edit'); // Edit route
    Route::put('/products/{product}', [BookController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [BookController::class, 'destroy'])->name('products.destroy'); // Delete route
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});
