@extends('layouts.app')

@section('title', 'Find First Non-Repeating Character')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Reverse a String Without Using strrev().</h1>

        <form method="GET" action="{{ url('/find-char') }}" class="mt-3">
            <div class="mb-3">
                <label for="string" class="form-label">Enter a String:</label>
                <input type="text" class="form-control" name="string" id="string" value="{{ $inputString ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>

        @if(isset($reverseString))
            <div class="alert alert-success mt-3">
                Convert Reverse String : <strong>{{ $reverseString }}</strong>
            </div>
        @endif
    </div>
@endsection