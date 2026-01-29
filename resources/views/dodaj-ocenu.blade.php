<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Dodaj ocenu</title>
</head>

<body>

    <h1>Dodaj novu ocenu</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('ocene.store') }}" method="POST">
        @csrf

        <div>
            <label>Predmet:</label><br>
            <input type="text" name="predmet" value="{{old('predmet')}}">
        </div>

        <div>
            <label>Ocena:</label><br>
            <input type="number" name="ocena" min="1" max="10" value="{{old('ocena')}}">
        </div>

        <div>
            <label>Profesor:</label><br>
            <input type="text" name="profesor" value="{{old('profesor')}}">
        </div>

        <br>
        <button type="submit">Sačuvaj</button>
    </form>

</body>

</html>
