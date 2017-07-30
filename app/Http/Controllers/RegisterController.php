<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth;
use App\User;
use App\Http\Requests\RegistrationRequest;
use App\Reset;

class RegisterController extends Controller
{

    public function create(){
        return view('auth.registration');
    }



    public function store(RegistrationRequest $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $firstQuestion = $request->firstQuestion;
        $firstAnswer = $request->firstAnswer;
        $secondQuestion = $request->secondQuestion;
        $secondAnswer = $request->secondAnswer;
        $thirdQuestion = $request->thirdQuestion;
        $thirdAnswer = $request->thirdAnswer;

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);



        Reset::create([
            'user_id' => $user->id,
            'email' => $email,
            'firstQuestion' => $firstQuestion,
            'firstAnswer' => $firstAnswer,
            'secondQuestion' => $secondQuestion,
            'secondAnswer' => $secondAnswer,
            'thirdQuestion' => $thirdQuestion,
            'thirdAnswer' => $thirdAnswer
        ]);


        auth()->login($user);
        return redirect()->route('home');
    }



}
