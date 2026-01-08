<h2>Products</h2>

@if(Auth::guard('admin')->check())
    <a href="{{ route('products.create') }}">Create Product</a>
@endif

<table border="1">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Stock</th>
        @if(Auth::guard('admin')->check())
            <th>Actions</th>
        @endif
    </tr>
    
    @if (count($products) > 0)
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->stock }}</td>

            @if(Auth::guard('admin')->check())
                <td>
                    <a href="{{ route('products.edit', $product) }}">Edit</a>

                    <form method="POST"
                          action="{{ route('products.destroy', $product) }}"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
        
    @endif
</table>
