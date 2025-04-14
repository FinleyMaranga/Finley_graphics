<div class="container mt-5">
    <h2 class="text-center text-white fw-bold">Gallery</h2>
    <p class="text-center text-light">Explore our creative works and moments.</p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="galleryGrid">
        <?php 
        $images = [
            "Master.png", "finposter.png", "Graduation.png", 
            "poster.png", "Graduation (1).png", "company.png",
            "223.png", "mee.png", "Kirui.jpg", "FinleyGraphics.png"
        ];

        foreach ($images as $img) {
            echo '<div class="col">';
            echo '    <div class="gallery-item">';
            echo '        <img src="'.$img.'" class="img-fluid rounded gallery-img" alt="Gallery Image">';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<!-- Lightbox Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <img id="modalImage" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles for a Vibrant Look -->
<style>
    /* Gradient Background */
    body {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fad0c4, #ffdde1);
        background-size: 400% 400%;
        animation: gradientBG 10s ease infinite;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Centered Content */
    .container {
        background: rgba(0, 0, 0, 0.6);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* Responsive Grid Layout */
    #galleryGrid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background: linear-gradient(120deg, #ff758c, #ff7eb3);
        padding: 10px;
    }

    /* Ensure images are fully visible */
    .gallery-item img {
        width: 100%;
        height: 250px; /* Adjust height for uniformity */
        object-fit: contain; /* Shows full image without cropping */
        display: block;
        border-radius: 15px;
        transition: transform 0.3s ease-in-out;
    }

    /* Hover Effects */
    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 16px rgba(255, 100, 150, 0.5);
    }

    .gallery-item:hover img {
        transform: scale(1.1);
        filter: brightness(1.2);
    }

    /* Modal Dark Theme */
    .modal-content {
        border-radius: 20px;
        border: none;
    }

    .modal-body img {
        border-radius: 15px;
    }
</style>

<!-- JavaScript for Lightbox Effect -->
<script>
    document.querySelectorAll('.gallery-img').forEach(img => {
        img.addEventListener('click', function () {
            document.getElementById('modalImage').src = this.src;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        });
    });
</script>
