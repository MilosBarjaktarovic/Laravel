<a href="/dodaj-ocenu">➕ Dodaj novu ocenu</a>
<hr>

<h1>Ocene</h1>


<table border="1">
    <tr>
        <th>Predmet</th>
        <th>Ocena</th>
        <th>Profesor</th>
    </tr>

    @foreach($ocene as $o)
    <tr>
        <td>{{ $o->predmet }}</td>
        <td>{{ $o->ocena }}</td>
        <td>{{ $o->profesor }}</td>
        <td>{{$o->user->name}}</td>
    </tr>
    @endforeach
</table>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
