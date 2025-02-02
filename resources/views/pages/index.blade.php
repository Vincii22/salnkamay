<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALINKAMAY</title>

    <!-- Importing Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Minnie+Play&family=Garet&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
    @extends('layouts.app')
    @section('content')
    <body class="bg-cover bg-center" style="background-image: url('{{ asset('images/3.png') }}'); background-repeat: no-repeat;">

        <div class="w-full h-screen flex items-center justify-center text-center">
            <div class="max-w-screen-xl mx-auto ">
                <!-- Adjusted the margin-top to move the title higher -->
                <h1 class="text-[14rem] font-extrabold text-white font-[Minnie Play] shadow-3d ">
                    SalinKamay
                </h1>
                <div class="font-extrabold text-white font-[Garet]  space-y-4">
                    <div class="text-4xl md:text-5xl lg:text-6xl">
                        Filipino Sign Language
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl">
                        Website for Deaf or Hard of
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl">
                        Hearing Students in SPED
                    </div>
                </div>
            </div>
        </div>

    </body>

    @endsection
</html>
