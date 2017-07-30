@if (count($errors) > 0)
    <div class="container col-md-8"
            style="
                  position: sticky;
                  z-index: 10;
                  float: left;
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
    <div class="container col-md-8"
         style="
                  position: sticky;
                  z-index: 10;
                  float: left;
                  top: 60px;
                  left: 20px;
                  "
    >
    <div class="alert alert-success .col-md-5 .col-md-offset-3">
        {{session('message')}}
    </div>
    </div>
@endif