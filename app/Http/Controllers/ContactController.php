<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Stranica za korisničku formu
    public function indexContact()
    {
        return view('contact');
    }

    // Čuvanje poruke iz kontakt forme
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Poruka poslata!');
    }

    // Admin panel - svi kontakti
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.allContacts', compact('contacts'));
    }
}
