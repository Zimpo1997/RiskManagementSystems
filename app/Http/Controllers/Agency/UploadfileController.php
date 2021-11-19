<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadfileController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $path = $file->storeAs('public/avatars/tmp/' . $folder, $filename);

            // TemporaryFile::create([
            //     'folder' => $folder,
            //     'filename' => $filename
            // ]);

            return $folder;
        }
        return '';
    }
}
