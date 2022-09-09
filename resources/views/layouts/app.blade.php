<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{config('app.name')}}</title>

    <!--Styles-->
    <link rel="stylesheet" href="{{asset('assets/styles/bootstrap.min.css')}}">

    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">

</head>
<body>

    @yield('content')

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>