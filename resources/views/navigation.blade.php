<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            MyShop
        </a>

        <div class="d-flex align-items-center gap-2 flex-wrap">

            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
                Početna
            </a>

            <a href="{{ route('shop') }}" class="btn btn-outline-light btn-sm">
                Shop
            </a>

            @auth
            <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-sm">
                🛒 Korpa
            </a>
            @endauth


            <a href="{{ route('contact.form') }}" class="btn btn-outline-light btn-sm">
                Kontakt
            </a>

            @auth

            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.products') }}" class="btn btn-warning btn-sm">
                Admin panel
            </a>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf

                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

            @else

            <a href="{{ route('login.form') }}" class="btn btn-primary btn-sm">
                Login
            </a>

            <a href="{{ route('register.form') }}" class="btn btn-success btn-sm">
                Register
            </a>

            @endauth

        </div>
    </div>
</nav>
