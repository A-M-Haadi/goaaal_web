<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerStatusController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Seller
    Route::get('/seller/pending', [SellerStatusController::class, 'pending'])->name('seller.pending');
    Route::get('/seller/rejected', [SellerStatusController::class, 'rejected'])->name('seller.rejected');
    Route::delete('/seller/delete-account', [SellerStatusController::class, 'deleteAccount'])->name('seller.delete');

    //Buyer
    Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'role:buyer']);});

require __DIR__.'/auth.php';
