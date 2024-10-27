class Slideshow {
    constructor(config, images) {
        this.config = config;
        this.images = images;
        this.currentIndex = 0;
        this.isPlaying = true;
        this.redirectOnNext = false;
        this.touchStartX = 0;
        this.touchEndX = 0;
        
        this.elements = {
            image: document.getElementById('fullscreenImage'),
            caption: document.getElementById('caption-container'),
            progress: document.getElementById('progress'),
            playPauseBtn: document.getElementById('playPauseBtn'),
            prevBtn: document.getElementById('prevBtn'),
            nextBtn: document.getElementById('nextBtn'),
            debug: document.getElementById('debug-info'),
            swipeIndicator: document.getElementById('swipe-indicator')
        };
        
        this.initialize();
    }
    
    initialize() {
        this.setupEventListeners();
        this.showImage(0);
        this.startSlideshow();
        
        if (this.config.debug_mode) {
            this.elements.debug.style.display = 'block';
        }
    }
    
    setupEventListeners() {
        // Control buttons
        this.elements.playPauseBtn.addEventListener('click', () => this.togglePlayPause());
        this.elements.prevBtn.addEventListener('click', () => this.previousImage());
        this.elements.nextBtn.addEventListener('click', () => this.nextImage());
        
        // Keyboard navigation
        if (this.config.enable_keyboard_nav) {
            document.addEventListener('keydown', (e) => this.handleKeyPress(e));
        }
        
        // Touch events
        if (this.config.enable_touch_swipe) {
            document.addEventListener('touchstart', (e) => this.handleTouchStart(e));
            document.addEventListener
