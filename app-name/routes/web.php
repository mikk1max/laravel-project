<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/comments',[CommentController::class,'index']);

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\CommentController::class, 'index'])->name("home");
Route::get('/comments', [CommentController::class, 'index'])->name("comments");
Route::get('/create', [CommentController::class, 'create'])->name("create");
Route::post('/create', [CommentController::class, 'store'])->name("store");

Route::get('/delete/{id}', [CommentController::class,'destroy'])->name('delete');

Route::get('/edit/{id}', [CommentController::class,'edit'])->name('edit');
Route::put('/update/{id}', [CommentController::class,'update'])->name('update');

Route::get('/shop', [ShopController::class, 'index'])->name("shop");




Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
Route::get('/makeorder', [OrdersController::class, 'create'])->name('makeorder');
Route::post('/makeorder', [OrdersController::class, 'store'])->name('saveorder');

Route::get('/deleteorder/{id}', [OrdersController::class, 'destroy'])->name('deleteorder');
Route::get('/editorder/{id}', [OrdersController::class, 'edit'])->name('editorder');
Route::put('/updateorder/{id}', [OrdersController::class, 'update'])->name('updateorder');


Route::get('/ordersForm', [OrdersController::class, 'showForm'])->name('ordersForm');
