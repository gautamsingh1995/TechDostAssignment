@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Longest Common Prefix Finder</h2>

        <form method="GET" action="{{ url('/longest-prefix') }}">
            <label for="strings">Enter comma-separated words:</label>
            <input type="text" name="strings" id="strings" value="{{ implode(',', $inputArray) }}"
                class="form-control my-2" />

            <button type="submit" class="btn btn-primary">Find Prefix</button>
        </form>

        @if(!empty($prefix))
            <div class="alert alert-success mt-3">
                <strong>Longest Common Prefix:</strong> {{ $prefix }}
            </div>
        @else
            <div class="alert alert-warning mt-3">
                No common prefix found.
            </div>
        @endif
    </div>
@endsection