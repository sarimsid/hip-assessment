<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <style>
        .main-div {
            width: 40%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            font: 200;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3f11a3;
        }

        .main-div form {
            display: flex;
            flex-direction: column;
            padding: 30px;
        }
        .main-div a {
            padding: 10px 15px;
            background-color: #218838;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .main-div a:hover {
            background-color: #3f11a3;
        }
        .main-div h2 {
            text-align: center;
            margin-bottom: 0px;
        }
        </style>
</head>
<body>

<div class="main-div">
    <h2>Create Product</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <br>

        <div>
            <label>Description</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Price</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>

        <br>

        <div>
            <label>Category</label><br>
            <input type="text" name="category" value="{{ old('category') }}" required>
        </div>

        <br>

        <div>
            <label>Stock</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <br>

        <button type="submit">Create Product</button>
    </form>

    <br>

    <a href="{{ route('admin.dashboard') }}">Back to Home</a>
</div>



</body>
</html>
