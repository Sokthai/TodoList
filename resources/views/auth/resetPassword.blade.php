@extends('master.master')
@section('title')
    Todo: Reset Password
@endsection
@section('content')
    <div class="container col-md-4">
        <form class="form-signin" method="post" action="/reset">
            {{csrf_field()}}
            <h2 class="form-signin-heading">Please enter your email</h2>
            <input type="email" name="email" id="inputEmail" class="form-control inputForm" placeholder="Email address" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
        </form>
    </div>
@endsection