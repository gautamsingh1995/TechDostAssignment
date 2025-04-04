<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class StringController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |  # Reverse a String Without Using `strrev()`.
    |--------------------------------------------------------------------------
    */

    public function reverseString(Request $request)
    {
        $inputString = $request->input('string', 'Hello World');
        $reverseString = $this->convertReverseString($inputString);
        return view('php.reverse-string', compact('inputString', 'reverseString'));
    }


    private function convertReverseString($str)
    {
        $reversed = "";
        $length = strlen($str);
        for ($i = $length - 1; $i >= 0; $i--) {
            $reversed .= $str[$i];
        }
        return $reversed;
    }



    /*
    |--------------------------------------------------------------------------
    |  # Find the First Non-Repeating Character in a String.
    |--------------------------------------------------------------------------
    */
    public function findFirstNonRepeating(Request $request)
    {
        $inputString = $request->input('string', 'swiss');
        $firstNonRepeating = $this->firstNonRepeatingChar($inputString);
        return view('php.firstNonRepeatingChar', compact('inputString', 'firstNonRepeating'));
    }

    private function firstNonRepeatingChar($str)
    {
        $strSplit = str_split($str);
        $charCount = array_count_values($strSplit);

        foreach ($strSplit as $char) {
            if ($charCount[$char] === 1) {
                return $char;
            }
        }
        return null;
    }


    /*
    |--------------------------------------------------------------------------
    |  # Given an array containing n-1 numbers from 1 to n with one missing number, write a
    |    function to find the missing number.
    |--------------------------------------------------------------------------
    */
    public function findMissingNumberArray(Request $request)
    {
        $inputArray = explode(',', $request->input('array', '1, 2, 3, 6'));
        $inputArray = array_map('intval', $inputArray);
        $missingNumber = $this->missingNumber($inputArray); // convert to integer array
        return view('php.missing-number', compact('inputArray', 'missingNumber'));
    }

    private function missingNumber($arr)
    {
        $fullRange = range(min($arr), max($arr));
        return array_values(array_diff($fullRange, $arr)); // Ensure indexed array output
    }


}
