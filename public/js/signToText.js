document.addEventListener("DOMContentLoaded", async function () {
    const signToTextButton = document.getElementById("signToTextButton");
    const stopCameraButton = document.createElement("button"); // Stop Camera Button
    const imageContainer = document.getElementById("image-container");
    const gestureOutput = document.getElementById("gestureOutput");

    let videoElement;
    let handDetector;
    let lastDetectedGesture = "";
    let handLandmarksDataset = {};
    let handLandmarksNumbersDataset = {};
    let detectionStability = {};
    let isCameraActive = false; // Track camera state
    const STABILITY_THRESHOLD = 3;
    const MATCH_THRESHOLD = 0.15;

    // Stop Camera Button Setup
    stopCameraButton.textContent = "Stop Camera";
    stopCameraButton.classList.add("bg-red-500", "text-white", "px-4", "py-2", "rounded", "mt-4", "hidden");
    imageContainer.appendChild(stopCameraButton);

    async function loadLandmarksDataset() {
        try {
            const [foodsResponse, numbersResponse] = await Promise.all([
                fetch("/hand_landmarks.json"),
                fetch("/hand_landmarks_numbers.json")
            ]);

            handLandmarksDataset = await foodsResponse.json();
            handLandmarksNumbersDataset = await numbersResponse.json();

            console.log("✅ Landmark datasets loaded", {
                Foods: handLandmarksDataset,
                Numbers: handLandmarksNumbersDataset
            });
        } catch (error) {
            console.error("❌ Error loading landmark datasets:", error);
        }
    }

    async function setupCamera() {
        videoElement = document.createElement("video");
        videoElement.classList.add("sign-to-text-video", "w-full", "h-[50vh]", "object-contain", "rounded-lg");
        videoElement.setAttribute("autoplay", "");
        videoElement.setAttribute("playsinline", "");

        imageContainer.innerHTML = "";
        imageContainer.appendChild(videoElement);
        imageContainer.appendChild(stopCameraButton); // Show Stop Button
        stopCameraButton.classList.remove("hidden");

        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        videoElement.srcObject = stream;

        isCameraActive = true; // Mark camera as active
    }

    async function loadHandTracking() {
        handDetector = new Hands({
            locateFile: file => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`
        });

        handDetector.setOptions({
            maxNumHands: 1,
            modelComplexity: 1,
            minDetectionConfidence: 0.5,
            minTrackingConfidence: 0.5
        });

        handDetector.onResults(processResults);

        const camera = new Camera(videoElement, {
            onFrame: async () => {
                await handDetector.send({ image: videoElement });
            },
            width: 640,
            height: 480
        });

        camera.start();
    }

    function stopCamera() {
        if (isCameraActive && videoElement) {
            const stream = videoElement.srcObject;
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop()); // Stop camera tracks
            }

            videoElement.srcObject = null;
            videoElement.remove();
            console.log("🛑 Camera for Sign-to-Text stopped");

            stopCameraButton.classList.add("hidden"); // Hide Stop Button
            isCameraActive = false;
        }
    }

    function processResults(results) {
        if (!gestureOutput) {
            console.error("❌ gestureOutput element not found!");
            return;
        }

        if (!results.multiHandLandmarks || results.multiHandLandmarks.length === 0) {
            lastDetectedGesture = "";
            gestureOutput.textContent = "No hand detected";
            return;
        }

        const detectedLandmarks = normalizeLandmarks(results.multiHandLandmarks[0]);

        const detectedFoodGesture = matchHandGesture(detectedLandmarks, handLandmarksDataset);
        const detectedNumberGesture = matchHandGesture(detectedLandmarks, handLandmarksNumbersDataset);

        let bestMatch;
        if (detectedFoodGesture.match !== "Unknown Gesture") {
            bestMatch = `[Food] ${detectedFoodGesture.match}`;
        } else if (detectedNumberGesture.match !== "Unknown Gesture") {
            bestMatch = `[Number] ${detectedNumberGesture.match}`;
        } else {
            bestMatch = "Unknown Gesture";
        }

        if (bestMatch === lastDetectedGesture) {
            detectionStability[bestMatch] = (detectionStability[bestMatch] || 0) + 1;
        } else {
            detectionStability[bestMatch] = 1;
        }

        if (detectionStability[bestMatch] >= STABILITY_THRESHOLD) {
            console.log("Detected Gesture:", bestMatch);
            gestureOutput.textContent = "Detected: " + bestMatch;
            lastDetectedGesture = bestMatch;
        }
    }

    function normalizeLandmarks(landmarks) {
        const base = landmarks[0];
        return landmarks.map(lm => [lm.x - base.x, lm.y - base.y, lm.z - base.z]);
    }

    function matchHandGesture(currentHand, dataset) {
        let bestMatch = "Unknown Gesture";
        let minDistance = Infinity;

        for (const [word, gestures] of Object.entries(dataset)) {
            for (const storedGesture of gestures) {
                const distance = calculateDistance(currentHand, storedGesture);
                if (distance < minDistance) {
                    minDistance = distance;
                    bestMatch = word;
                }
            }
        }

        console.log(`Best match: ${bestMatch} (Distance: ${minDistance.toFixed(4)})`);

        return minDistance < MATCH_THRESHOLD
            ? { match: bestMatch, distance: minDistance }
            : { match: "Unknown Gesture", distance: minDistance };
    }

    function calculateDistance(hand1, hand2) {
        let sum = 0;
        for (let i = 0; i < hand1.length; i++) {
            const dx = hand1[i][0] - hand2[i][0];
            const dy = hand1[i][1] - hand2[i][1];
            const dz = hand1[i][2] - hand2[i][2];
            sum += dx * dx + dy * dy + dz * dz;
        }
        return Math.sqrt(sum / hand1.length);
    }

    signToTextButton.addEventListener("click", async function () {
        await loadLandmarksDataset();
        await setupCamera();
        await loadHandTracking();
    });

    stopCameraButton.addEventListener("click", stopCamera); // Stop button action
});
