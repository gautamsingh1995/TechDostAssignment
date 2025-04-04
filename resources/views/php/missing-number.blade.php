@extends('layouts.app')

@section('title', 'Find Missing Number in Array')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Find Missing Number in an Array</h1>

        <form method="GET" action="{{ url('/missing-number') }}" class="mt-3">
            <div class="mb-3">
                <label for="array" class="form-label">Enter Numbers (comma-separated):</label>
                <?php 
                        $inputArray = request('array', '1,2,3,6');
    if (is_string($inputArray)) {
        $inputArray = explode(',', $inputArray); // Convert to array
    }
                    ?>
                <input type="text" class="form-control" name="array" id="array" value="{{ implode(',', $inputArray) }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>

        @if(isset($missingNumber) && count($missingNumber) > 0)
            <div class="alert alert-success mt-3">
                Missing Numbers: <strong>{{ implode(', ', $missingNumber) }}</strong>
            </div>
        @elseif(isset($inputArray))
            <div class="alert alert-danger mt-3">
                No Missing Number Found.
            </div>
        @endif
    </div>
@endsection