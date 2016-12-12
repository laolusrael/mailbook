<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add - Mailbook</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center">
<!--@if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
        <a href="{{ url('/') }}">Home</a>
                    @else
        <a href="{{ url('/add') }}">Add</a>
                        <a href="{{ url('/list') }}">List</a>
                    @endif
            </div>
        @endif
        -->
    <div class="content">
        <div class="title m-b-md">
            Mailbook
        </div>

        <div class="links">
            <a href="{{ url('/')}}">Home</a>
            <a href="#">Add</a>
            <a href="{{ url('/list')}}">List</a>
        </div>

    </div>

</div>

<hr />
<div class="container">

    <form class="" action="/add" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if(empty(session("message")) == false)
            <p class="text-center alert alert-warning"><strong>{{session('message')}}</strong></p>
        @endif;


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"  />
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}"  />
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label"><br/></label>
                    <input type="submit" class="form-control btn btn-primary" value="Add">
                </div>
            </div>
        </div>

    </form>


</div>


<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
