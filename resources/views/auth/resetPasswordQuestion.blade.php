@extends('master.master')
@section('title')
    Todo: myTodoList -- Login
@endsection
@section('content')


        <form class="form-signin" method="get" action="/reset/verify">
            {{csrf_field()}}
            <div class="form-group col-md-5 container">
                <input type="hidden" name="token" value="{{$token->token}}">
                <h1 class="form-signin-heading" style="margin-top: 2.5em">Security Questions:</h1>
                    <p>Email: {{$token->email}}</p>
                <br/>
                <label for="firstAnswer">{{$token->firstQuestion}}</label>
                <input type="text" name="firstAnswer" id="firstAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required autofocus>

                <label for="secondAnswer">{{$token->secondQuestion}}</label>
                <input type="text" name="secondAnswer" id="secondAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required>

                <label for="thirdAnswer">{{$token->thirdQuestion}}</label>
                <input type="text" name="thirdAnswer" id="thirdAnswer" class="form-control" style="margin-bottom: 1em" placeholder="Security Answer" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 1em">Submit</button>
            </div>
        </form>
@endsection