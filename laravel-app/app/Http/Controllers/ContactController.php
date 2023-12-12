<?php

namespace App\Http\Controllers;

use App\Domains\Contacts\Services\ContactService;
use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\ContactResource;


class ContactController extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function create(StoreContactRequest $request)
    {
        return new ContactResource($this->contactService->createContact($request));
    }

    public function show($contact)
    {
        return new ContactResource($this->contactService->getAcontact($contact));
    }

    public function index()
    {
        return ContactResource::collection($this->contactService->getContacts());
    }

    public function update(StoreContactRequest $request, $contact)
    {
        return new ContactResource($this->contactService->updateContact($request, $contact));
    }

    public function destroy($contact)
    {
        $this->contactService->deleteContact($contact);
        return "contact deleted";
    }
}