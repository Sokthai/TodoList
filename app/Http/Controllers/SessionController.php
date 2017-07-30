<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;
use Illuminate\Support\Facades\Auth;
use App\Reset;
use App\User;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class SessionController extends Controller
{


    public function index(){
        return view('auth.login');
    }


    public function login(SessionRequest $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::check()){
            return back()->withErrors(['message', 'you already login']);
        }

        $success = Auth::attempt(['email' => $email, 'password' => $password]);



        if (!$success){

            return back()->withErrors(['message' => 'Check your email or password and try again']);
        }

        return redirect()->route('home');
    }



    public function sendResetPassword(Request $request){
        $token = str_random(80);
        return view('auth.resetPassword',compact('email', 'token'));
    }

    public function resetPassword(Request $request){
        $this->validate($request,[
            'email' => 'required|email'
        ]);
        $email = $request->email;

        $user = User::where('email', $email)->get();

        if (sizeof($user) !== 1){
            return back()->withErrors(['message' => 'Sorry, the email you provided in not in the system, please try again']);
        }

        $homePath = "http://127.0.0.1:8000";
        $token = str_random(80);
        $link = $homePath. '/reset/' . $token;
        Mail::to($user)->send(new ResetPassword($link));
        $u = User::where('email', $email)->firstOrFail();
        $u->reset->token = $token;
        $u->reset->save();

        session()->flash('message', 'An email has been sent to ' . $email . ". Don't receive it, Reset again");
        return back();
    }


    public function resetPasswordWithToken($tokenID){

        $token = Reset::select('firstQuestion', 'secondQuestion', 'thirdQuestion', 'email', 'token', 'updated_at')
                    ->where('token' , $tokenID)->first();

        if (!$token) abort(404);


        $difference = Carbon::now()->diffInHours($token->updated_at);
        if ($difference >= 2){
            $token = Reset::where('token', $tokenID)->first();
            $token->token = null;
            $token->save();
            abort(404);
        }

        return view('auth.resetPasswordQuestion', compact('token'));
    }


    public function resetVerify(Request $request){

        $this->validate($request, [
           'firstAnswer' => 'required',
           'secondAnswer' => 'required',
           'thirdAnswer' => 'required',
        ]);
        $firstAnswer = strtolower($request->firstAnswer);
        $secondAnswer = strtolower($request->secondAnswer);
        $thirdAnswer = strtolower($request->thirdAnswer);
        $token = $request->token;

        $answers = Reset::select('firstAnswer', 'secondAnswer', 'thirdAnswer')
                    ->where('token' , $token)->first();

        if ($answers) {
            if ($firstAnswer === strtolower($answers->firstAnswer) &&
                $secondAnswer === strtolower($answers->secondAnswer) &&
                $thirdAnswer === strtolower($answers->thirdAnswer)){
                    return view('auth.changePassword', compact('token'));
            }
        }

        return back()->withErrors(['message' => 'Incorrect security answers, please try again']);
    }

    public function resetChangePassword(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);


        $token = Reset::where('token', $request->token)->first();
        if (!$token) abort(404);

        $password = $request->password;
        $token->user->password = bcrypt($password);
        $token->user->save();
        $token->token = null;
        $token->save();

        session()->flash('message', 'Your password has been changed successfully');
//        $homePath = "http://127.0.0.1:8000/";
        return redirect()->route('login');
//        return redirect($homePath)->withErrors(['message' => "successfully change password"]);
    }


    public function destroy(){
        auth()->logout();
        return redirect()->route('login');
    }



}
