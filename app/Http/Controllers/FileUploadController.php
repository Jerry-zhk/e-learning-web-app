<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
    	if (!$request->has('file')) 
    		abort(400);
    	
    	$file = $request->file('file');
    	$id = uniqid();
    	$ext = $file->extension();

    	$filename = "$id.$ext";
    	$file->storeAs('public/uploads/', $filename);
    	return json_encode(['location' => "/storage/uploads/$filename"]);

    	
    }
}
