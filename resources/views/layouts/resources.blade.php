<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="h-100" ng-app>
        @yield('app')

        <script src="{{ mix('/js/app.js') }}"></script>

        @yield('js-section')
    </body>
</html>
