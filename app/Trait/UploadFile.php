<?php

namespace App\Trait;

trait UploadFile
{
    public function uploadFile($file,$folder_name)
    {
        $name_of_file = $file->hashName(); 
        $file->move($folder_name, $name_of_file);
        return $name_of_file;
    }
}