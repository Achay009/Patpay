<?php

use Illuminate\Support\Facades\Route;
use Achay\Patpay\Http\Controllers\AccountController;

Route::post('/create-account', [AccountController::class, 'createAccount'])->name('account.create');
Route::post('/debit', [AccountController::class, 'debit'])->name('account.debit');
Route::post('/credit', [AccountController::class, 'credit'])->name('account.credit');
Route::post('/transfer', [AccountController::class, 'transfer'])->name('account.transfer');
Route::post('/check-balance', [AccountController::class, 'getAccountTotalBalance'])->name('account.balance');

