<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class SortController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth');
    }

    public function sortByType(){
        $todos  = Todo::GetAllCurrentUser()->orderBy('type','desc')->orderby('created_at', 'desc')->get();
        $types = Todo::GetAllCurrentUser()->select('type')->distinct()->get()->toArray();
        $total =  "Type: " . sizeof($types);
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByCurrentMonth()
    {
        $lastDayOfMonth = date("Y-m-t", strtotime(getdate()['month']));
        $firstDayOfMonth = date('Y-m-01', strtotime(getdate()['month']));
        $todos = Todo::GetAllCurrentUser()->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->latest()->get();
        $total =  "Current Month: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByComplete(){
        $todos = Todo::GetAllCurrentUser()->where('complete', 1)->latest()->get();
        $total =  "Completed: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByInComplete(){
        $todos = Todo::GetAllCurrentUser()->where('complete', 0)->latest()->get();
        $total =  "Incomplete: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByClosed(){
        $todos = Todo::GetAllCurrentUser()->where('closing', 1)->latest()->get();
        $total =  "Closed: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByOpen(){
        $todos = Todo::GetAllCurrentUser()->where('closing', 0)->latest()->get();
        $total = "Open: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }

    public function sortByCompleteClosed(){
        $todos = Todo::GetAllCurrentUser()->where('closing', 1)->where('complete', 1)->latest()->get();
        $total =  "Complete Closed: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }
    public function sortByInCompleteClosed(){
        $todos = Todo::GetAllCurrentUser()->where('closing', 0)->where('complete', 0)->latest()->get();
        $total =  "Incomplete Closed: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total'));
    }
}
