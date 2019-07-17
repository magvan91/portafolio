<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Marco Antonio García Cabrera">
        <meta name="description" content="Página personal, donde podras encontrar mi historial laboral y las habilidades técnicas que manejo">
        <meta name="keywords" content="Desarrollo Web, PHP, Programador, México, CDMX, Programación, Ciudad de México, Codeigniter, Ingeniero, Ingeniero en Sistemas">
        <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Developer Web - Marco Antonio García Cabrera</title>
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <script async type="text/javascript" src="js/app.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
       <div id="app">
            @yield('profile')
            @yield('skills')
            @yield('jobs')
            @yield('formContact')
        </div>
    </body>
</html>
