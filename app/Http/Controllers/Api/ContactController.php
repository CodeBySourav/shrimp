<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Fetch all contact entries
        $contacts = Contact::all();

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Contacts fetched successfully',
            'data' => $contacts,
        ], 200);
    }

    public function show($id)
    {
        // Fetch the contact by id
        $contact = Contact::find($id);

        // Check if the contact exists
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
            ], 404);
        }

        // Return the contact
        return response()->json([
            'success' => true,
            'message' => 'Contact fetched successfully',
            'data' => $contact,
        ], 200);
    }


}
