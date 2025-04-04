<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeNumberController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   |  # Reverse a String Without Using `strrev()`.
   |--------------------------------------------------------------------------
   */

    public function checkPrime(Request $request)
    {
        $inputNumber = $request->input('number', '2');

        $isPrime = $inputNumber !== '' ? $this->isPrime($inputNumber) : null;
        return view('php.prime-number', compact('inputNumber', 'isPrime'));
    }


    private function isPrime($num)
    {
        if ($num < 2) {
            return false; // 0 and 1 are not prime
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }

        return true;
    }
}
