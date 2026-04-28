<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="email">Name:</label>
                <input id="name" type="text" name="name" required maxlength="255" minlength="6" autofocus>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" required autofocus maxlength="255">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required minlength="6">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
            <p>Do you have an account?
                <a href="{{ route('login') }}">Login here</a>
            </p>
        </form>
    </main>
</body>
</html>