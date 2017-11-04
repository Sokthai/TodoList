@extends('master.master')
@section('title')
    Todo: myTodoList
@endsection
@section('content')

    <div>
        <h1 class="todoTitle">Todo Lists:</h1>
        <h6 class="todoTemp">{{$location}}: {{$temp_f}} Fahrenheit</h6>
        <div class="row">
            <div class="col-md-7"><h3>{{$total}}</h3></div>
            <div class="col-md-5 todoTemp mouseHover" style="float: right;">
                <a href="/?offset=-1" style="font-size: 15px;">Show All</a>
                <a href="/?offset=0" style="font-size: 15px;">&laquo; First</a>
                <a href="/?offset=-10" style="font-size: 15px;">Last  &raquo;</a>
                <a href="/?offset={{$offset - 10}}" class="previous" style="font-size: 18px;">&laquo; Previous</a>
                <a href="/?offset={{$offset + 10}}" class="next" style="font-size: 18px;">Next &raquo;</a>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="alert-success">
            <tr class="danger">
                <td>No</td>
                <td>Project Name</td>
                <td>Complete</td>
                <td>Closing</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>


            @foreach ($todos as $index => $todo)
                <tr class="success">
                    <td width="5">{{$index + 1}}</td>
                    <td>
                        <span><h3><a href="/{{$todo->name}}" class="blog-post-title {{$todo->closing == 1? "statusComplete" : "statusInComplete"}}">{{title_case($todo->name)}}</a>
                            <b style="font-size: 50%; color: gray">Last Edit: {{$todo->description->last()->created_at->diffForHumans(null, true)}}</b>
                                {{($todo->favorite === 1)? " &#11088;" : ""}}</h3></span>
                        <h6 class="blog-post-meta">
                            &nbsp;	<span style="color: #8a6d3b">{{ucfirst($todo->type)}}</span>
                            : created {{$todo->created_at->diffForHumans(null)}}
                        </h6>

                            <h5 class="blog-header">
                                &nbsp;	{{str_limit(ucfirst($todo->description->last()->description), 50)}}
                            </h5>


                    </td>
                    <td width="5"><input type="checkbox" disabled {{$todo->complete? 'checked' : null}}/></td>
                    <td width="5"><input type="checkbox" disabled {{$todo->closing? 'checked' : null}}/></td>
                    <td width="10"><input type="checkbox" value="{{$todo->id}}" name="delete" id="delete"/></td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>











@endsection
