
<div class="container form-group">
    <form method="post" action="/description/{{$todo->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <textarea placeholder="Add description" class="form-control inputForm" name="desc" rows="3" cols="6"></textarea>
        <textarea placeholder="Add comment" class="form-control inputForm" name="comment" rows="3" cols="6"></textarea>
        <input type="text" class="text-justify form-control inputForm" name="path" placeholder="Update Path"/>
        <input type="file" name="file[]" multiple>
        <p class="help-block">Upload Pictures</p>

        <div class="has-success">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="complete"
                            {{$todo->complete? "checked" : "null"}}/>
                        Complete
                </label><br/>
                <label>
                    <input type="checkbox" name="closing"
                            {{$todo->closing? "checked" : null}}/>
                    Closing
                </label><br/>
                <label>
                    <input type="checkbox" name="favorite"
                            {{$todo->favorite? "checked" : null}}/>
                    Favorite
                </label>
                <button class="btn btn-primary btnRight">Update</button>
            </div>
        </div>
    </form>
    <br/>
</div>