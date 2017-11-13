<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
    
        <div class="container">
        @if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>

        @endforeach
        
    </ul>
</div>

@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
</div>
        @yield('content')
      


        
       
    <!-- Scripts -->
   
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
