<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnagramController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |  # Reverse a String Without Using `strrev()`.
    |--------------------------------------------------------------------------
    */

    public function checkAnagram(Request $request)
    {
        $inputString1 = $request->input('string1', 'Listen');
        $inputString2 = $request->input('string2', 'Silent');

        $isAnagram = $this->isAnagram($inputString1, $inputString2);
        return view('php.anagram', compact('inputString1', 'inputString2', 'isAnagram'));
    }


    private function isAnagram($str1, $str2)
    {
        # convert to all letter lower case
        $strToLower1 = strtolower($str1);
        $strToLower2 = strtolower($str2);

        if (strlen($str1) !== strlen($str1)) {
            return false;
        }
        # convert strings to arrays, sort, and compare
        return count_chars($strToLower1, 1) === count_chars($strToLower2, 1);
    }


}
