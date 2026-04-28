<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main>
        <h1>Update Contact</h1>
        <a href="{{ route('contacts.index') }}" class="btn btn-back">Back</a>
        <form method="POST" action="{{ route('contacts.update', $contact) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" maxlength="255" minlength="6" value="{{ old('name', $contact->name) }}" required  autofocus>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" maxlength="255" value="{{ old('email', $contact->email) }}" required>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="contact">Contact:</label>
                <input id="contact" type="text" name="contact" pattern=".{9}" value="{{ old('contact', $contact->contact) }}" required>
                @error('contact')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Update Contact</button>
            </div>
        </form>
    </main>
</body>
</html>