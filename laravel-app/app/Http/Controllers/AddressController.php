<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Models\Contact;

class AddressController extends Controller
{
    public function createAddress(StoreAddressRequest $request, $contactId)
    {
        $contact = Contact::find($contactId);
        echo "----------";
        $address = Address::create([
            'address' => $request->address,
            'contact_id' => $contact->id
        ]);
        return $address;
    }
}
