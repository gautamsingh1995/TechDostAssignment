<?php

use App\Http\Controllers\AnagramController;
use App\Http\Controllers\PrimeNumberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StringController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/find-char', [StringController::class, 'findFirstNonRepeating']);
    Route::get('/reverse-string', [StringController::class, 'reverseString']);
    Route::get('/missing-number', [StringController::class, 'findMissingNumberArray']);
    Route::get('/longest-prefix', [StringController::class, 'longestCommonPrefix']);

    Route::get('/check-anagram', [AnagramController::class, 'checkAnagram']);

    Route::get('/check-prime', [PrimeNumberController::class, 'checkPrime']);
    Route::get('/get-factorial', [PrimeNumberController::class, 'factorial']);
    Route::get('/reverse-number', [PrimeNumberController::class, 'reverseNumber']);
    Route::get('/second-largest', [PrimeNumberController::class, 'secondLargest']);



    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/bulk-insert', [ProductController::class, 'bulkInsert']);
    Route::get('/arrayMultidimensionalWithoutLoop', [ProductController::class, 'arrayMultidimensionalWithoutLoop']);
});






