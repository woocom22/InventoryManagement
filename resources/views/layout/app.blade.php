<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/toastify.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" >

    <title>Registration Form</title>
</head>
<body>
<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate w3-red animate__animated animate__slideInLeft"></div>
    </div>
</div>
@yield('content')


<script src="{{ asset('js/') }}"
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/toastify-js.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
</body>
</html>


