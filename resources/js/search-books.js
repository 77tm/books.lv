
document.addEventListener('DOMContentLoaded', function() {

    // Get the necessary elements
    const addReviewButton = document.getElementById('add-review-button');
    const overlay = document.getElementById('overlay');
    const modal = document.getElementById('modal');

    // Add click event listener to the Add Review button
    addReviewButton.addEventListener('click', function() {
    // Show the overlay and modal
    overlay.style.display = 'flex';
    document.body.classList.add('blurred'); // Blur the background content
    });

    // Close the modal when clicked outside the form
    overlay.addEventListener('click', function(event) {
    if (event.target === overlay) {
        overlay.style.display = 'none';
        document.body.classList.remove('blurred'); // Remove blur from the background content
    }
    });



// Retrieve the necessary elements
        const searchInput = document.getElementById('search-input');
        const searchResults = document.getElementById('search-results');

// Add an event listener to the search input
        searchInput.addEventListener('input', function() {
            const searchValue = this.value.trim();

            // Clear the search results
            searchResults.innerHTML = '';

            // Check if the search value is not empty
            if (searchValue !== '') {
                // Send an Ajax request to fetch matching book variants
                fetch(`/books/search?search=${encodeURIComponent(searchValue)}`)
                    .then(response => response.json())
                    .then(data => {
                        // Display the matching book variants in the search results
                        data.forEach(bookVariant => {
                            const li = document.createElement('li');
                            li.textContent = bookVariant.name;
                            searchResults.appendChild(li);
                        });
                    });
            }
        });




});
  

