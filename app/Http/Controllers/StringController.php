<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringController extends Controller
{
    public function findFirstNonRepeating(Request $request)
    {
        $inputString = $request->input('string', 'swiss');
    }
}
