<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main>
        <div style="margin-bottom: 2rem; text-align: center;">
            <h1>Contact List</h1>
            
            @if(auth()->check())
                <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add new Contact</a>
                    
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            @else
                <p>Please <a href="{{ route('login') }}" style="font-weight: bold; color: #2563eb;">login</a> to add new contacts.</p>
            @endif
        </div>

        @if (count($contacts) === 0)
            <p style="text-align: center; color: #64748b;">No contacts registered.</p>
        @else
            <section> 
                @foreach($contacts as $contact)
                    <div class="contact-item">
                        <p>{{ $contact->name }}</p>
                        
                        @if(auth()->check())
                            <div class="contact-actions">
                                <a href="{{ route('contacts.show', $contact) }}" class="btn btn-details">Details</a>
                                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-edit">Edit</a>
                                
                                <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza?')">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif
    </main>
</body>
</html>