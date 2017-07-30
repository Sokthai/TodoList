@extends('master.master')
@section('title')
    Todo: myTodoList -- Create
@endsection
@section('content')
<div>
        <form method="post" action="/store">
            {{csrf_field()}}



            <div class="container form-group col-md-5">

                    <label for="type">Projects Type:</label>
                    <select name="type" id="type" class="form-control createForm" onchange="disableNewType()">
                        <option selected>--Select Type--</option>
                        @foreach($types as $index => $type)
                            <option key="{{$index}}" value="{{$type->type}}">{{ucfirst($type->type)}}</option>
                        @endforeach
                    </select><br/>

                    <label for="newType">New type: </label>
                    <input type="text" name="newType" id="newType" class="form-control createForm"  autofocus/> <br/>

                    <label for="path">Project Path: </label>
                    <input type="text" name="path" id="path" class="form-control createForm" /><br/>

                    <label for="projectName">Project Name: </label>
                    <input type="text" name="name" id="projectName" class="form-control createForm"/><br/>

                    <label for="desc">Description: </label>
                    <textarea rows="5" name="desc" id="desc" class="form-control createForm"></textarea><br/>


                    <label for="comment">Comment:</label>
                    <textarea rows="5" name="comment" id="comment" class="form-control createForm"></textarea>
                    <div style="margin-top: 1em">
                        <a href="#" onClick="clearInput()" class="btn btn-default btnCancel">Clear</a>
                        <button class="btn btn-primary btnRight" onclick="selectType()" >Submit</button>
                    </div>
            </div>
        </form>
</div>
@endsection