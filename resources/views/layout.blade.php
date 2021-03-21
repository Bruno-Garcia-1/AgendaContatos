<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Declaração de quitação - Unimed</title>

    <link sizes="60x60" rel="shortcut icon" href="{{ asset('imgs/favicon.png') }}" type="image/x-icon"/>

    <!-- CSS Bootstrap 5.0.0-beta2 -->
    <link rel="stylesheet" href="{{ asset('/libs/bootstrap-5.0.0-beta2/css/bootstrap.css') }}">

    <style type="text/css">
        body{
            background-color: #000106;
        }
        header{
            background-color: #000106;
            height: 100px;
        }
        #banner{
            max-height: 300px;
        }
        nav{
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            text-transform: uppercase;
            font-family: inherit;
        }
        #menu:hover{
            color: #868686;
            background-color: #2B2B2B;
                 }
        #content{
            background-color: #FFFFFF;
            height: 500px;
            border-radius: 30px;
        }
        footer{
            background-color: #000106;
            height: 80px;
            color: #5B5B5B;
        }
        a{
            text-decoration: none;
            color: #6c757d;
        }

        .color1{
            background-color: #4f5050!important;
        }
        .color2{
            background-color: #ffecb5!important;
        }
        .color3{
            background-color: #cff4fc!important;
        }
        @media screen and (max-width: 576px) {
            header{
                height: 80px;
            }
            footer{
                height: 100px;
                font-size: 10px;
            }
        }
    </style>
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
        <div id="content" class="col-12">
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
