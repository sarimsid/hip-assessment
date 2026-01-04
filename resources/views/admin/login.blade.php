<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        input[type="email"], input[type="password"] {
            width: 300px;
            padding: 10px;
            margin-top: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }

        .form-class {
            border: 5px solid #ccc;
            width: 30%;
            height: auto;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Login Form --}}
    <div class="form-class">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
    
            <div>
                <label>Email</label><br>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
    
            <br>
    
            <div>
                <label>Password</label><br>
                <input type="password" name="password" required>
            </div>
    
            <br>
    
            <button type="submit">Login</button>
        </form>
    </div>

    <br>

    {{-- Register Button --}}
    <p>
        Don’t have an account?
        <a href="{{ route('register.form') }}">Register</a>
    </p>

</body>
</html>
