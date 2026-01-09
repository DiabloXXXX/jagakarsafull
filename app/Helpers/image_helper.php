<?php

/**
 * Image Helper Functions
 * 
 * Helper untuk menghandle upload dan resize gambar
 */

if (!function_exists('upload_and_resize_image')) {
    /**
     * Upload dan resize gambar jika melebihi ukuran maksimum
     * 
     * @param \CodeIgniter\HTTP\Files\UploadedFile $file File yang diupload
     * @param string $uploadPath Path tujuan upload (relatif dari public/)
     * @param int $maxWidth Lebar maksimum gambar (default: 1920)
     * @param int $maxHeight Tinggi maksimum gambar (default: 1080)
     * @param int $quality Kualitas kompresi JPEG (default: 85)
     * @return array ['success' => bool, 'filename' => string, 'error' => string]
     */
    function upload_and_resize_image($file, string $uploadPath, int $maxWidth = 1920, int $maxHeight = 1080, int $quality = 85): array
    {
        // ===== SECURITY LAYER 1: Basic Validation =====
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return [
                'success' => false,
                'filename' => null,
                'error' => 'File tidak valid atau sudah dipindahkan'
            ];
        }

        // ===== SECURITY LAYER 2: MIME Type Validation =====
        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        $fileMime = $file->getMimeType();
        
        if (!in_array($fileMime, $allowedMimes)) {
            log_message('warning', 'Blocked upload - Invalid MIME: ' . $fileMime . ' from IP: ' . service('request')->getIPAddress());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Hanya file gambar (JPG, PNG, GIF, WebP) yang diperbolehkan'
            ];
        }

        // ===== SECURITY LAYER 3: Extension Whitelist =====
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExtension = strtolower($file->getClientExtension());
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            log_message('warning', 'Blocked upload - Invalid extension: ' . $fileExtension . ' from IP: ' . service('request')->getIPAddress());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Ekstensi file tidak diperbolehkan'
            ];
        }

        // ===== SECURITY LAYER 4: File Size Validation =====
        $maxSize = 5 * 1024 * 1024; // 5MB for security
        if ($file->getSize() > $maxSize) {
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Ukuran file maksimal 5MB'
            ];
        }

        // ===== SECURITY LAYER 5: Magic Byte Verification =====
        $tempPath = $file->getTempName();
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $realMimeType = finfo_file($finfo, $tempPath);
        finfo_close($finfo);
        
        if (!in_array($realMimeType, $allowedMimes)) {
            log_message('warning', 'Blocked upload - Magic byte mismatch. Claimed: ' . $fileMime . ', Actual: ' . $realMimeType . ' from IP: ' . service('request')->getIPAddress());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'File tidak valid (magic byte mismatch)'
            ];
        }

        // ===== SECURITY LAYER 6: Image Content Validation =====
        $imageInfo = @getimagesize($tempPath);
        if ($imageInfo === false) {
            log_message('warning', 'Blocked upload - Not a valid image from IP: ' . service('request')->getIPAddress());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'File bukan gambar yang valid'
            ];
        }

        // ===== SECURITY LAYER 7: Sanitize Filename =====
        // Generate secure random filename (prevent directory traversal)
        $newName = bin2hex(random_bytes(16)) . '.' . $fileExtension;
        
        // ===== SECURITY LAYER 8: Secure Directory =====
        $fullPath = rtrim(FCPATH . $uploadPath, '/');
        
        // Prevent directory traversal
        $realFullPath = realpath($fullPath);
        $expectedPath = realpath(FCPATH);
        
        if ($realFullPath === false || strpos($realFullPath, $expectedPath) !== 0) {
            log_message('error', 'Directory traversal attempt from IP: ' . service('request')->getIPAddress());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Invalid upload path'
            ];
        }
        
        if (!is_dir($fullPath)) {
            if (!mkdir($fullPath, 0755, true)) {
                return [
                    'success' => false,
                    'filename' => null,
                    'error' => 'Gagal membuat direktori upload'
                ];
            }
        }

        // ===== SECURITY LAYER 9: Move File =====
        try {
            $file->move($fullPath, $newName);
        } catch (\Exception $e) {
            log_message('error', 'File upload failed: ' . $e->getMessage());
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Gagal mengupload file'
            ];
        }

        $uploadedFilePath = $fullPath . '/' . $newName;

        // ===== SECURITY LAYER 10: Re-encode Image (Remove EXIF/Malicious Code) =====
        try {
            $image = \Config\Services::image();
            
            // Re-encode to strip metadata and potential malicious code
            $image->withFile($uploadedFilePath)
                ->save($uploadedFilePath, $quality);
                
        } catch (\Exception $e) {
            log_message('warning', 'Image re-encoding failed: ' . $e->getMessage());
            // Continue anyway, file is already validated
        }

        // ===== Resize if needed =====
        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];

        if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
            try {
                $image = \Config\Services::image();
                
                $ratioW = $maxWidth / $originalWidth;
                $ratioH = $maxHeight / $originalHeight;
                $ratio = min($ratioW, $ratioH);
                
                $newWidth = (int)($originalWidth * $ratio);
                $newHeight = (int)($originalHeight * $ratio);

                $image->withFile($uploadedFilePath)
                    ->resize($newWidth, $newHeight, true, 'auto')
                    ->save($uploadedFilePath, $quality);

                log_message('info', 'Image uploaded and resized: ' . $newName . ' by user: ' . (session()->get('username') ?? 'unknown'));

                return [
                    'success' => true,
                    'filename' => $newName,
                    'error' => null,
                    'resized' => true,
                    'original_size' => [$originalWidth, $originalHeight],
                    'new_size' => [$newWidth, $newHeight]
                ];
            } catch (\Exception $e) {
                log_message('warning', 'Image resize failed: ' . $e->getMessage());
                return [
                    'success' => true,
                    'filename' => $newName,
                    'error' => null,
                    'resized' => false,
                    'resize_error' => $e->getMessage()
                ];
            }
        }

        log_message('info', 'Image uploaded: ' . $newName . ' by user: ' . (session()->get('username') ?? 'unknown'));

        return [
            'success' => true,
            'filename' => $newName,
            'error' => null,
            'resized' => false
        ];
    }
}

