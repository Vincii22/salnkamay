<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALINKAMAY</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="pt-[120px]"> <!-- Add padding to the top to account for the navbar height -->

    <!-- Include the Navbar -->
    @include('partials.navbar')

    <!-- Main content goes here -->
    @yield('content')

</body>
</html>
