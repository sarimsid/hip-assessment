<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .main-div {
            width: 60%;
            margin: auto;
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
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
        a:hover {
            background-color: #3f11a3;
        }
        button {
            padding: 10px 5px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a71d2a;
        }
        .create-products-tag {
            text-align: right;
        }

        .main-div h2 {
            text-align: center;
            margin-bottom: 0px;
            font-weight: bold;
            font:300;
        }
        </style>
</head>
<body>
    @include('navbar')
    <div class="main-div">
         <h2>Customers Listing</h2>

        {{-- @if(Auth::guard('admin')->check())
        <div class="create-products-tag">
            <a href="{{ route('products.create') }}">Create Product</a>
        </div>
        @endif --}}

        <table border="1">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                {{-- @if(Auth::guard('admin')->check())
                    <th>Actions</th>
                @endif --}}
            </tr>
            @foreach($customers as $customer)
                @php
                    static $count = 0;
                    $count++;
                @endphp
                <tr>
                    <td>{{$count}}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    

                    {{-- @if(Auth::guard('admin')->check())
                        <td>
                            <a href="{{ route('products.edit', $customer) }}">Edit</a>

                            <form method="POST"
                                action="{{ route('products.destroy', $product) }}"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    @endif --}}
                </tr>
            @endforeach
                
            {{-- @endif --}}
        </table>
</div>
<?php
    function getTrimmedDescription($description) {
        $maxLength = 50; // Maximum length of the trimmed description
        if (strlen($description) > $maxLength) {
            return substr($description, 0, $maxLength) . '...';
        }
        return $description;
    }
?>
   

</body>
</html>
