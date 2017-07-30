@extends('master.master')
@section('title')
    Todo: myTodoList -- Delete
@endsection
@section('content')
    <div>
    <br/>
    <br/>
    <h2 class="blog-header" style="margin-top: 1em;">
        Selected Record: {{$count}} <br/>
        <br/></h2>
    <div class="container form-group">
        <form method="post" action="/destroy/{{$strId}}">
            {{csrf_field()}}
            {{ method_field('delete') }}

            <div class="row">
                <div class="col-sm-8 blog-main">
                    <div class="blog-post" style="margin-bottom: 4rem">
                        @foreach($deleteRecords as $deleteRecord)
                            <h3 class="blog-post-title" style="margin-bottom: .25rem; color: #800000">{{title_case($deleteRecord->name)}}</h3>
                            <h6 style="margin-bottom: 1.25rem; color: #999; size: 10px">{{ucfirst($deleteRecord->type)}} {{$deleteRecord->created_at}}</h6>
                            <h5>{{ucfirst($deleteRecord->description->first()->description)}}</h5>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="/" class="btn btn-default">Cancel</a>
            <button class="btn btn-danger">Confirm</button>
        </form>
    </div>


    </div>
@endsection



