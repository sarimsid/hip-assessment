<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
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
            border-radius: 4px;
            text-decoration: none;
        }
        .main-div a:hover {
            background-color: #3f11a3;
        }
        .main-div h2 {
            text-align: center;
        }
        .image-tag {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .image-tag img {
            max-width: 150px;
            max-height: 150px;
            height: auto;
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>

<div class="main-div">
    <h2>Edit Product</h2>

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

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $product->name) }}"
                   required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label>Price</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ old('price', $product->price) }}"
                   required>
        </div>

        <div>
            <label>Category</label>
            <input type="text"
                   name="category"
                   value="{{ old('category', $product->category) }}"
                   required>
        </div>

        <div>
            <label>Stock</label>
            <input type="number"
                   name="stock"
                   value="{{ old('stock', $product->stock) }}"
                   required>
        </div>

        <div class="image-tag" class="mb-3">
            <img src="{{old('image',$product->image)}}"/>
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit">Update Product</button>
    </form>

    <br>

    <a href="{{ route('admin.dashboard') }}">Back to Products</a>
</div>

</body>
</html>
