<?php

use App\Http\Enums\S3Enums;
use Illuminate\Support\Facades\Storage;

if (!function_exists('randString')) {
    function randString($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
}

if (!function_exists('image')) {
    function image($img, $type, $folder = 'uploads')
    {
        $path = $folder;
        if ($type != "") {
            $path .= "/" . $type;
        }
        $path .= "/" . $img;
        return getImagePath($path);
    }
}

if (!function_exists('imageProfileApi')) {
    function imageProfileApi($img, $type = 'small')
    {
        if (is_null($img)) {
            $img = '';
        }

        $path = 'uploads/' . $type . '/' . $img;
        return getImagePath($path, url("/img/avatar.png"));
    }
}

if (!function_exists('viewImage')) {
    function viewImage($img, $type, $folder = 'uploads', $attributes = null)
    {

        $width = 500;
        if ($attributes) {
            $width = @$attributes['width'];
            $class = @$attributes['class'];
            $id = @$attributes['id'];
        }
        $src = image($img, $type, $folder);
        return '<img  width="' . $width . '" src="' . $src . '" class="' . @$class . '" id="' . @$id . '" >';
    }
}
if (!function_exists('viewVideo')) {
    function viewVideo($vid, $type, $folder = 'uploads', $attributes = null)
    {

        $width = 200;
        if ($attributes) {
            $width = @$attributes['width'];
        }
            $src = image($vid, $type, $folder);
            return '<video width="' . $width . '" height="' . $width . '" controls>
                        <source src="' . $src . '" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>';

    }
}

if (!function_exists('viewInputImage')) {
    function viewInputImage($img, $type, $folder = 'uploads', $attributes = null)
    {
        $width = 150;
        if ($attributes) {
            $width = @$attributes['width'];
            $class = @$attributes['class'];
            $id = @$attributes['id'];
        }
        $src = image($img, $type, $folder);
        return '<img  width="' . $width . '" src="' . $src . '" class="' . @$class . '" id="' . @$id . '" >';
    }
}
if (!function_exists('viewFile')) {
    function viewFile($file, $folder = 'uploads', $placeholder = null)
    {
        $path = $folder . '/' . $file;
        $path = getImagePath($path, '');
        return '<i class="fa fa-paperclip"></i> <a href="' . $path . '" target="_blank" >' . $placeholder ?? $file . '</a>';
    }
}
if (!function_exists('deleteMedia')) {
    function deleteMedia(
        $ids,
        object $model,
        string $storagePath = null
    ) {
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $mediaData = $model->whereIn('id', $ids)->get();

        foreach ($mediaData as $media) {
            if (in_array($media->extension, getImageTypes())) {
                if (is_null($storagePath)) {
                    deleteImagePath(S3Enums::LARGE_PATH . $media->filename);
                    deleteImagePath(S3Enums::SMALL_PATH . $media->filename);
                }
                deleteImagePath(S3Enums::LARGE_PATH . $storagePath . '/' . $media->filename);
                deleteImagePath(S3Enums::SMALL_PATH . $storagePath . '/' . $media->filename);
            } else {
                if (is_null($storagePath)) {
                    deleteImagePath(S3Enums::LARGE_PATH . $media->filename);
                }
                deleteImagePath(S3Enums::LARGE_PATH . $storagePath . '/' . $media->filename);
            }
        }
        $model->whereIn('id', $ids)->delete();
    }
}
if (!function_exists('dummyPicture')) {
    function dummyPicture()
    {
        return asset('img/avatar.png');
    }
}
if (!function_exists('getImagePath')) {
    function getImagePath($imagePath, $alt = null)
    {
        try {
            if (Storage::exists($imagePath)) {
                return Storage::url($imagePath);
            }

        } catch (Exception $exception) {
            if ($alt) {
                return $alt;
            }
            return url("/img/avatar.png");
        }
        return url("/img/avatar.png");
    }
}
if (!function_exists('deleteImagePath')) {
    function deleteImagePath($imagePath): void
    {
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    }
}
if (!function_exists('moveImagePath')) {
    function moveImagePath($pathFrom, $pathTo, $storagePath, $fileName)
    {
        if (!in_array($pathTo . $storagePath, Storage::directories())) {
            Storage::makeDirectory($pathTo . $storagePath);
        }
        Storage::move($pathFrom . $fileName, $pathTo . $storagePath . '/' . $fileName);
    }
}
if (!function_exists('getImageSize')) {
    function getImageSize($imagePath)
    {
        if (Storage::exists($imagePath)) {
            return Storage::size($imagePath);
        }
        return 0;
    }
}
if (!function_exists('reSizeImage')) {
    function reSizeImage($pathFrom, $width, $height, $imageExt, $pathTo, $resizeType)
    {
        if (Storage::exists($pathFrom)) {
            $image = Intervention\Image\Facades\Image::make(Storage::path($pathFrom));
            if ($resizeType == S3Enums::RESIZE) {
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } elseif ($resizeType == S3Enums::CROP) {
                $image->fit($width, $height);
            }
            $image->encode($imageExt, 60);
            Storage::put($pathTo, $image->__toString());
        }
    }
}
