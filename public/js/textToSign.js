document.addEventListener("DOMContentLoaded", function () {
    const translateForm = document.getElementById("translateForm");
    const searchInput = document.getElementById("searchInput");
    const imageContainer = document.getElementById("image-container");

    const loadingIndicator = document.createElement("div");
    loadingIndicator.className = "text-center text-[#34a5c7] font-bold mt-4";
    loadingIndicator.innerHTML = "⏳ Searching...";

    translateForm.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevent default form submission

        const query = searchInput.value.trim();
        if (!query) return; // Stop if the input is empty

        imageContainer.innerHTML = "";
        imageContainer.appendChild(loadingIndicator); // Show loading indicator

        try {
            // Step 1: Try fetching the full phrase
            const fullPhraseResponse = await fetch(`/translate?inputText=${encodeURIComponent(query)}`);
            const fullPhraseData = await fullPhraseResponse.text();

            const parser = new DOMParser();
            const fullPhraseDoc = parser.parseFromString(fullPhraseData, "text/html");
            const fullPhraseResults = fullPhraseDoc.getElementById("image-container");

            if (fullPhraseResults && fullPhraseResults.children.length > 0) {
                // ✅ Full phrase found — display it
                imageContainer.innerHTML = fullPhraseResults.innerHTML;
                return;
            }

            // Step 2: Full phrase not found — Try individual words in a single request
            const words = query.split(' ');

            const wordSearchResponse = await fetch(`/translate-multiple?words=${encodeURIComponent(words.join(','))}`);
            const wordSearchData = await wordSearchResponse.text();

            const wordDoc = parser.parseFromString(wordSearchData, "text/html");
            const wordResults = wordDoc.getElementById("image-container");

            if (wordResults && wordResults.children.length > 0) {
                imageContainer.innerHTML = wordResults.innerHTML;
            } else {
                imageContainer.innerHTML = `<p class="text-center text-gray-600">No results found.</p>`;
            }

        } catch (error) {
            console.error("❌ Error fetching search results:", error);
            imageContainer.innerHTML = `<p class="text-center text-red-500">❌ Error fetching results. Please try again.</p>`;
        }
    });
});
