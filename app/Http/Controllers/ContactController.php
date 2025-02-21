<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message using mass assignment
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
            log::info('contact');
            log::info($contact);
            log::info('contact');
        // Send email notification
        Mail::to($request->email)->send(new ContactMail($contact));

        // return redirect()->back()->with('success', 'Your message has been sent successfully.');
        return redirect('contact')->with('success', 'Your message has been sent successfully.');
    }

    // Add other CRUD methods as needed (index, show, edit, update, delete)
}
