<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileUploadService
{
    public static function uploadFile(UploadedFile $file): ?string
    {
        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image')) {

            $folder = 'images';

        } elseif (str_starts_with($mimeType, 'video')) {

            $folder = 'videos';

        } else {

            $folder = 'documents';
        }

        $extension = $file->getClientOriginalExtension();

        $filename = date('d-m-Y') . '-' . Str::random(30) . '.' . $extension;

        $file->move(public_path('uploaded/' . $folder), $filename);

        return 'uploaded/' . $folder . '/' . $filename;
    }
}
