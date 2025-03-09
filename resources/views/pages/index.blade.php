<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALINKAMAY</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Importing Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Minnie+Play&family=Garet&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

@extends('layouts.app')

@section('content')
<body class="bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('images/1.png') }}'); background-repeat: no-repeat;">

    <!-- Hero Section -->
    <div class="w-full h-screen flex items-center justify-center text-center">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-[8rem] sm:text-[10rem] md:text-[12rem] font-extrabold text-white font-[Minnie Play]"
                style="text-shadow: 4px 4px 8px rgba(139, 69, 19, 0.8);">
                SalinKamay
            </h1>

            <div class="font-extrabold text-white font-[Garet] space-y-4">
                <div class="text-3xl sm:text-4xl md:text-5xl">Filipino Sign Language</div>
                <div class="text-3xl sm:text-4xl md:text-5xl">Website for Deaf or Hard of</div>
                <div class="text-3xl sm:text-4xl md:text-5xl">Hearing Students in SNED</div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="w-full h-screen flex items-center justify-center px-4 sm:px-8">
        <div class="w-full h-[75%] bg-cover bg-center rounded-2xl mb-20"
            style="background-image: url('{{ asset('images/7.png') }}'); background-repeat: no-repeat;">

            <div class="flex flex-col md:flex-row w-full h-full">
                <!-- Left Section -->
                <div class="w-full md:w-3/5 flex flex-col justify-center px-8 text-white space-y-6">
                    <h1 class="text-4xl sm:text-5xl md:text-[8rem] font-extrabold font-[Garet]">Communicate through FSL</h1>
                    <h4 class="text-sm sm:text-lg">
                        The SalinKamay website is designed to support Deaf and hard-of-hearing students in special education (SNED) by providing a robust platform for Filipino Sign Language (FSL) learning and communication.
                    </h4>
                    <div>
                        <a href="{{url('/translate')}}" class="bg-white text-pink-500 font-bold py-3 px-8 rounded-full text-sm sm:text-lg">Start translating</a>
                    </div>

                </div>

                <!-- Right Section -->
                <div class="w-full md:w-2/5 flex flex-col justify-center items-center text-white px-8 space-y-6">
                    <h4 class="text-xl sm:text-3xl">LEARN BASIC LANGUAGE</h4>
                    <div class="w-full flex justify-center space-x-4 sm:space-x-6">
                        <div class="flex flex-col items-center">
                            <div class="w-[50vw] sm:w-[20vw] h-[35vh] border-2 bg-gray-300 flex items-center justify-center rounded-2xl overflow-hidden relative">
                                <img src="{{ asset('images/8.png') }}" alt="Alphabet Image" class="w-full h-full object-cover transition-all duration-300 hover:scale-110" />
                                <h5 class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-pink-500 font-bold">ALPHABET</h5>
                            </div>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-[50vw] sm:w-[20vw] h-[35vh] border-2 bg-gray-300 flex items-center justify-center rounded-2xl overflow-hidden relative">
                                <img src="{{ asset('images/9.png') }}" alt="GIFs Image" class="w-full h-full object-cover transition-all duration-300 hover:scale-110" />
                                <h5 class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-pink-500 font-bold">GIF's</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

</html>
