<?php

namespace App\Traits;


trait UploadImageTrait
{
    public function uploadImage($requestName,$folderName)
    {
        $image = request()->file($requestName);
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExt = $image->extension();
        $imagePath = $folderName . '/' . $imageName . '.' . $imageExt;

        // Check if the image already exists in the folder
        if (file_exists($imagePath)) {
            $i = 1;
            while (file_exists($folderName . '/' . $imageName . '(' . $i . ')' . '.' . $imageExt)) {
                $i++;
            }
            $imageName .= '(' . $i . ')';
        }

        $path = $image->move($folderName, $imageName . '.' . $imageExt);

        // Replace backslashes with forward slashes in the image path
        $path = str_replace('\\', '/', $path);

        return $path;
    }

}


