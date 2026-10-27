<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopProject')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS za zumiranje slika proizvoda -->
    <style>
        .card {
            overflow: hidden;
            /* Sprečava da uvećana slika izađe van okvira kartice */
        }

        .card-img-top {
            transition: transform 0.3s ease;
            /* Čini da zumiranje teče glatko */
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
            /* Uvećava sliku za 10% kada pređeš mišem preko kartice */
        }

    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('navigation')

    <div class="container mt-4 mb-5 flex-grow-1">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        &copy; 2025 My Shop. All rights reserved.
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
