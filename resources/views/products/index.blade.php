<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>

    <style>
        .container {
            width: 90%;
            margin: 30px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            font-weight: 300;
        }

        .create-btn {
            padding: 10px 15px;
            background-color: #218838;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }

        .create-btn:hover {
            background-color: #3f11a3;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            overflow: hidden;
            background-color: #fff;
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .card-body p {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }

        .meta {
            font-size: 13px;
            color: #666;
        }

        .price {
            font-weight: bold;
            margin-top: 8px;
        }

        .actions {
            margin-top: 12px;
            display: flex;
            gap: 8px;
        }

        .actions a,
        .actions button {
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .actions button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Products</h2>

        @if(Auth::guard('admin')->check())
            <a href="{{ route('products.create') }}" class="create-btn">Create Product</a>
        @endif
    </div>

    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">

                {{-- Product Image --}}
                <img src="{{ $product->image ?? asset('images/default-product.png') }}"
                     alt="{{ $product->name }}">

                <div class="card-body">
                    <h3>{{ $product->name }}</h3>

                    <p>{{ getTrimmedDescription($product->description) }}</p>

                    <div class="meta">
                        Category: {{ $product->category }} <br>
                        Stock: {{ $product->stock }}
                    </div>

                    <div class="price">
                        ₹ {{ number_format($product->price, 2) }}
                    </div>

                    @if(Auth::guard('admin')->check())
                        <div class="actions">
                            <a href="{{ route('products.edit', $product) }}" class="edit-btn">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('products.destroy', $product) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>

<?php
    function getTrimmedDescription($description) {
        $maxLength = 60;
        return strlen($description) > $maxLength
            ? substr($description, 0, $maxLength) . '...'
            : $description;
    }
?>

</body>
</html>
