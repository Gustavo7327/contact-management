<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contact Details</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main>
        <h1>Show Contact Details</h1>
        <a href="{{ route('contacts.index') }}" class="btn btn-back">Back</a>
        
        <div class="details-container">
            <div class="details-row">
                <span class="details-label">ID:</span>
                <span class="details-value">{{ $contact->id }}</span>
            </div>
            <div class="details-row">
                <span class="details-label">Name:</span>
                <span class="details-value">{{ $contact->name }}</span>
            </div>
            <div class="details-row">
                <span class="details-label">Email:</span>
                <span class="details-value">{{ $contact->email }}</span>
            </div>
            <div class="details-row">
                <span class="details-label">Contact:</span>
                <span class="details-value">{{ $contact->contact }}</span>
            </div>
            <div class="details-row">
                <span class="details-label">Created at:</span>
                <span class="details-value">{{ $contact->created_at }}</span>
            </div>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-edit">Edit Contact</a>
            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Delete Contact</button>
            </form>
        </div>
    </main>
</body>
</html>