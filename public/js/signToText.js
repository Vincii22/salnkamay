document.addEventListener("DOMContentLoaded", async function () {
    const signToTextButton = document.getElementById("signToTextButton");
    const btnStopCamera = document.createElement("button");
    const imageContainer = document.getElementById("image-container");
    const gestureOutput = document.getElementById("gestureOutput");

    let videoElement;
    let handDetector;
    let previousGesture = "";
    let gestureDatasets = {};
    let detectionStability = {};
    let isCameraActive = false;

    const MATCH_THRESHOLD = 0.35;
    const DISPLAY_DELAY = 1000;
    let debounceTimer = null;

    btnStopCamera.textContent = "Stop Camera";
    btnStopCamera.classList.add("bg-red-500", "text-white", "px-4", "py-2", "rounded", "mt-4", "hidden");
    imageContainer.appendChild(btnStopCamera);

    async function loadLandmarksDataset() {
        try {
            const [foods, numbers, alphabets] = await Promise.all([
                fetch("/hand_landmarks.json"),
                fetch("/hand_landmarks_numbers.json"),
                fetch("/hand_landmarks_alphabets.json")
            ]);

            gestureDatasets = {
                food: await foods.json(),
                numbers: await numbers.json(),
                alphabets: await alphabets.json()
            };

            console.log("✅ Landmark datasets loaded:", gestureDatasets); // <-- Add this to confirm dataset structure
        } catch (error) {
            console.error("❌ Error loading landmark datasets:", error);
        }
    }


    function showMessage(message) {
        gestureOutput.textContent = message;
        gestureOutput.classList.remove("hidden");
    }

    async function initializeCamera() {
        videoElement = document.createElement("video");
        videoElement.classList.add("sign-to-text-video", "w-full", "h-[50vh]", "object-contain", "rounded-lg");
        videoElement.setAttribute("autoplay", "");
        videoElement.setAttribute("playsinline", "");

        imageContainer.innerHTML = "";
        imageContainer.appendChild(videoElement);
        imageContainer.appendChild(btnStopCamera);
        btnStopCamera.classList.remove("hidden");

        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: { facingMode: "user", width: 640, height: 480 }
            });
            videoElement.srcObject = stream;

            // Confirm video feed is live
            videoElement.onloadedmetadata = () => {
                console.log("📹 Video feed is active and streaming.");
            };

        } catch (error) {
            console.error("🚨 Camera error:", error.message);
            showMessage("❌ Camera error: Please check your permissions.");
            return;
        }

        isCameraActive = true;
        showMessage("No hand detected");
    }

    function stopCamera() {
        if (isCameraActive && videoElement) {
            const stream = videoElement.srcObject;
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
            }

            videoElement.srcObject = null;
            videoElement.remove();
            console.log("🛑 Camera for Sign-to-Text stopped");

            btnStopCamera.classList.add("hidden");
            gestureOutput.classList.add("hidden");
            isCameraActive = false;
        }
    }

    async function loadHandTracking() {
        handDetector = new Hands({
            locateFile: file => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`
        });

        handDetector.setOptions({
            maxNumHands: 1,
            modelComplexity: 1,
            minDetectionConfidence: 0.6,
            minTrackingConfidence: 0.5
        });

        handDetector.onResults(processResults);

        const FRAME_INTERVAL = 300; // Delay in milliseconds (e.g., 300ms = ~3 FPS)
        let lastFrameTime = 0;

        const camera = new Camera(videoElement, {
            onFrame: async () => {
                const now = performance.now();

                if (now - lastFrameTime >= FRAME_INTERVAL) {
                    await handDetector.send({ image: videoElement });
                    lastFrameTime = now;
                }
            },
            width: 640,
            height: 480
        });

        camera.start();
    }


    let stableFrameCount = 0;
    const STABILITY_THRESHOLD = 5; // Minimum number of stable frames required

    function processResults(results) {
        if (results.multiHandLandmarks.length) {
            stableFrameCount++;
            console.log("🔎 Detected Landmarks:", normalizeLandmarks(results.multiHandLandmarks[0])); // <-- Add this
        } else {
            stableFrameCount = 0; // Reset counter on instability
        }

        if (stableFrameCount >= STABILITY_THRESHOLD) {
            console.log("✅ Stable Movement - Processing Frame");

            const detectedLandmarks = normalizeLandmarks(results.multiHandLandmarks[0]);
            const bestMatch = findBestMatch(detectedLandmarks);

            console.log(`🧩 Best Match: ${bestMatch.match} (Distance: ${bestMatch.distance})`);

            if (bestMatch.match !== "Unknown Gesture") {
                showMessage(`🖐️ Detected: ${bestMatch.match}`);
            } else {
                showMessage("❓ No match found");
            }

        } else {
            console.warn("⚠️ Unstable Movement - Skipping Frame");
        }
    }


    function findBestMatch(detectedLandmarks) {
        const matches = [
            matchHandGesture(detectedLandmarks, gestureDatasets.food),
            matchHandGesture(detectedLandmarks, gestureDatasets.numbers),
            matchHandGesture(detectedLandmarks, gestureDatasets.alphabets)
        ];

        const bestMatch = matches
            .filter(m => m.match !== "Unknown Gesture" && m.distance < MATCH_THRESHOLD)
            .sort((a, b) => a.distance - b.distance)[0] || { match: "Unknown Gesture" };

        if (bestMatch.match === "Unknown Gesture") {
            console.warn("🚨 No valid gesture detected");
        }

        return bestMatch;
    }


    function normalizeLandmarks(landmarks) {
        const normalized = landmarks.map((point) => ({
            x: point.x * videoElement.videoWidth,
            y: point.y * videoElement.videoHeight,
            z: point.z || 0 // <-- Ensure z-value exists
        }));

        console.log("🔎 Normalized Landmarks:", normalized); // <-- Add this
        return normalized;
    }



    function matchHandGesture(currentHand, dataset) {
        let bestMatch = "Unknown Gesture";
        let minDistance = Infinity;

        for (const [word, gestures] of Object.entries(dataset)) {
            for (const storedGesture of gestures) {
                const distance = calculateDistance(currentHand, storedGesture);
                console.log(`🔍 Comparing ${word}: Distance = ${distance}`);

                if (distance < minDistance) {
                    minDistance = distance;
                    bestMatch = word;
                }
            }
        }

        console.log(`✅ Best Match: ${bestMatch} (Distance: ${minDistance})`);
        return { match: bestMatch, distance: minDistance };
    }


    function calculateDistance(hand1, hand2) {
        if (!hand1 || !hand2 || hand1.length !== hand2.length) {
            console.warn("⚠️ Invalid landmarks data for distance calculation");
            return Infinity;  // Prevents `NaN` errors
        }

        let totalDistance = 0;
        for (let i = 0; i < hand1.length; i++) {
            const p1 = hand1[i];
            const p2 = hand2[i];

            // Ensure points are valid
            if (!p1 || !p2 || typeof p1.x !== 'number' || typeof p2.x !== 'number') {
                console.warn(`⚠️ Invalid point at index ${i}`);
                return Infinity;  // Prevents `NaN` propagation
            }

            totalDistance += (
                (p1.x - p2.x) ** 2 +
                (p1.y - p2.y) ** 2 +
                (p1.z - p2.z) ** 2
            );
        }

        return Math.sqrt(totalDistance / hand1.length); // Averaged distance for stability
    }


    signToTextButton.addEventListener("click", async function () {
        await loadLandmarksDataset();
        await initializeCamera();
        await loadHandTracking();
    });

    btnStopCamera.addEventListener("click", stopCamera);
});
