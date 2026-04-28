<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create() 
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request) 
    {
        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact) 
    {
        return view('contacts.show', compact('contact'));
    }
    
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
