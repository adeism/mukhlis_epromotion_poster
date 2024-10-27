# Mukhlis ePromotion Poster

Mukhlis ePromotion Poster is a simple yet effective web application designed to create an automated image slideshow from a folder of images. The application automatically loads and displays all images from the designated folder in fullscreen mode, creating a seamless promotional display system.

## 🌟 Features

- **Automatic Image Loading**: Automatically detects and loads all images from the `images` folder
- **Multiple Format Support**: Supports various image formats including JPG, JPEG, PNG, GIF, BMP, and WEBP
- **Fullscreen Display**: Shows images in fullscreen mode for maximum impact
- **Smooth Transitions**: Features fade transitions between images
- **Auto-Rotation**: Automatically rotates through images every 10 seconds
- **Interactive Navigation**: Click or press any key to redirect to a specified URL
- **Chronological Order**: Displays images sorted by modification time (newest first)
- **Responsive Design**: Adapts to different screen sizes and orientations

## 📋 Prerequisites

- PHP-enabled web server (Apache, Nginx, etc.)
- Web browser with JavaScript enabled
- File system access for image storage

## 🚀 Installation

1. Clone the repository:
```bash
git clone https://github.com/adeism/mukhlis_epromotion_poster.git
```

2. Create an `images` folder in the root directory (if it doesn't exist):
```bash
mkdir images
```

3. Place your promotional images in the `images` folder

4. Configure your web server to serve the application

## 📁 Project Structure

```
mukhlis_epromotion_poster/
│
├── index.php          # Main application file
├── images/           # Folder containing promotional images
└── README.md         # Project documentation
```

## 🔧 Configuration

To modify the redirect URL, locate the following line in the JavaScript code:
```javascript
window.location.href = 'https://psb.feb.ui.ac.id';
```
Replace the URL with your desired destination.

To adjust the slideshow timing, modify the following line:
```javascript
setInterval(changeImage, 10000); // 10000ms = 10 seconds
```

## 💡 Usage

1. Upload your promotional images to the `images` folder
2. Access the application through your web browser
3. The slideshow will start automatically
4. Click anywhere or press any key to redirect to the configured URL

## 🖼️ Supported Image Formats

- JPG/JPEG
- PNG
- GIF
- BMP
- WEBP

Files are supported in both lowercase and uppercase extensions.

## ⚠️ Important Notes

- Ensure proper permissions are set on the `images` folder
- Image files should be optimized for web display to ensure smooth performance
- The application automatically sorts images by modification time, showing the newest first

## 🤝 Contributing

Feel free to fork this project and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

This project is open source and available under the [MIT License](LICENSE).
