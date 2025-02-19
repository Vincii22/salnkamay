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
    <body class="bg-cover bg-center" style="background-image: url('{{ asset('images/1.png') }}'); background-repeat: no-repeat;">

    <!-- Main container centered vertically and horizontally -->
    <div class="flex justify-center items-center w-full h-[65vh]">
        <!-- Placeholder for image when translate button is clicked -->
        <div id="image-container">
            @if ($signs->isNotEmpty())
                <!-- Flex container for displaying items horizontally when there are 2 or more signs -->
                <div class="w-full flex justify-center items-center flex-wrap gap-2">
                    @foreach ($signs as $sign)
                        <!-- If there's only one result, center it and make it 50% width, else flex it with desired width -->
                        <div class="{{ count($signs) > 1 ? 'w-[25vw] md:w-[30vw] lg:w-[35vw]' : 'w-[50vw]' }} flex-shrink-0">
                            <!-- Displaying Sign Image or Video -->
                            @if ($sign->image_path ?? false)
                                <img src="{{ Storage::url($sign->image_path) }}" alt="Sign Image" class="w-full h-[50vh] object-contain rounded-lg">
                            @elseif ($sign->video_path ?? false)
                                <video autoplay loop controls class="w-full h-[50vh] object-contain rounded-lg">
                                    <source src="{{ Storage::url($sign->video_path) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p>No results found for your search.</p>
            @endif
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
                <!-- Voice to Sign Button -->
                <div class="w-[15%]">
                    <button id="startButton" class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200">
                        <i class="text-[#34a5c7] group-hover:text-white fas fa-microphone-alt"></i> <!-- Microphone Icon -->
                        <h3 class="font-bold">VOICE TO SIGN</h3>
                    </button>
                </div>

                <!-- Third Button: Sign to Text -->
                <div class="w-[15%]">
                    <button id="signToTextButton" class="group flex items-center justify-center space-x-2 p-2 rounded-lg bg-transparent hover:bg-[#34a5c7] hover:text-white transition-all duration-200">
                        <i class="text-[#34a5c7] group-hover:text-white fas fa-camera"></i> <!-- Camera Icon -->
                        <h3 class="font-bold">SIGN TO TEXT</h3>
                    </button>
                </div>

            </div>

            <!-- Bottom border under the buttons -->
            <div class="border-b border-gray-300 my-4"></div>

          <!-- Search bar and button -->
            <div class="w-[100%]">
                <form action="{{ route('translate') }}" method="GET" class="flex items-center space-x-2">
                    <!-- Search Input -->
                    <input
                        type="text"
                        id="searchInput"
                        name="inputText"
                        placeholder="SEARCH FILIPINO SIGN LANGUAGE"
                        value="{{ old('inputText') }}"
                        class="w-full p-[1vw] bg-[#e1e1e1] rounded-lg border-none focus:ring-2 focus:ring-[#34a5c7]"
                    >

                    <!-- Search Button -->
                    <button type="submit" class="p-5 bg-[#34a5c7] text-white rounded-lg">
                        <i class="text-white fas fa-search"></i> <!-- Magnifying Glass Icon -->
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
    </body>
@endsection

</html>
