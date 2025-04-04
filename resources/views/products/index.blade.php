@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container mt-4">
        <h2>Product List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->name ?? 'No Category' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection