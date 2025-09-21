<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function uploadImage($image, $path)
    {
        if ($photo = request()->file($image)) {
            // store on the 'public' disk
            $imagePath = $photo->store($path, 'public');
            return $imagePath; // e.g. "films/avatar1.jpg"
        }
        return null;
    }

    public function uploadMultipleImage($images, $path)
    {
        $uploadedFiles = [];

        if ($photos = request()->file($images)) {
            foreach ($photos as $photo) {
                $imagePath = $photo->store($path, 'public');
                $uploadedFiles[] = $imagePath;
            }
        }

        return $uploadedFiles; // e.g. ["films/1.jpg", "films/2.jpg"]
    }

    public function deleteImage($filePath)
    {
        // Delete from the 'public' disk
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }

    public function updateImage($image, $path, $oldImage)
    {
        if (request()->file($image)) {
            // delete old one
            if ($oldImage) {
                $this->deleteImage($oldImage);
            }
            // upload new one
            return $this->uploadImage($image, $path);
        }
        return $oldImage;
    }
}
