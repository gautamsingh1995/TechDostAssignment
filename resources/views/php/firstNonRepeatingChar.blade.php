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





    <!--  1. Find the First Non-Repeating Character in a String (JS) -->
    <script>
        function firstNonRepeatingChar(str) {
            for (let char of str) {
                if (str.indexOf(char) === str.lastIndexOf(char)) {
                    return char;
                }
            }
            return null;
        }

        // Usage
        console.log(firstNonRepeatingChar("swiss")); // Output: "w"



        /* 2. Flatten a Nested Array (JS) */

        const nested = [1, [2, [3, 4], 5], 6];

        const flattened = nested.flat(Infinity);
        console.log(flattened); // [1, 2, 3, 4, 5, 6]




        /*  3. Implement a Promise-based Sleep Function (JS) */


        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function run() {
            console.log("Start");
            await sleep(2000);
            console.log("After 2 seconds");
        }

        run();

        /* 4. Shuffle an Array Randomly (JS) */

        function shuffle(arr) {
            return arr.sort(() => Math.random() - 0.5);
        }

        // Usage
        console.log(shuffle([1, 2, 3, 4, 5]));

    </script>


@endsection