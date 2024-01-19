<?php

namespace App\Http\Controllers;


use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function handleFileChunk(Request $request)
    {
        $file = $request->file('file');
        $chunk = $request->input('chunk');
        $chunks = $request->input('chunks');
        $fileName = $request->input('name');




        $storagePath = 'final/' . $fileName;

        Storage::disk('public')->append($storagePath, $chunk);

        if ($chunks - 1 == 0) {
            // All chunks received, file is complete
            Storage::disk('public')->move($storagePath, $storagePath);

            $url = asset('final/' . $fileName);
            $fileContents = Storage::disk('public')->get('final/logoproject.png');

            $relative_path=$this->saveImage($file,$file->getClientOriginalName());


            return response()->json(['url' => \URL::to(Storage::url($relative_path))]);
        }

        return response()->json(['status' => 'Chunk uploaded successfully']);
    }



    private function saveImage(array|\Illuminate\Http\UploadedFile|null $file, string $getClientOriginalName)
    {
        $directory = 'images/' . \Str::random();
        $path = $directory . '/' . $getClientOriginalName;
        try {
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory, 0775, true);
            }
            Storage::putFileAs('public/', $file, $path);
            return $path;
        } catch (\Exception $e) {
            throw new \Exception('Unable to save file: ' . $e->getMessage());
        }
    }



}
