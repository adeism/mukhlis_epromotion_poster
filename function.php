<?php
class ImageManager {
    private $config;
    private $cache;
    
    public function __construct($config) {
        $this->config = $config;
        $this->cache = new Cache();
    }
    
    public function getImages() {
        if ($this->config['enable_cache']) {
            $cached = $this->cache->get('image_list');
            if ($cached) return $cached;
        }
        
        $images = [];
        $files = glob($this->config['image_folder'] . '*.{' . implode(',', $this->config['allowed_extensions']) . '}', GLOB_BRACE);
        
        foreach ($files as $file) {
            $image = [
                'path' => $file,
                'modified' => filemtime($file),
                'size' => filesize($file),
                'caption' => $this->getImageCaption($file),
                'thumbnail' => $this->generateThumbnail($file)
            ];
            
            if ($this->validateImage($image)) {
                $images[] = $image;
            }
        }
        
        usort($images, function($a, $b) {
            return $b['modified'] - $a['modified'];
        });
        
        if ($this->config['enable_cache']) {
            $this->cache->set('image_list', $images, $this->config['cache_duration']);
        }
        
        return $images;
    }
    
    private function validateImage($image) {
        if ($image['size'] > $this->config['max_file_size']) {
            $this->logError("File too large: " . $image['path']);
            return false;
        }
        
        if (!getimagesize($image['path'])) {
            $this->logError("Invalid image: " . $image['path']);
            return false;
        }
        
        return true;
    }
    
    private function generateThumbnail($imagePath) {
        $thumbnailPath = $this->config['thumbnail_folder'] . basename($imagePath);
        
        if (file_exists($thumbnailPath)) {
            return $thumbnailPath;
        }
        
        try {
            $image = imagecreatefromstring(file_get_contents($imagePath));
            $width = imagesx($image);
            $height = imagesy($image);
            $ratio = $width / $height;
            
            $newWidth = 150;
            $newHeight = 150 / $ratio;
            
            $thumbnail = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
            imagejpeg($thumbnail, $thumbnailPath, 80);
            return $thumbnailPath;
        } catch (Exception $e) {
            $this->logError("Thumbnail generation failed: " . $e->getMessage());
            return $imagePath;
        }
    }
    
    private function getImageCaption($imagePath) {
        $caption = basename($imagePath, '.' . pathinfo($imagePath, PATHINFO_EXTENSION));
        return str_replace('_', ' ', $caption);
    }
    
    private function logError($message) {
        if ($this->config['log_errors']) {
            error_log(date('[Y-m-d H:i:s] ') . $message . PHP_EOL, 3, 'logs/error.log');
        }
    }
}

class Cache {
    private $cacheDir = 'cache/';
    
    public function get($key) {
        $filename = $this->cacheDir . md5($key);
        if (file_exists($filename)) {
            $data = unserialize(file_get_contents($filename));
            if ($data['expires'] > time()) {
                return $data['content'];
            }
            unlink($filename);
        }
        return false;
    }
    
    public function set($key, $content, $duration) {
        $filename = $this->cacheDir . md5($key);
        $data = [
            'expires' => time() + $duration,
            'content' => $content
        ];
        file_put_contents($filename, serialize($data));
    }
}

class Analytics {
    public static function logView($imageId) {
        $db = new SQLite3('analytics.db');
        $db->exec("CREATE TABLE IF NOT EXISTS views (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            image_id TEXT,
            viewed_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
        
        $stmt = $db->prepare("INSERT INTO views (image_id) VALUES (:image_id)");
        $stmt->bindValue(':image_id', $imageId, SQLITE3_TEXT);
        $stmt->execute();
    }
}
