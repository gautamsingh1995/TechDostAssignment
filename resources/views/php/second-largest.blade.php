@extends('layouts.app')

@section('title', '​/Second Largest')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Find the Second Largest Element in an Array</h1>
        <form method="GET" action="{{ url('/second-largest') }}" class="mt-3">
            <div class="mb-3">
                <label for="array">Enter comma-separated numbers:</label>
                <input type="text" name="array" id="array" value="{{ implode(',', $array) }}" />
            </div>
            <button type="submit" class="btn btn-primary">​Reverse an Integer</button>
        </form>

        @if($secondLargest !== null)
            <p>Second Largest Number: <strong>{{ $secondLargest }}</strong></p>
        @else
            <p>No second largest value found.</p>
        @endif

    </div>
@endsection