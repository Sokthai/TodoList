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
            <td width="30%">Comment</td>
            <td width="11%">Time</td>
            <td width="12%">Date</td>
        </tr>
        </thead>

        @foreach($todo->description()->orderBy('created_at', 'desc')->get() as $index => $desc)
            <tr>
                <td>{{$index + 1}}</td>
                <div class="clearfix">
                    @if (strlen($desc->description) > 50)
                        <td><textarea style="background-color: transparent" readonly class="form-control">{{ucfirst($desc->description)}}</textarea></td>
                    @else
                        <td>
                            {{ucfirst($desc->description)}}

                            @if($desc->image->count() > 0)
                                <a href="/pictures/{{$desc->image->first()->desc_id}}">&#9752;</a>
                            @endif

                        </td>
                    @endif
                </div>

                @if (strlen($desc->comment) > 50)
                    <td><textarea style="background-color: transparent" readonly class="form-control long-text">{{ucfirst($desc->comment)}}</textarea></td>
                @else
                    <td>{{ucfirst($desc->comment)}}</td>
                @endif
                <td>

                    @if($desc->created_at->hour > 12)
                        @if(strlen($desc->created_at->hour % 12) == 1)
                            0{{$desc->created_at->hour % 12}}
                        @else
                            {{$desc->created_at->hour % 12}}
                        @endif
                        :
                        @if($desc->created_at->minute < 10)
                                 0{{$desc->created_at->minute}} PM
                        @else
                                {{$desc->created_at->minute}} PM
                        @endif

                    @elseif ($desc->created_at->hour == 12)
                        12
                        :
                        @if($desc->created_at->minute < 10)
                            0{{$desc->created_at->minute}} PM
                        @else
                            {{$desc->created_at->minute}} PM
                        @endif
                    @elseif($desc->created_at->hour == 0)
                        12 :
                        :
                        @if($desc->created_at->minute < 10)
                            0{{$desc->created_at->minute}} AM
                        @else
                            {{$desc->created_at->minute}} AM
                        @endif
                    @else
                        0{{$desc->created_at->hour}} :
                        :
                        @if($desc->created_at->minute < 10)
                            0{{$desc->created_at->minute}} AM
                        @else
                            {{$desc->created_at->minute}} AM
                        @endif
                    @endif
                </td>
                <td >{{$desc->created_at->toFormattedDateString()}}</td>

            </tr>
        @endforeach
    </table>
    @include('master.progress')

@endsection