document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.foto img');
    const modal = document.getElementById('image-modal');
    const zoomedImage = document.getElementById('zoomed-image');
    const closeButton = document.querySelector('.close-button');

    images.forEach(image => {
        image.addEventListener('click', function() {
            modal.style.display = 'flex'; // Use flex to center the content
            zoomedImage.src = this.src;
            zoomedImage.alt = this.alt;
            // Optional: Add a class to apply a slight zoom effect if desired
            // zoomedImage.classList.add('zoomed');
        });
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
        // Optional: Remove the zoom class when closing
        // zoomedImage.classList.remove('zoomed');
    });

    // Close the modal if the user clicks anywhere outside the image
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            // Optional: Remove the zoom class when closing
            // zoomedImage.classList.remove('zoomed');
        }
    });

    // Optional: Close with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'flex') {
            modal.style.display = 'none';
            // Optional: Remove the zoom class when closing
            // zoomedImage.classList.remove('zoomed');
        }
    });
});