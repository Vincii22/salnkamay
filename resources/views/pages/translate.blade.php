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
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils"></script>

    <script src="{{ asset('js/textToSign.js') }}"></script>
    <script src="{{ asset('js/voiceToSign.js') }}"></script>
    <script src="{{ asset('js/signToText.js') }}"></script>

    @vite('resources/css/app.css')
</head>
<style>
    .sign-to-text-video {
        transform: scaleX(-1); /* Flips the camera horizontally */
        -webkit-transform: scaleX(-1); /* Ensures compatibility with older browsers */
        transform-origin: center; /* Keeps the video centered */
    }
</style>

@extends('layouts.app')

@section('content')
<body class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/1.png') }}'); background-repeat: no-repeat;">

    <!-- Main container -->
    <div class="flex justify-center items-center w-full h-auto min-h-[65vh] px-4">
        <!-- Image or Video display -->
        <div id="image-container" class="w-full flex flex-wrap justify-center items-center gap-2">
            @if ($signs->isNotEmpty())
                @foreach ($signs as $sign)
                    <div class="sm:w-[90vw] md:w-[50vw] lg:w-[35vw] flex-shrink-0">
                        @if ($sign->image_path ?? false)
                            <img src="{{ Storage::url($sign->image_path) }}" alt="Sign Image" class="w-full max-h-[40vh] object-contain rounded-lg">
                        @elseif ($sign->video_path ?? false)
                            <video autoplay loop controls class="w-full max-h-[40vh] object-contain rounded-lg">
                                <source src="{{ Storage::url($sign->video_path) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600">No results found for your search.</p>
            @endif
        </div>

    </div>


    <div id="gestureOutput" class="hidden text-center text-lg font-bold mt-4 text-[#34a5c7]">
        No hand detected
    </div>

    <!-- Translate Container (Mobile Optimized) -->
    <div class="flex justify-center w-full px-4">
        <div class="bg-[#f5f5f5] w-full sm:w-[90%] md:w-[75%] lg:w-[50%] rounded-lg p-4 md:p-6">

            <!-- Buttons Section -->
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-4 w-full">
                <button class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200 w-full md:w-[30%]">
                    <i class="text-[#34a5c7] group-hover:text-white fas fa-sign-language"></i>
                    <h3 class="font-bold">TEXT TO SIGN</h3>
                </button>

                <button id="startButton" class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200 w-full md:w-[30%]">
                    <i class="text-[#34a5c7] group-hover:text-white fas fa-microphone-alt"></i>
                    <h3 class="font-bold">VOICE TO SIGN</h3>
                </button>

                <button id="signToTextButton" class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200 w-full md:w-[30%]">
                    <i class="text-[#34a5c7] group-hover:text-white fas fa-camera"></i>
                    <h3 class="font-bold">SIGN TO TEXT</h3>
                </button>
            </div>

            <!-- Divider -->
            <div class="border-b border-gray-300 my-4"></div>

            <!-- Search Bar -->
            <div class="w-full">
                <form id="translateForm" class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-2">
                    <input type="text" id="searchInput" name="inputText"
                        placeholder="SEARCH FILIPINO SIGN LANGUAGE"
                        value="{{ old('inputText') }}"
                        class="w-full p-2 md:p-3 bg-[#e1e1e1] rounded-lg border-none focus:ring-2 focus:ring-[#34a5c7]">

                    <button type="submit" id="translateButton" class="p-3 md:p-5 bg-[#34a5c7] text-white rounded-lg w-full md:w-auto">
                        <i class="text-white fas fa-search"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>



    <!-- Add MediaPipe Library -->
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-core"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-converter"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-backend-webgl"></script>

    </body>
@endsection

</html>
