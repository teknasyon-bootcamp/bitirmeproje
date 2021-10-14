<?php


namespace App\Traits;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

trait FileTrait
{

    public function storeFile($file, $path, $height = null): string
    {
        $imageResize = Image::make($file->getRealPath());
        if ($height) {
            $imageResize->resize(800, $height);
        }
        $fileName = Carbon::now()->timestamp . '.' . $file->extension();
        $finalPath = $path . $fileName;
        $imageResize->save(public_path($finalPath));

        return $finalPath;
    }


    public function storeVideo($file, $path)
    {
        $path = $file->move($path);

        dd($path);
    }

}
