<?php
namespace App\Jobs;

use App\Models\Media;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UploadMediaPhotos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $files;

    public function __construct($files)
    {
        $this->files = $files; 
    }

    public function handle()
    {
        try {
            $data        = [];
            $photoFields = ['photo_1', 'photo_2', 'photo_3', 'photo_4', 'photo_5', 'photo_6'];

            foreach ($photoFields as $field) {
                if (isset($this->files[$field])) {
                    $file      = $this->files[$field];
                    $extension = $file->getClientOriginalExtension();
                    $filename  = time() . '_' . Str::random(40) . '.' . $extension;
                    $file->move(public_path('uploaded'), $filename);
                    $data[$field] = 'uploaded/' . $filename;
                    Log::info("Rasm yuklandi ($field): " . $data[$field]);
                }
            }

            Media::create($data);

            Log::info("Media yozuvi yaratildi fon rejimida.");
        } catch (Exception $e) {
            Log::error("Jobda rasm yuklashda xatolik: " . $e->getMessage());
        }
    }
}
