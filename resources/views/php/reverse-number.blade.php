@extends('layouts.app')

@section('title', '​Reverse an Integer')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">​Reverse an Integer Without Converting to a String</h1>
        <form method="GET" action="{{ url('/reverse-number') }}" class="mt-3">
            <div class="mb-3">
                <label for="number" class="form-label">Enter a Number:</label>
                <input type="number" class="form-control" name="number" id="number" value="{{ $inputNumber ?? '' }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">​Reverse an Integer</button>
        </form>

        <p>​Reverse an Integer <strong>{{ $inputNumber }}</strong> is: <strong>{{ $reversed }}</strong></p>

    </div>
@endsection