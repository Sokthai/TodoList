<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Description;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

class TodoController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function index($no = 0){
        $todos = Todo::getSubsetRecord($no);
        $total =  "Total: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function show(Todo $name){
        $todo = $name;
        $show = true;
        return view('pages.show', compact('todo', 'show'));
    }

    public function store(TodoRequest $request){

        $desc = $request->desc;
        $name = $request->name;
        $type = $request->type;
        $newType = $request->newType;
        $comment= $request->comment;
        $path = $request->path;


        if (!$newType && ($type === '--Select Type--')){
            return back()->withErrors(['message' => 'Please select a project type or crate a new type']);
        }

        $type = ($type === '--Select Type--')? $newType : $type;


        if (Todo::where('name', $name)->exists()){
            return back()->withErrors(['message' => 'Project name "' . $name . '" is existed, try a new one']);
        }

        $id = Todo::create([
            'user_id' => Auth::user()->id,
            'type' => $type,
            'name' => $name,
            'path' => $path,
        ])->id;


        Description::create([
            'description' => $desc,
            'comment' => $comment,
            'todo_id' => $id
        ]);


        session(['success' => 'new todo is added']);
        return redirect()->route('home');
    }

    public function create(){

        $types = Todo::getalltype()->distinct()->get();
        $new = true;
        return view('pages.create', compact('types', 'new'));
    }


    public function confirm($strId){

        $IDs = explode(',', $strId); //convert to array

        $deleteRecords = Todo::GetDeleteRecords($IDs)->latest()->get();
        $count = Todo::GetDeleteRecords($IDs)->count();
        $delete = true;
        return view('pages.delete', compact('deleteRecords', 'count', 'strId', 'delete'));

    }

    public function destroy($strId){
        $IDs = explode(',', $strId);
        foreach($IDs as $ID){
            Todo::find($ID)->delete();
        }

        return redirect()->route('home');
    }
}
