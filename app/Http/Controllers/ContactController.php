<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); 

        return view('admin.allContacts', compact('contacts'));
    }
    public function indexContact()
    {
        return view('contact');
    }
   
}
