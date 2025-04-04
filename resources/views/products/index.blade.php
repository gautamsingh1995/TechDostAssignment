@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container mt-4">
        <h2>Product List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->name ?? 'No Category' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!--  9. jQuery Add Dynamic Field & Get Values  -->
    <div id="container"></div>
    <button id="addField">Add Field</button>
    <button id="getValues">Get Values</button>

    <script>
        $('#addField').click(function () {
            $('#container').append('<input type="text" class="dyn-field" /><br>');
        });

        $('#getValues').click(function () {
            $('.dyn-field').each(function () {
                console.log($(this).val());
            });
        });
    </script>


    <!-- 7. Upload a File on Button Click (without <form>) -->


    <input type="file" id="fileInput" />
    <button id="uploadBtn">Upload</button>

    <script>
        $('#uploadBtn').click(function () {
            var file = $('#fileInput')[0].files[0];
            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: '/upload-endpoint',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    alert('Upload successful!');
                }
            });
        });

        /* 
                6. Fetch Data Using jQuery AJAX */
        /* $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts/1',
            method: 'GET',
            success: function (data) {
                console.log(data);
            }
        }); */
    </script>


@endsection