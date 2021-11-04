<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraBooks | Web2-01</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .mySlides {display: none;}
        img {vertical-align: middle;}
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 2s;
            animation-name: fade;
            animation-duration: 2s;
        }
        @-webkit-keyframes fade {
            from {opacity: 0.8} 
            to {opacity: 1}
        }
        @keyframes fade {
            from {opacity: 0.8} 
            to {opacity: 1}
        }
        .des p { padding-bottom: 1.2rem}
    </style>

</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-gray-800 flex justify-between text-white">

        <ul class="flex items-center">
            <li>
                <a class="mr-5" href="{{ route('home') }}">
                    <img class="inline-block" src="{{ asset('images/root/logo.jpg') }}">
                </a>
            </li>
            <li>
                <a class="p-3" href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a class="p-3" href="/products">Books</a>
            </li>
            <li>
                <a class="p-3" href="{{ route('about') }}">About Us</a>
            </li>
            @auth
                @if (auth()->user()->is_admin == 1)
                    <li>
                        <a class="p-3" href="/genres">Genre Management</a>
                    </li>
                    <li>
                        <a class="p-3" href="/books">Book Management</a>
                    </li>
                @endif
            @endauth

        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    <a class="p-3" href="">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a class="p-3" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="p-3" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    @yield('content')

</body>
</html>