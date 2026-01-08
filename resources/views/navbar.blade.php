<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>

    <style>
        nav {
            background-color: #1d242c;
            padding: 20px;
            display: flex;
            justify-content:end;
            width: 100%;
            box-sizing: border-box;
            height: auto;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
        nav a:hover {
            text-decoration: underline;
        }
        nav form {
            display: inline;
        }
        nav button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            font: inherit;
        }
        nav button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div>
    <nav>
        {{-- <a href="{{ route('home') }}">Home</a> | --}}

        {{-- Admin Logout --}}
        @if(Auth::guard('admin')->check())
            <a href="{{ route('admin.dashboard') }}">Home</a> |
            <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endif

        {{-- Customer Logout --}}
        @if(Auth::guard('customer')->check())
            <a href="{{ route('customer.dashboard') }}">Home</a> |
            <form action="{{ route('customer.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endif
    </nav>
</div>

</body>
</html>
