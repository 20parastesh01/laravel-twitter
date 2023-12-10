<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function createContact(StoreContactRequest $request)
    {
        $validated = $request->validated();
        Contact::create([
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'email' => $validated['email']
        ]);
        return "contact created";
    }

    public function getAcontact(Contact $contact)
    {
        return $contact;
    }

    public function getContacts()
    {
        $contact = Contact::all();
        return $contact;
    }

    public function updateContact(StoreContactRequest $request, Contact $contact)
    {
        $validated = $request->validated();
        $contact->update([
            'first_name' => $validated['firstname'],
            'last_name' => $validated['lastname'],
            'email' => $validated['email']
        ]);
        return $contact;
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return "contact deleted";
    }
}