<?php

namespace App\Domains\Contact\Services;

use App\Models\Contact;

class ContactService
{
    public function createContact($request)
    {
        return Contact::create([
            'first_name' => $request -> firstname,
            'last_name' => $request -> lastname,
            'email' => $request -> email]);
    }
}