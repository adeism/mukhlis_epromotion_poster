<?php
require_once 'functions.php';
$config = require_once 'config.php';

$imageManager = new ImageManager($config);
$images = $imageManager->getImages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['app_name']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="slideshow-container">
        <img id="fullscreenImage" src="" alt="Promotional Image">
        <div id="caption"></div>
        
        <?php if ($config['enable_captions']): ?>
        <div id="caption-container"></div>
        <?php endif; ?>
        
        <?php if ($config['debug_mode']): ?>
        <div id="debug-info"></div>
        <?php endif; ?>
        
        <div id="controls">
            <button id="prevBtn">&lt;</button>
            <button id="playPauseBtn">⏸</button>
            <button id="nextBtn">&gt;</button>
        </div>
        
        <div id="progress-bar">
            <div id="progress"></div>
        </div>
        
        <?php if ($config['enable_touch_swipe']): ?>
        <div id="swipe-indicator"></div>
        <?php endif; ?>
    </div>

    <div id="thumbnail-container">
        <?php foreach ($images as $index => $image): ?>
        <div class="thumbnail" data-index="<?php echo $index; ?>">
            <img src="<?php echo $image['thumbnail']; ?>" alt="<?php echo $image['caption']; ?>">
        </div>
        <?php endforeach; ?>
    </div>

    <script>
        const config = <?php echo json_encode($config); ?>;
        const images = <?php echo json_encode($images); ?>;
    </script>
    <script src="slideshow.js"></script>
</body>
</html>
