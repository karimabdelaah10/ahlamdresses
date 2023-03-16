<?php

namespace App\Models;

use App\Http\Traits\HasAttach;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory, HasAttach;

    protected $table = 'media';
    protected $fillable = [
        'title',
        'path',
        'type',
        'url',
    ];

    protected static $attachFields = [
        'path' => [
            'sizes' => ['small' => 'resize,256x144', 'large' => 'resize,440x440'],
            'modulePath' => 'media',
            'path' => 'uploads',
        ],
    ];
}
