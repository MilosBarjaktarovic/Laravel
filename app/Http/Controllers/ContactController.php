<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Korisnička kontakt stranica
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

        Contact::create($request->only(['email', 'subject', 'message']));

        return redirect()->back()->with('success', 'Poruka poslata!');
    }

    // Admin panel – svi kontakti
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.allContacts', compact('contacts'));
    }

    // Admin – edit kontakt
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.edit-contact', compact('contact'));
    }

    // Admin – update kontakt
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->only(['email', 'subject', 'message']));

        return redirect()->route('admin.contacts')->with('success', 'Kontakt ažuriran!');
    }

    // Admin – delete kontakt
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts')->with('success', 'Kontakt obrisan!');
    }
}
