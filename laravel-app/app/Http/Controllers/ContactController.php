<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function findContactCheck($id)
    {
        $contact = Contact::find($id);
        if(!$contact)
        {
            return "contact not found";
        }
        return $contact;
    }

    public function createContact(Request $request)
    {
        Contact::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email
        ]);
        return "contact created";
    }

    public function getAcontact($id)
    {
        $contact = $this->findContactCheck($id);
        $contact->get();
        return $contact;
    }

    public function getContacts()
    {
        $contact = Contact::all();
        return $contact;
    }

    public function updateContact(Request $request, $id)
    {
        $contact = $this->findContactCheck($id);
        $contact->update([
            'first_name'=> $request->firstname,
            'last_name'=> $request->lastname,
            'email'=> $request->email
        ]);
        return $contact;
    }

    public function deleteContact($id)
    {
        $this->findContactCheck($id)->delete();
        return "contact deleted";
    }
}