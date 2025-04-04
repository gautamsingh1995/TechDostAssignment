@extends('layouts.app')

@section('title', 'Factorial Number')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Find the Factorial of a Number Using Recursion</h1>

        <form method="GET" action="{{ url('/get-factorial') }}" class="mt-3">
            <div class="mb-3">
                <label for="number" class="form-label">Enter a Number:</label>
                <input type="number" class="form-control" name="number" id="number" value="{{ $inputNumber ?? '' }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary"> Find Factorial</button>
        </form>

        <p>Factorial of <strong>{{ $inputNumber }}</strong> is: <strong>{{ $getFactorial }}</strong></p>

    </div>
@endsection