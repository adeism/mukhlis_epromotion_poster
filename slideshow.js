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
            document.addEventListener('touchend', (e) => this.handleTouchEnd(e));
        }

document.getElementById('themeToggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
    document.body.classList.toggle('light');
});

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';
}

document.getElementById('fileInput').addEventListener('change', (e) => {
    const files = e.target.files;
    const formData = new FormData();
    for (const file of files) {
        formData.append('images[]', file);
    }

    fetch('upload.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              location.reload();
          } else {
              showError(data.message);
          }
      });
});('keydown', (e) => this.handleKeyPress(e));
        }
        
        // Touch events
        if (this.config.enable_touch_swipe) {
            document.addEventListener('touchend', (e) => this.handleTouchEnd(e));
        }

document.getElementById('themeToggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
    document.body.classList.toggle('light');
});

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';
}

document.getElementById('fileInput').addEventListener('change', (e) => {
    const files = e.target.files;
    const formData = new FormData();
    for (const file of files) {
        formData.append('images[]', file);
    }

    fetch('upload.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              location.reload();
          } else {
              showError(data.message);
          }
      });
});('touchstart', (e) => this.handleTouchStart(e));
            document.addEventListener('touchend', (e) => this.handleTouchEnd(e));
        }

document.getElementById('themeToggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
    document.body.classList.toggle('light');
});

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';
}

document.getElementById('fileInput').addEventListener('change', (e) => {
    const files = e.target.files;
    const formData = new FormData();
    for (const file of files) {
        formData.append('images[]', file);
    }

    fetch('upload.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              location.reload();
          } else {
              showError(data.message);
          }
      });
});
