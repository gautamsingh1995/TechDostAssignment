@extends('layouts.app')

@section('title', 'Find First Non-Repeating Character')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Find the First Non-Repeating Character</h1>

        <form method="GET" action="{{ url('/find-char') }}" class="mt-3">
            <div class="mb-3">
                <label for="string" class="form-label">Enter a String:</label>
                <input type="text" class="form-control" name="string" id="string" value="{{ $inputString ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>

        @if(isset($firstNonRepeating))
            <div class="alert alert-success mt-3">
                First Non-Repeating Character: <strong>{{ $firstNonRepeating }}</strong>
            </div>
        @elseif(isset($inputString))
            <div class="alert alert-danger mt-3">
                No Non-Repeating Character Found.
            </div>
        @endif
    </div>
@endsection