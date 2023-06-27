document.addEventListener('DOMContentLoaded', function() {
    const editReviewButtons = document.querySelectorAll('.edit-review-button');
    const overlays = document.querySelectorAll('.overlay');
    const modals = document.querySelectorAll('.edit-review-show');
  
    editReviewButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        const reviewId = this.getAttribute('data-review-id');
        const modalId = `edit-review-${reviewId}`;
  
        // Show the overlay
        overlays.forEach(function(overlay) {
          overlay.style.display = 'flex';
        });
        document.body.classList.add('blurred');
  
        // Show the modal for the clicked review
        const modal = document.getElementById(modalId);
        modal.style.display = 'block';
      });
    });
  
    overlays.forEach(function(overlay) {
      overlay.addEventListener('click', function(event) {
        if (event.target === overlay) {
          overlays.forEach(function(overlay) {
            overlay.style.display = 'none';
          });
          document.body.classList.remove('blurred');
          modals.forEach(function(modal) {
            modal.style.display = 'none';
          });
        }
      });
    });
  });
  