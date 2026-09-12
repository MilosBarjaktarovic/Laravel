<h1>Login</h1>

@if ($errors->any())
<ul style="color:red">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Login</button>
</form>
<a href="{{ route('register.form') }}">Register</a>
