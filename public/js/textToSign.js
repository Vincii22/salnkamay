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
