<?php

namespace App\Http\Controllers;

use App\Repositories\OcenaRepository;
use Illuminate\Http\Request;



class OcenaController extends Controller
{
    private $ocenaRepo;

    public function __construct(OcenaRepository $ocenaRepo)
    {
        $this->middleware('auth')->only(['create', 'store']);

        $this->ocenaRepo = $ocenaRepo;
    }

    public function index()
    {
        $ocene = $this->ocenaRepo->getAll();
        return view('ocene', compact('ocene'));
    }

    public function create()
    {

        return view('dodaj-ocenu');
    }
    public function store(Request $request)
    {
        $request->validate([
            'predmet' => 'required|string|max:255',
            'ocena' => 'required|integer|min:1|max:10',
            'profesor' => 'required|string|max:255'
        ]);

        $this->ocenaRepo->create([
            'predmet' => $request->predmet,
            'ocena' => $request->ocena,
            'profesor' => $request->profesor,
            'user_id' => auth()->id(),

        ]);

        return redirect()->route('ocene.index')->with('success', 'Ocena je uspešno dodata.');
    }


}
