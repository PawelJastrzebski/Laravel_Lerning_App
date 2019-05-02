<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" class="css">
    <link rel="stylesheet" href="{{asset('css/my.css')}}" class="css">
    <title>{{config('app.name', "APS")}}</title>
</head>
<body>
    @include('layouts.navBar')
    <div class="container mt-5">
        @include("inc.massages")
    @yield('content')
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>