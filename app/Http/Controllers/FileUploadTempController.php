<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadTempController extends Controller
{
    public function temp_upload(Request $request)
    {
        if ($request->has('softfile')) {
            $file = $request->file('softfile');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public',$filename);
//            $file->move(public_path().'/assets/temp/',$filename);
            // $file->move(public_path('assets/temp/'), $filename);
            return $filename;
        }
        return response()->json(['Gagal'], 500);
    }

    public function temp_delete($filename)
    {
        Storage::delete('public/'.$filename);
//        unlink(storage_path() . $filename);
    }
}
