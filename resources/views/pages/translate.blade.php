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
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>

    @vite('resources/css/app.css')
</head>

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

    <script>
        // Accessing the user's camera
        const signToTextButton = document.getElementById('signToTextButton');
        const imageContainer = document.getElementById('image-container');

        signToTextButton.addEventListener('click', function() {
            // Create a new video element
            const videoElement = document.createElement('video');
            videoElement.setAttribute('class', 'w-full h-[50vh] object-contain rounded-lg');
            videoElement.setAttribute('autoplay', '');
            videoElement.setAttribute('playsinline', ''); // Required for iOS Safari

            // Append the video element to the container
            imageContainer.innerHTML = '';  // Clear the current content
            imageContainer.appendChild(videoElement);

            // Access the camera
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    // Set the video stream to the video element
                    videoElement.srcObject = stream;
                })
                .catch(function(error) {
                    console.error('Error accessing the camera: ', error);
                });
        });
    </script>
    <script>

document.addEventListener("DOMContentLoaded", function () {
    let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

    recognition.continuous = true;  // Keep listening indefinitely
    recognition.interimResults = true;  // Show results while speaking
    recognition.lang = 'en-US';

    const searchInput = document.getElementById('searchInput');
    const imageContainer = document.getElementById('image-container');
    const startButton = document.getElementById('startButton');

    let recognitionTimeout; // Store timeout reference

    if (startButton) {
        startButton.addEventListener('click', function () {
            console.log("✅ Voice-to-Sign button clicked!");

            try {
                recognition.start();
                console.log("✅ Speech recognition started");
            } catch (error) {
                console.error("❌ Error starting speech recognition:", error);
            }
        });
    } else {
        console.error("❌ Voice-to-Sign button not found in the DOM!");
    }

    // When recognition starts: Clear input and stop after 2 seconds
    recognition.onstart = function () {
        searchInput.value = ''; // Clear previous text
        console.log('🎤 Listening...');

        // Stop recognition after 2 seconds
        recognitionTimeout = setTimeout(() => {
            recognition.stop();
            console.log("🛑 Stopping speech recognition after 2 seconds...");
        }, 2000);
    };

    // Handle speech recognition results
    recognition.onresult = function (event) {
        let transcript = '';
        for (let i = event.resultIndex; i < event.results.length; i++) {
            transcript += event.results[i][0].transcript; // Get recognized words
        }

        // Update input field
        searchInput.value = transcript;

        // Perform search dynamically
        fetchSearchResults(transcript);
    };

    // Function to fetch search results (Fix Duplicate UI Issue)
    function fetchSearchResults(query) {
        if (!query.trim()) return;

        fetch(`/translate?inputText=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                // Extract only the results part (Avoid replacing full page content)
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, "text/html");
                const newResults = doc.getElementById("image-container");

                if (newResults) {
                    imageContainer.innerHTML = newResults.innerHTML; // Update only the results, not the full page
                }
            })
            .catch(error => console.error("❌ Error fetching search results:", error));
    }

    // Handle recognition errors
    recognition.onerror = function (event) {
        console.error("❌ Speech recognition error:", event.error);
    };

    // Restart recognition after 5 seconds
    recognition.onend = function () {
        console.log("🔄 Recognition ended. Restarting in 5 seconds...");

        clearTimeout(recognitionTimeout); // Clear any previous timeout

        setTimeout(() => {
            recognition.start();
            console.log("✅ Restarting speech recognition after 5 seconds...");
        }, 2000);
    };
});

    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const translateForm = document.getElementById("translateForm");
        const searchInput = document.getElementById("searchInput");
        const imageContainer = document.getElementById("image-container");

        translateForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            const query = searchInput.value.trim();
            if (!query) return; // Stop if the input is empty

            fetch(`/translate?inputText=${encodeURIComponent(query)}`)
                .then(response => response.text())
                .then(data => {
                    // Extract only the relevant part of the response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, "text/html");
                    const newResults = doc.getElementById("image-container");

                    if (newResults) {
                        imageContainer.innerHTML = newResults.innerHTML; // Update only the results
                    }
                })
                .catch(error => console.error("❌ Error fetching search results:", error));
        });
    });
    </script>
    </body>
@endsection

</html>
