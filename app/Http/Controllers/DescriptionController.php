<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;
use App\Http\Requests\DescriptionRequest;
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

        $newDesc = Description::create([
            'description' => $desc,
            'comment' => $comment,
            'todo_id' => $todoId
        ]);

        $newDesc->todo->closing = $closing;
        $newDesc->todo->complete = $complete;
        $newDesc->todo->path = $path;
        $newDesc->todo->favorite = $favorite;
        $newDesc->todo->save();

        session(['success' => 'progress added']);
        return back();
    }
}
