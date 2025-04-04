<?php

use App\Http\Controllers\AnagramController;
use App\Http\Controllers\PrimeNumberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StringController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/find-char', [StringController::class, 'findFirstNonRepeating']);
Route::get('/reverse-string', [StringController::class, 'reverseString']);
Route::get('/missing-number', [StringController::class, 'findMissingNumberArray']);
Route::get('/check-anagram', [AnagramController::class, 'checkAnagram']);
Route::get('/check-prime', [PrimeNumberController::class, 'checkPrime']);
Route::get('/products', [ProductController::class, 'index']);