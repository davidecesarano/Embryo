<!doctype html>
<html lang="{{ app_locale() }}" class="h-100">
    <head>
        <meta charset="{{ app_charset() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>{{ $title }}</title>
    </head>
    <body class="h-100">
        <div class="d-flex flex-column justify-content-center h-100 text-center">
            <h1 class="display-1">{{ $title }}</h1>
        </div>
    </body>
</html>