if (!function_exists('resize_existing_image')) {
    /**
     * Resize gambar yang sudah ada
     * 
     * @param string $filePath Path lengkap file gambar
     * @param int $maxWidth Lebar maksimum
     * @param int $maxHeight Tinggi maksimum
     * @param int $quality Kualitas kompresi
     * @return bool
     */
    function resize_existing_image(string $filePath, int $maxWidth = 1920, int $maxHeight = 1080, int $quality = 85): bool
    {
        if (!file_exists($filePath)) {
            return false;
        }

        $imageInfo = getimagesize($filePath);
        if ($imageInfo === false) {
            return false;
        }

        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];

        if ($originalWidth <= $maxWidth && $originalHeight <= $maxHeight) {
            return true; // Tidak perlu resize
        }

        try {
            $image = \Config\Services::image();
            
            $ratioW = $maxWidth / $originalWidth;
            $ratioH = $maxHeight / $originalHeight;
            $ratio = min($ratioW, $ratioH);
            
            $newWidth = (int)($originalWidth * $ratio);
            $newHeight = (int)($originalHeight * $ratio);

            $image->withFile($filePath)
                ->resize($newWidth, $newHeight, true, 'auto')
                ->save($filePath, $quality);

            return true;
        } catch (\Exception $e) {
            log_message('error', 'Resize existing image failed: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('create_thumbnail')) {
    /**
     * Buat thumbnail dari gambar
     * 
     * @param string $sourcePath Path gambar sumber
     * @param string $thumbPath Path tujuan thumbnail
     * @param int $width Lebar thumbnail
     * @param int $height Tinggi thumbnail
     * @return bool
     */
    function create_thumbnail(string $sourcePath, string $thumbPath, int $width = 300, int $height = 200): bool
    {
        if (!file_exists($sourcePath)) {
            return false;
        }

        try {
            $image = \Config\Services::image();
            
            $image->withFile($sourcePath)
                ->fit($width, $height, 'center')
                ->save($thumbPath, 80);

            return true;
        } catch (\Exception $e) {
            log_message('error', 'Create thumbnail failed: ' . $e->getMessage());
            return false;
        }
    }
}
