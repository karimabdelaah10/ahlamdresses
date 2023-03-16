<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enums\S3Enums;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{

    public function index()
    {
        $data['rows'] = Media::query()->latest()->get();
        return view('admin.media.index', $data);
    }

    public function getCreate()
    {
        $data['types'] = S3Enums::getAvialableTypes();
        return view('admin.media.create', $data);
    }

    public function postCreate(Request $request)
    {

        $this->validate($request, [
            'title'=>'max:20',
            'path' => 'dimensions:min_width=440,min_height=440'
        ]);
        $data = $request->all();
//        if ($request->type == S3Enums::VIDEO) {
//            $extension = $request->file('path')->getClientOriginalExtension();
//            $fileName = strtolower(Str::random(10)) . time() . '.' . $extension;
//            Storage::putFileAs('uploads', $request->path, $fileName);
//            $data['path'] = $fileName;
//        }
        Media::query()->create($data);
        return redirect(route('dashboard'));
    }

    public function delete($id)
    {
        Media::query()->find($id)->delete();
        return redirect(route('dashboard'));
    }
}
