@extends('layouts.app')

@section('title', 'Anagram Checker')

@section('content')
    <div class="card shadow p-4">
        <h1 class="text-center">Check if Two Strings are Anagrams</h1>

        <form method="GET" action="{{ url('/check-anagram') }}" class="mt-3">
            <div class="mb-3">
                <label for="string1" class="form-label">Enter First String:</label>
                <input type="text" class="form-control" name="string1" id="string1" value="{{ $inputString1 ?? '' }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="string2" class="form-label">Enter Second String:</label>
                <input type="text" class="form-control" name="string2" id="string2" value="{{ $inputString2 ?? '' }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>

        @if(isset($isAnagram))
            <div class="alert mt-3 {{ $isAnagram ? 'alert-success' : 'alert-danger' }}">
                {{ $isAnagram ? 'The strings are anagrams!' : 'The strings are not anagrams.' }}
            </div>
        @endif
    </div>
@endsection