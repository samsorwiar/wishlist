<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .navbar {
            font-size: 30px;
        }
        .navbar-light .navbar-nav .nav-link.active{
            color: #b32113;
        }
        a:hover {font-size: 35px;}
        a {text-decoration: none}
    </style>
</head>
<body>
<header>
    @yield('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-center">
        <div class="container-xl">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link active font" aria-current="page" href="{{ route('home')}}">| Home |</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index')}}">| Wishlist |</a>
                    </li>
                    @auth()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard')}}">| Dashboard | </a>
                    </li>
                    @endauth

                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-success mt-3" type="submit">Log Out</button>
                        </form>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
</header>
