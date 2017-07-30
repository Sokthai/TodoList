@extends('master.master')
@section('title')
    Todo: myTodoList -- Login
@endsection
@section('content')
    <div class="container col-md-5">
        <form class="form-signin" method="post" action="/reset/changePassword">
            {{csrf_field()}}
            <h2 class="form-signin-heading" style="margin-top: 3em">Reset password</h2>
            <input name="token" type="hidden" value="{{$token}}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" style="margin-bottom: 1em" placeholder="new password" required autofocus>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="password_confirmation" id="confirmation_password" class="form-control" style="margin-bottom: 1em" placeholder="confirm password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Change password</button>

        </form>

    </div> <!-- /container -->


@endsection