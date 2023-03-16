<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;

class WebHomeController
{
    public function index()
    {
        $data['user'] = User::query()->latest()->first();
        $data['rows'] = Media::query()->get();
        return view('web' , $data);

    }
}
