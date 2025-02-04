<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALINKAMAY</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Importing Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Minnie+Play&family=Garet&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

@extends('layouts.app')

@section('content')
    <body class="bg-cover bg-center" style="background-image: url('{{ asset('images/1.png') }}'); background-repeat: no-repeat;">

    <!-- Main container centered vertically and horizontally -->
    <div class="flex justify-center items-center w-full h-[65vh]">
        <!-- Placeholder for image when translate button is clicked -->
        <div id="image-container" class="hidden">
            <!-- Image will appear here on button click -->
        </div>
    </div>

    <!-- Translate Container (at the bottom of the page, centered) -->
    <div class="flex justify-center w-full">
        <!-- Main translate container with background, rounded corners and padding -->
        <div class="bg-[#f5f5f5] w-[75%] rounded-lg p-6">

          <!-- Title/Label container with flex and space between -->
            <div class="flex justify-center items-center space-x-4 w-full">
                <!-- First Button: Text to Sign -->
                <div class="w-[15%]">
                    <button class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200">
                        <i class="text-[#34a5c7] group-hover:text-white fas fa-sign-language"></i> <!-- Letter T Icon -->
                        <h3 class="font-bold">TEXT TO SIGN</h3>
                    </button>
                </div>

                <!-- Second Button: Voice to Sign -->
                <div class="w-[15%]">
                    <button class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200">
                        <i class="text-[#34a5c7] group-hover:text-white fas fa-microphone-alt"></i> <!-- Microphone Icon -->
                        <h3 class="font-bold">VOICE TO SIGN</h3>
                    </button>
                </div>

                <!-- Third Button: Sign to Text -->
                <div class="w-[15%]">
                    <button class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200">
                        <i class="text-[#34a5c7] group-hover:text-white fas fa-camera"></i> <!-- Camera Icon -->
                        <h3 class="font-bold">SIGN TO TEXT</h3>
                    </button>
                </div>

            </div>

            <!-- Bottom border under the buttons -->
            <div class="border-b border-gray-300 my-4"></div>

            <!-- Search bar and button -->
            <div class="w-[100%]">
                <div class="flex items-center space-x-2">
                    <!-- Search Input -->
                    <input type="text" placeholder="SEARCH FILIPINO SIGN LANGUAGE" class="w-full p-[1vw] bg-[#e1e1e1] rounded-lg border-none focus:ring-2 focus:ring-[#34a5c7]">

                    <!-- Search Button -->
                    <button class="p-5 bg-[#34a5c7] text-white rounded-lg">
                        <i class="text-white fas fa-search"></i> <!-- Magnifying Glass Icon -->
                    </button>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
</html>
