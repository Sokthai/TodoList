@extends('master.master')
@section('content')
    <div class="container col-md-5">
        <form method="post" action="/register" class="form-signin">
            {{csrf_field()}}
            <h1 class="form-signin-heading">Registration</h1>
            <input name="name" class="form-control inputForm" id="name" placeholder="Name" required autofocus>
            <input type="email" name="email" id="email" class="form-control inputForm" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control inputForm" id="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control inputForm" placeholder="Confirm Password" required>

            @include('master.resetQuestions')

            <button name="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
@endsection