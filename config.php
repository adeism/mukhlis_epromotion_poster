<?php
// Configuration file for Mukhlis ePromotion Poster
return [
    // Basic Settings
    'app_name' => 'Mukhlis ePromotion Poster',
    'version' => '2.0.0',
    
    // Image Settings
    'image_folder' => 'images/',
    'thumbnail_folder' => 'thumbnails/',
    'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP', 'WEBP'],
    'max_file_size' => 5242880, // 5MB in bytes
    
    // Display Settings
    'slideshow_interval' => 10000, // milliseconds
    'transition_duration' => 500, // milliseconds
    'enable_ken_burns' => true,
    'enable_captions' => true,
    
    // Navigation Settings
    'enable_touch_swipe' => true,
    'enable_keyboard_nav' => true,
    'enable_auto_redirect' => true,
    'redirect_url' => 'https://psb.feb.ui.ac.id',
    'redirect_delay' => 500, // milliseconds
    
    // Admin Settings
    'admin_password' => 'your_secure_password_here',
    'enable_analytics' => true,
    
    // Cache Settings
    'enable_cache' => true,
    'cache_duration' => 3600, // seconds
    
    // Debug Settings
    'debug_mode' => false,
    'log_errors' => true
];
