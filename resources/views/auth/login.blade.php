@extends('layout')

@section('title', 'Prijava')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="text-center fw-bold mb-4">Prijava na nalog</h3>

                @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email adresa</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="unesite@email.com">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Lozinka</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="••••••••">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary py-2 fw-semibold">Prijavi se</button>
                    </div>

                    <div class="text-center">
                        <p class="text-muted small mb-0">Nemaš nalog? <a href="{{ route('register') }}" class="text-decoration-none">Registruj se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
