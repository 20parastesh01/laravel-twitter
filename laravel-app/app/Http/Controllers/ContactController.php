<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    public function createContact(StoreContactRequest $request)
    {
        $validatedContact = $request->validated();
        $contact = Contact::create([
            'first_name' => $validatedContact['firstname'],
            'last_name' => $validatedContact['lastname'],
            'email' => $validatedContact['email']
        ]);
        return new ContactResource($contact);
    }

    public function getAcontact(Contact $contact)
    {
        return new ContactResource($contact);
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);
    }

    public function updateContact(StoreContactRequest $request, Contact $contact)
    {
        $validatedContact = $request->validated();
        $contact->update([
            'first_name' => $validatedContact['firstname'],
            'last_name' => $validatedContact['lastname'],
            'email' => $validatedContact['email']
        ]);
        return new ContactResource($contact);
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return "contact deleted";
    }
}