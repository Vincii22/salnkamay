<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALINKAMAY</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css') <!-- Assuming you're using Laravel Mix/Vite for CSS -->
</head>
<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/1.png') }}');">


    <div class="h-screen flex items-center justify-center text-white flex-col">
        <a href="{{ url('/home') }}">
            <img src="{{ asset('images/2.png') }}" alt="Your Image" class="w-full max-w-[90vw]  rounded-lg transition-all duration-300 hover:scale-110  hover:rounded-full">
        </a>
        <h1 class="text-4xl font-bold mt-4">Welcome to SALINKAMAY!</h1>
    </div>



</body>
</html>
