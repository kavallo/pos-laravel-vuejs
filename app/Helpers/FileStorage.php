<?php
namespace App\Helpers;

trait FileStorage
{
    /**
     * File Store
     * @param $dynamicPath, $file, $dynamicFileName
     * @return string $file_url
     */
    public function storeFile($dynamicPath, $file, $dynamicFileName)
    {
        if ($file) {
            $file_name = $dynamicFileName;
            $extension = strtolower($file->getClientOriginalExtension());
            $file_full_name = $file_name . '.' . $extension;
            $upload_path = 'uploads/' . $dynamicPath;
            $file_url = $upload_path . $file_full_name;
            $file->move($upload_path, $file_full_name);
            return $file_url;
        }

        return false;
    }

    /**
     * destroyFile
     * @param $file_url
     * @return boolean
     */
    public function destroyFile($file_url)
    {
        if (file_exists($file_url)) {
            unlink($file_url);
        }

        return true;
    }
}