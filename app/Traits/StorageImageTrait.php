<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function StorageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName; //lay dung ten file anh truyen vao 
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(length: 20) . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash); //file(name:'') là name trong thẻ input
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function StorageTraitUploadMutiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(length: 20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash); //file(name:'') là name trong thẻ input
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
