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

<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/1.png') }}'); background-repeat: no-repeat;">

    <div class="w-full h-screen flex items-center justify-center">
        <div class="w-11/12 h-[75%] bg-cover bg-center" style="background-image: url('{{ asset('images/7.png') }}'); background-repeat: no-repeat;">

            <!-- Main content container with flex layout -->
            <div class="flex w-full h-full">
                <!-- Left Content (60%) -->
                <div class="w-3/5 flex flex-col justify-center px-8 text-white space-y-6">

                    <!-- Title -->
                    <div class="text-left">
                        <h1 class="text-[8rem] font-extrabold font-[Garet]">Communicate through FSL</h1>
                    </div>

                    <!-- Description -->
                    <div>
                        <h4 class="text-lg">The SalinKamay website is designed to support Deaf and hard-of-hearing students in special education (SPED) by providing a robust platform for Filipino Sign Language (FSL) learning and communication.</h4>
                    </div>

                    <!-- Button -->
                    <div>
                        <a href="#" class="bg-white text-pink-500 font-bold py-3 px-8 rounded-full">Start translating</a>
                    </div>
                </div>

                <!-- Right Content (40%) -->
                <div class="w-2/5 flex flex-col justify-center items-center text-white px-8 space-y-6">

                    <!-- Title -->
                    <div>
                        <h4 class="text-3xl">LEARN BASIC LANGUAGE</h4>
                    </div>

                    <!-- Image Slider -->
                    <div class="w-full flex justify-center space-x-6">
                        <!-- Left Arrow (for future functionality, will add slider logic) -->
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-800 rounded-full cursor-pointer">
                            <span class="text-white text-xl">&#8592;</span>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-[20vw] h-[35vh] border-2 bg-gray-300 flex items-center justify-center rounded-2xl overflow-hidden relative">
                                <img src="{{ asset('images/8.png') }}" alt="Alphabet Image" class="w-full h-full object-cover transition-all duration-300 hover:scale-110" />
                                <h5 class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-pink-500 font-bold">ALPHABET</h5>
                            </div>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-25 h-[35vh] border-2 bg-gray-300 flex items-center justify-center rounded-2xl overflow-hidden relative">
                                <img src="{{ asset('images/9.png') }}" alt="GIFs Image" class="w-full h-full object-cover transition-all duration-300 hover:scale-110" />
                                <h5 class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-pink-500 font-bold">GIF's</h5>
                            </div>
                        </div>

                        <!-- Right Arrow (for future functionality, will add slider logic) -->
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-800 rounded-full cursor-pointer">
                            <span class="text-white text-xl">&#8594;</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
@endsection
</html>
