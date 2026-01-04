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
        // Validasi file
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return [
                'success' => false,
                'filename' => null,
                'error' => 'File tidak valid atau sudah dipindahkan'
            ];
        }

        // Validasi tipe file
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Hanya file gambar (JPG, PNG, GIF, WebP) yang diperbolehkan'
            ];
        }

        // Validasi ukuran file (max 10MB untuk upload, akan dikompresi)
        if ($file->getSize() > 10 * 1024 * 1024) {
            return [
                'success' => false,
                'filename' => null,
                'error' => 'Ukuran file maksimal 10MB'
            ];
        }

        // Generate nama file
        $newName = $file->getRandomName();
        
        // Pastikan folder upload ada
        $fullPath = FCPATH . $uploadPath;
        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        // Pindahkan file terlebih dahulu
        $file->move($fullPath, $newName);
        $uploadedFilePath = $fullPath . '/' . $newName;

        // Cek apakah perlu resize
        $imageInfo = getimagesize($uploadedFilePath);
        if ($imageInfo === false) {
            return [
                'success' => true,
                'filename' => $newName,
                'error' => null,
                'resized' => false
            ];
        }

        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];

        // Jika ukuran melebihi max, resize
        if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
            try {
                $image = \Config\Services::image();
                
                // Hitung rasio untuk maintain aspect ratio
                $ratioW = $maxWidth / $originalWidth;
                $ratioH = $maxHeight / $originalHeight;
                $ratio = min($ratioW, $ratioH);
                
                $newWidth = (int)($originalWidth * $ratio);
                $newHeight = (int)($originalHeight * $ratio);

                $image->withFile($uploadedFilePath)
                    ->resize($newWidth, $newHeight, true, 'auto')
                    ->save($uploadedFilePath, $quality);

                return [
                    'success' => true,
                    'filename' => $newName,
                    'error' => null,
                    'resized' => true,
                    'original_size' => [$originalWidth, $originalHeight],
                    'new_size' => [$newWidth, $newHeight]
                ];
            } catch (\Exception $e) {
                // Jika resize gagal, tetap gunakan file original
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
