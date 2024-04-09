<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @guest
            @yield('content')
        @else
       
        <div class="sidebar">
            <div class="sidebar-menu1  menu-item"></div>
            <div class="sidebar-menu">
                <a href="{{ route('clinics') }}" class="btn sidebar-btn">診察時間編集</a>
                <a href="{{ route('long_vocation') }}" class="btn sidebar-btn">長期休業設定</a>
            </div>
            <div class="sidebar-menu  menu-item"></div>
            <div class="sidebar-menu"><a href="{{ route('user') }}" class="btn sidebar-btn">アカウント情報t</a></div>
            
        </div>
        <main class="content py-5">
            <div class="container main-form">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row mb-5">
                            <div class="col-md-8">
                                <a href="{{ route('home') }}" class="text-dark">
                                    <h4 class="font-weight-bold">ホーム</h4>
                                </a>
                            </div>
                            <div class="col-md-4">
                            <label class="font-weight-bold top-user-name"> {{ Auth::user()->email }}</label>さん
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}" class="btn btn-primary logout"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                            </form>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        @endguest
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
</body>
</html>
