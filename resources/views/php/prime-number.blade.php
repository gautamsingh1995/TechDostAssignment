@extends('layouts.app')

@section('title', 'Prime Number Checker')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Check if a Number is Prime</h1>

        <form method="GET" action="{{ url('/check-prime') }}" class="mt-3">
            <div class="mb-3">
                <label for="number" class="form-label">Enter a Number:</label>
                <input type="number" class="form-control" name="number" id="number" value="{{ $inputNumber ?? '' }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>

        @if(isset($isPrime))
            <div class="alert mt-3 {{ $isPrime ? 'alert-success' : 'alert-danger' }}">
                {{ $isPrime ? 'The number is prime!' : 'The number is not prime.' }}
            </div>
        @endif
    </div>
@endsection