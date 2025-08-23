<?php


namespace App\Trait;

trait DeleteFile
{
    public function deleteFile($filePath)
    {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}