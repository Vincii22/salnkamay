document.addEventListener("DOMContentLoaded", async function () {
    let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'en-US';

    const searchInput = document.getElementById('searchInput');
    const imageContainer = document.getElementById('image-container');
    const startButton = document.getElementById('startButton');
    const signToTextButton = document.getElementById('signToTextButton');
    const textToSignButton = document.querySelector('.fa-sign-language').closest('button');

    let isRecognitionActive = false; // Track if recognition is active
    let recognitionTimeout; // Separate timeout for auto-restart logic

    // Start Speech Recognition
    if (startButton) {
        startButton.addEventListener('click', function () {
            console.log("✅ Voice-to-Sign button clicked!");

            if (!isRecognitionActive) {
                try {
                    recognition.start();
                    isRecognitionActive = true;
                    console.log("✅ Speech recognition started");
                } catch (error) {
                    console.error("❌ Error starting speech recognition:", error);
                }
            }
        });
    }

    // Stop Speech Recognition (On Button Click)
    function stopSpeechRecognition() {
        if (isRecognitionActive) {
            recognition.stop();
            isRecognitionActive = false; // Mark as inactive
            console.log("🛑 Speech recognition stopped by user action");
        }

        // Clear auto-restart timeout to prevent unintended restarts
        clearTimeout(recognitionTimeout);
    }

    // Attach the stop logic to the buttons
    if (textToSignButton) {
        textToSignButton.addEventListener('click', stopSpeechRecognition);
    }

    if (signToTextButton) {
        signToTextButton.addEventListener('click', stopSpeechRecognition);
    }

    // When recognition starts
    recognition.onstart = function () {
        searchInput.value = '';
        console.log('🎤 Listening...');

        // Auto-stop and restart logic
        recognitionTimeout = setTimeout(() => {
            if (isRecognitionActive) {
                recognition.stop();
                isRecognitionActive = false;

                // Clear search input and restart recognition
                searchInput.value = '';
                console.log("🛑 No speech detected. Clearing input and restarting...");

                setTimeout(() => {
                    recognition.start();
                    isRecognitionActive = true;
                    console.log("🔄 Restarting speech recognition...");
                }, 1000); // Short delay before restarting
            }
        }, 2000);
    };

    // Handle speech recognition results
    recognition.onresult = function (event) {
        let transcript = '';
        for (let i = event.resultIndex; i < event.results.length; i++) {
            transcript += event.results[i][0].transcript;
        }

        searchInput.value = transcript;

        fetchSearchResults(transcript);
    };

    // Fetch search results
    function fetchSearchResults(query) {
        if (!query.trim()) return;

        fetch(`/translate?inputText=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, "text/html");
                const newResults = doc.getElementById("image-container");

                if (newResults) {
                    imageContainer.innerHTML = newResults.innerHTML;
                }
            })
            .catch(error => console.error("❌ Error fetching search results:", error));
    }

    recognition.onerror = function (event) {
        console.error("❌ Speech recognition error:", event.error);
    };

    recognition.onend = function () {
        console.log("🔄 Recognition ended.");
        isRecognitionActive = false; // Ensure the state is updated
    };
});
