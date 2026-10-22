<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    // Prikaz forme za registraciju
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Registracija korisnika
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepo->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')
            ->with('success', 'Uspešno ste registrovani!');
    }

    // Prikaz forme za login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')
                ->with('success', 'Uspešno ste ulogovani!');
        }

        return back()->withErrors([
            'email' => 'Pogrešan email ili lozinka.'
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Uspešno ste se odjavili.');
    }
}
