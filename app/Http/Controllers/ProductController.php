<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\InsertBulkRecordsJob;

class ProductController extends Controller
{
    public function index()
    {
        // Eager loading category to avoid N+1 problem
        $products = Product::with('category:id,name')->get(['id', 'name', 'price', 'stock', 'category_id']);

        return view('products.index', compact('products'));
    }


    /*
   |--------------------------------------------------------------------------
   |  # Laravel get selected columns from a table using eloquent
   |--------------------------------------------------------------------------
   */
    public function selectQueryLaravelEloquent()
    {
        $users = User::select('id', 'name', 'email')->get();
        dd($users);

    }


    /*
   |------------------------------------------------------------------------------------------
   |  # find an array that contains id = 10 in a multidimensional array without using a loop
   |------------------------------------------------------------------------------------------
    */
    public function multidimensionalArrayWithoutLoop()
    {
        $products = Product::all()->toArray(); // Convert to plain array

        // Filter using native PHP
        $result = array_values(array_filter($products, fn($item) => $item['id'] == 10));
        $found = $result[0] ?? null;

        return response()->json($found);
    }


    /*
   |--------------------------------------------------------------------------
   |  # Write a Job to insert thousands of records in a table using batch.
   |--------------------------------------------------------------------------
   */

    public function bulkInsert()
    {
        $batchSize = 1000;
        $totalRecords = 10000;
        $data = [];

        for ($i = 0; $i < $totalRecords; $i++) {
            $data[] = [
                'name' => 'Product ' . ($i + 1),
                'price' => rand(10, 500),
                'stock' => rand(1, 100),
                'category_id' => rand(1, 5),
            ];

            if (count($data) >= $batchSize) {
                dispatch(new InsertBulkRecordsJob($data));
                $data = [];
            }
        }

        if (!empty($data)) {
            dispatch(new InsertBulkRecordsJob($data));
        }

        return response()->json(['message' => 'Bulk insert job dispatched!']);
    }


    /*
    |----------------------------------------------------------------------------------
    |  # Get the key where name = 'x' in a multidimensional array without using a loop
    |----------------------------------------------------------------------------------
    */

    public function arrayMultidimensionalWithoutLoop(Request $request)
    {
        $products = Product::all()->toArray(); // Convert Eloquent to array

        # Search for product where name == 'x'
        # x replace 'libero' output 0 true
        $resultIndex = array_search('x', array_column($products, 'name'));

        return response()->json($resultIndex); // output false
    }

}

