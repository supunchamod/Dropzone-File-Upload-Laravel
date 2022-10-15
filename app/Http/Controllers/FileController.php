<?php

namespace App\Http\Controllers;
use App\Models\imageUpload;

use Illuminate\Http\Request;

class FileController extends Controller
{
     public function dropzone()
    {
        return view('dropzone');
    }

    public function filestore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
         $image->move(public_path('images'),$imageName);
        
        $imageName = $image->getClientOriginalName();
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
}
