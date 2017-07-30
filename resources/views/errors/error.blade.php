@if (count($errors) > 0)
    <div
            style="
                  position: absolute;
                  z-index: 10;
                  float: right;
                  top: 60px;
                  left: 20px;
                  color: red;
                  "
    >
        <ul>
        @foreach($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (session('message'))
    <div class="row col-md-12"
         style="
                  position: absolute;
                  z-index: 10;
                  float: right;
                  top: 60px;
                  left: 20px;
                  "
    >
    <div class="alert alert-success .col-md-5 .col-md-offset-3">
        {{session('message')}}
    </div>
    </div>
@endif