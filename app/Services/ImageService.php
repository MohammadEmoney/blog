<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageService
{
    public function save($file, $model_type, $model_id)
    {
        $randomName = Str::random(10);
        $extension = $file->extension();
        $imageName = time() . '-' . $randomName . '.'. $extension;
        $slice = Str::afterLast($model_type, '\\');
        $path = public_path('images') . "/$slice" ;
        $savedImage = $file->move($path, $imageName);
        $imagePath = "images/". $slice . "/" . $imageName;
        if(class_exists($model_type)){
            $class = new $model_type;
            $model = $class::find($model_id);
            $image = $model->images()->create([
                'src' => $imagePath,
                'alt' => $model->name ?: $imageName,
                'size' => $savedImage->getSize(),
                'type' => $extension,
                'featured_image' => $model->images()->exists() ? false : true
            ]);
            return $image;
        }else{
            return false;
        }
    }

    public function delete(Image $image)
    {
        if(File::exists($image->src)){
            File::delete($image->src);
        }
        $image->delete();
    }
}
