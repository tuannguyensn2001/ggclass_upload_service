<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {

        $file = $request->file('file');

        if (!$file) {
            return response()->json([
                "message" => "data not valid"
            ],422);
        }

        $url = Storage::put($file->getFilename(), $file);

        return response()->json([
            "data" => asset("/storage/" . $url),
            "message" => "done"
        ]);
    }
}
