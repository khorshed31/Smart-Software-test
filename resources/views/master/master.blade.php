<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.min.css"/>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow sticky-top">
    <div class="container">
        <a href="" class="navbar-brand text-info">Doctor Appointment</a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
            <li><a href="{{ route('doctor.add') }}" class="nav-link">Doctor</a></li>
            <li><a href="{{ route('appointment.add') }}" class="nav-link">Appointment</a></li>
        </ul>
    </div>
</nav>
@yield('body')
<script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>
</html>
