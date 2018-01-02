<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Description;
use Image; //this is "intervention image" library. go to its website for installing
use App\Http\Requests\DescriptionRequest;
use App\Picture;
class DescriptionController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth');
    }




    public function store(DescriptionRequest $request, $todoId){

        $desc = $request->desc;
        $comment = $request->comment;
        $closing = ($request->closing? 1 : 0);
        $complete = ($request->complete? 1 : 0);
        $path = $request->path;
        $favorite = ($request->favorite? 1 : 0);
        $files = $request->file("file");

        $newDesc = Description::create([
            'description' => $desc,
            'comment' => $comment,
            'todo_id' => $todoId
        ]);

        $newDesc->todo->closing = $closing;
        $newDesc->todo->complete = $complete;
        if ($path) $newDesc->todo->path = $path;
        $newDesc->todo->favorite = $favorite;
        $newDesc->todo->save();


        //using Image library: read intervention image website or book search for "intervention image"
        if (!empty($files)){
            if (is_array($files)) {
                foreach ($files as $file) {
                    //this will save in public folder using Image library (Must install library before use. go to it website for instruction or our book search for "intervention image")
                    $fileName = time() . $file->getClientOriginalName();
                    $path = public_path('images/' . $fileName); //the location is located in public/images
                    Image::make($file)->resize(1200, 800)->save($path);

//                    Picture::create([
//                       'desc_id' => $newDesc->id,
//                       'image' => $fileName
//                    ]);
                }
            }

        }

        session(['success' => 'progress added']);
        return back();
    }

    public function showPicture($picId){
        $desc = Picture::GetAllPictures($picId)->first()->description->description;
        $pictures = Picture::GetAllPictures($picId)->latest()->get();

        return view('pages.showPicture', compact('pictures', 'desc'));
    }


}


