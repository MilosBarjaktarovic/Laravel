<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    // Korisnička kontakt stranica
    public function indexContact()
    {
        return view('contact');
    }

    // Čuvanje poruke iz kontakt forme
    public function store(ContactRequest $request)
    {
        $this->contactRepo->create(
            $request->validated()
        );

        return redirect()->back()
            ->with('success', 'Poruka poslata!');
    }

    // Admin panel – svi kontakti
    public function index()
    {
        $contacts = $this->contactRepo->getAll();

        return view('admin.allContacts', compact('contacts'));
    }

    // Admin – edit kontakt
    public function edit($id)
    {
        $contact = $this->contactRepo->findById($id);

        return view('admin.edit-contact', compact('contact'));
    }

    // Admin – update kontakt
    public function update(ContactRequest $request, $id)
    {
        $this->contactRepo->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route('admin.contacts')
            ->with('success', 'Kontakt ažuriran!');
    }

    // Admin – delete kontakt
    public function destroy($id)
    {
        $this->contactRepo->delete($id);

        return redirect()
            ->route('admin.contacts')
            ->with('success', 'Kontakt obrisan!');
    }
}
