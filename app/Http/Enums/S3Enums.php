<?php

namespace App\Http\Enums;

class S3Enums
{
    public const LARGE_PATH = "uploads/large/",
        SMALL_PATH = "uploads/small/",
        GARBAGE_MEDIA_PATH = 'garbage_media/',
        UPLOADED_MEDIA_PATH = 'uploaded_media/',
        PDFS_MEDIA_PATH = 'uploads/pdfs_media/',
        FILE_MANAGER_PATH = 'file-manager/',
        GRADES_COLO_PATH = 'grades_color/',
        RESIZE = "resize",
        CROP = "crop",
        IMAGE = 'image',
        VIDEO = 'video';

    public static function getAvialableTypes()
    {
        return [
            self::IMAGE => self::IMAGE,
//            self::VIDEO => self::VIDEO
        ];
    }
}
