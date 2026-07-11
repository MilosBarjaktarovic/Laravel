<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">MyShop</a>

        <div>
            @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
            @else
            <a href="{{ route('login.form') }}" class="btn btn-primary btn-sm">Login</a>
            <a href="{{ route('register.form') }}" class="btn btn-success btn-sm">Register</a>
            @endauth
        </div>
    </div>
</nav>
