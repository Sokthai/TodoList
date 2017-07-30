<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class HomeController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth');
    }



    public function __invoke()
    {
        $offset = 0;
        if (isset($_GET['offset'])) $offset = $_GET['offset'];

        if ($offset == -1) {
            $todos = Todo::getAllDataCurrentUser();
            $offset = 0;
        }elseif ($offset == -10) {
            $offset = Todo::getAllDataCurrentUser()->count();
            $rem = (($offset % 10) > 0)? ($offset % 10) : 10;
            $offset = $offset - $rem;
            $todos = Todo::getSubsetRecord($offset);
        }
        else {
            $todos = Todo::getSubsetRecord($offset);
        }

        $total =  "All: " . sizeof($todos->toArray());
        return view('pages.index', compact('todos', 'total', 'offset'));

    }



}
