@extends('master.master')
@section('title')
    Todo: myTodoList -- Login
@endsection
@section('content')
    <div class="container col-md-5">

        <form class="form-signin" method="post" action="/login">
            {{csrf_field()}}
            <h2 class="form-signin-heading">Sign in</h2>
            <input type="email" name="email" id="inputEmail" class="form-control inputForm" placeholder="Email address" required autofocus>
            <input type="password" name="password" id="inputPassword" class="form-control inputForm" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <a href="/reset" class="btn btn-lg btn-primary btn-block">Forget password</a>
        </form>

    </div> <!-- /container -->


@endsection