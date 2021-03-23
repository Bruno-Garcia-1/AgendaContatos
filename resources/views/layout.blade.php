<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Agenda de Contatos</title>

    <link sizes="60x60" rel="shortcut icon" href="{{ asset('imgs/logo.png') }}" type="image/x-icon"/>

    <!-- CSS Bootstrap 5.0.0-beta2 -->
    <link rel="stylesheet" href="{{ asset('/libs/bootstrap-5.0.0-beta2/css/bootstrap.css') }}">
    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>

<body>

<header class="col-12 text-center mt-3">
    <img id="banner" src="{{ asset('imgs/logo.png') }}" alt="K13 Agência Web">
</header>

<div class="container-sm">

    <div class="row">
        <div id="menu" class="col-12 text-center">
            @include('nav.index')
        </div>
    </div>

    <div class="row">
        <div id="content" class="container col-12 p-4">
            @yield('content')
        </div>
    </div>



</div>

<footer class="col-12 fixed-bottom text-center py-1">
    <p>By Bruno Garcia - WhatsApp <a href="https://api.whatsapp.com/send?phone=5542999868623" target="_blank"> (42) 9 9986-8623</a></p>
</footer>


@include('libs')

</body>
</html>
