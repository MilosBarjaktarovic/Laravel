<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('navigation')

    <div class="container mt-4">
        @yield('content')
    </div>



</body>

<footer class="bg-dark text-white text-center py-3 mt-4">
    &copy; 2025 My Shop. All rights reserved.
</footer>

</html>
