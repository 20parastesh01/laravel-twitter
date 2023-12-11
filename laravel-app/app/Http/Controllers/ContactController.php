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
        $contact = Contact::create([
            'first_name' => $request -> firstname,
            'last_name' => $request -> lastname,
            'email' => $request -> email
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
        $contact->update([
            'first_name' => $request -> firstname,
            'last_name' => $request -> lastname,
            'email' => $request -> email
        ]);
        return new ContactResource($contact);
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return "contact deleted";
    }
}