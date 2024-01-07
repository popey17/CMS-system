<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempFileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('image-',true);
            $file->storeAs('/public/img/temp/'.$folder, $filename);

            TempFile::create([
                'folder' => $folder,
                'file' => $filename,
            ]);

            return $folder;
        };

        return '';
    }

    public function delete()
    {
        $tempfile = TempFile::where('folder', request()->getContent())->first();

        if ($tempfile) {
            Storage::deleteDirectory('/img/temp/'.$tempfile->folder);
            $tempfile->delete();
        }

        return response() -> noContent();
    }
}
