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

    /*
   |--------------------------------------------------------------------------
   |  # Find the Factorial of a Number Using Recursion.
   |--------------------------------------------------------------------------
   */

    public function factorial(Request $request)
    {
        $inputNumber = $request->input('number', '2');

        $getFactorial = $this->getFactorial($inputNumber);
        return view('php.factorial', compact('inputNumber', 'getFactorial'));
    }


    private function getFactorial($num)
    {
        if ($num === 0 || $num === 1) {
            return 1;
        }

        return $num * $this->getFactorial($num - 1);
    }


    /*
   |--------------------------------------------------------------------------
   |  # Reverse an Integer Without Converting to a String
   |--------------------------------------------------------------------------
   */

    public function reverseNumber(Request $request)
    {
        $inputNumber = $request->input('number', '2');

        $reversed = $this->reverseInteger($inputNumber);

        return view('php.reverse-number', compact('inputNumber', 'reversed'));
    }


    private function reverseInteger($num)
    {
        $reversed = 0;
        $isNegative = $num < 0;
        $num = abs($num);

        while ($num > 0) {
            $digit = $num % 10;
            $reversed = ($reversed * 10) + $digit;
            $num = intdiv($num, 10);
        }

        return $isNegative ? -$reversed : $reversed;
    }

    /*
   |--------------------------------------------------------------------------
   |  # Find the Second Largest Element in an Array
   |--------------------------------------------------------------------------
   */

    public function secondLargest(Request $request)
    {
        $input = $request->input('array', '10,5,20,8');

        // Convert comma-separated string to an array of integers
        $array = array_map('intval', explode(',', $input));

        $secondLargest = $this->findSecondLargest($array);

        return view('php.second-largest', compact('array', 'secondLargest'));
    }


    private function findSecondLargest($arr)
    {
        $max = $secondMax = PHP_INT_MIN;

        foreach ($arr as $num) {
            if ($num > $max) {
                $secondMax = $max;
                $max = $num;
            } elseif ($num > $secondMax && $num < $max) {
                $secondMax = $num;
            }
        }

        return $secondMax === PHP_INT_MIN ? null : $secondMax;
    }




}
