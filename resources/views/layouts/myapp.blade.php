<!doctype html>
<html lang ="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/minty/bootstrap.min.css">
    <title>{{config('app.name', 'Parking')}}</title>
</head>
<body>
    @include('layouts.navbar')
    <div class ="container">
        @include('layouts.msgs')
        @yield('content')
    </div>
    @yield('script')
</body>
</html>