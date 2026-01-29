<?php

namespace App\Http\Controllers;

use App\Models\Ocene; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class OcenaController extends Controller
{

     public function __construct()
     {
     $this->middleware('auth')->only(['create', 'store']);
     }

    public function index()
    {
        $ocene = Ocene::all();
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

        Ocene::create([
            'predmet' => $request->predmet,
            'ocena' => $request->ocena,
            'profesor' => $request->profesor,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('ocene.index')->with('success', 'Ocena je uspešno dodata.');
    }

   
}
