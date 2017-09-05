@extends('master.master')
@section('title')
    Todo: {{title_case($todo->name)}}
@endsection
@section('content')

    <h1 class="todoTitle">{{title_case($todo->name)}}</h1>

    <div class="form-group">
        <p class="statue">Type : {{ucfirst($todo->type)}}</p>
        <p class="status">Closing : <span class="{{$todo->closing? "statusComplete" : "statusInComplete"}}">{{$todo->closing? "Closed" : "Open"}}</span></p>
        <p class="status">Complete : <span class="{{$todo->complete? "statusComplete" : "statusInComplete"}}">{{$todo->complete? "Completed" : "Incomplete"}}</span></p>
        <p class="statue">Created on : {{$todo->created_at}}</p>
        <p class="statue">Path : {{$todo->path}}</p>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="alert-success">
        <tr >
            <td width="2%">No</td>
            <td width="45%">Description</td>
            <td width="32%">Comment</td>
            <td width="10%">Time</td>
            <td width="11%">Date</td>
        </tr>
        </thead>

        @foreach($todo->description as $index => $desc)
            <tr>
                <td>{{$index + 1}}</td>
                @if (strlen($desc->description) > 50)
                    <td>
                        <textarea style="background-color: transparent" readonly class="form-control">{{ucfirst($desc->description)}}</textarea>
                    </td>
                @else
                    <td>{{ucfirst($desc->description)}}</td>
                @endif

                @if (strlen($desc->comment) > 50)
                    <td><textarea style="background-color: transparent" readonly class="form-control long-text">{{ucfirst($desc->comment)}}</textarea></td>
                @else
                    <td>{{ucfirst($desc->comment)}}</td>
                @endif
                <td>

                    @if($desc->created_at->hour > 12)
                        {{$desc->created_at->hour % 12}} :
                        {{$desc->created_at->minute}} PM
                    @else
                        {{$desc->created_at->hour}} :
                        {{$desc->created_at->minute}} AM
                    @endif
                </td>
                <td>{{$desc->created_at->toFormattedDateString()}}</td>

            </tr>
        @endforeach
    </table>
    @include('master.progress')

@endsection