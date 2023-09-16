<!-- Mukhlis ePromotion Poster https://github.com/adeism/mukhlis_epromotion_poster
Mukhlis ePromotion Poster is an application created to load all the images
in the images folder without needing to know the number of names of the images in it.-->


<!DOCTYPE html>
<html>
<head>
    <title>Mukhlis ePromotion Poster</title>
    <style>
         body, html {
                margin: 0;
                padding: 0;
                height: 100vh;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f2f2f2; /* Set a background color to enhance contrast */
            }

            #fullscreenImage {
                max-width: 100%;
                max-height: 100%;
                object-fit: cover;
                transition: opacity 0.3s ease-in-out; /* Increased duration for a smoother transition */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow effect */
            }
    </style>
</head>
<body>
    <img id="fullscreenImage" src="" alt="Full Screen Image">
    <script>
        const fullscreenImage = document.getElementById('fullscreenImage');
        let currentIndex = 0;
        let imageSources = [];
        <?php
            // Retrieve image filenames from the "images" folder
            $imageFolder = 'images/';
            $imageFiles = glob($imageFolder . '*.{jpg,jpeg,png,gif,bmp,webp}', GLOB_BRACE);
            $imageSources = json_encode($imageFiles);
        ?>
        imageSources = <?php echo $imageSources; ?>;

        // Function to change the image source with a fade effect
        function changeImage() {
            fullscreenImage.style.opacity = 0;
            setTimeout(() => {
                fullscreenImage.src = imageSources[currentIndex];
                currentIndex = (currentIndex + 1) % imageSources.length;
                fullscreenImage.style.opacity = 1;
            }, 500);
        }

        // Initial image change
        changeImage();

        // Set interval to change image every 10 seconds
        setInterval(changeImage, 10000);
    </script>
</body>
</html>
