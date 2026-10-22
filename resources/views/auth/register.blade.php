@extends('layout')

@section('title', 'Registracija')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="text-center fw-bold mb-4">Kreiraj nalog</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Ime i prezime</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Petar Petrović">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email adresa</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="unesite@email.com">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Lozinka</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Najmanje 6 karaktera">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Potvrda lozinke</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ponovite lozinku">
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-success py-2 fw-semibold">Registruj se</button>
                    </div>

                    <div class="text-center">
                        <p class="text-muted small mb-0">Već imaš nalog? <a href="{{ route('login') }}" class="text-decoration-none">Prijavi se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
