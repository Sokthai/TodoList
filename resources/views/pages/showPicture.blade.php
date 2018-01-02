
<script src="/js/jQuery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


{{--@extends('master.master')--}}
{{--@section('title')--}}
    {{--Desc: {{$desc}}--}}
{{--@endsection--}}
{{--@section('content')--}}
<div class="container" style="padding-top: 50px">
    <div class="row">
    @foreach($pictures as $picture)
            <div class="col-md-3 col-sm-6 ">
                <div class="thumbnail">
                    <a href="{{URL::asset('/images/' . $picture->image)}}">
                        <img src="{{URL::asset('/images/' . $picture->image)}}"  width="100%" height="50%">
                    </a>
                </div>
            </div>
    @endforeach
    </div>
</div>
{{--@endsection--}}