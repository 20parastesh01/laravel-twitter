<?php

namespace App\Domains\Contacts\Services;

use App\Domains\Contacts\Models\Contact;

class ContactService
{
    public function createContact($request)
    {   
        return Contact::create([
            'first_name' => $request -> firstname,
            'last_name' => $request -> lastname,
            'email' => $request -> email]);
    }

    public function getAcontact(Contact $contact)
    {
        return $contact;
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return $contacts;
    }

    public function updateContact($request, Contact $contact)
    {
        return $contact->update([
            'first_name' => $request -> firstname,
            'last_name' => $request -> lastname,
            'email' => $request -> email
        ]);
    }

    public function deleteContact(Contact $contact)
    {
        return $contact->delete();
    }
}