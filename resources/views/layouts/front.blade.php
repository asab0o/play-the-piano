<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible", content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!--Fontの設定-->
        <link rel="" href=""> 
        <link rel="" href="" type="">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <!--ここからナビゲーションバー-->
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a href="#" class="navbar-brand">playThePiano</a>
                {{--<!--下記buttonタグが不明-->--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/request') }}">演奏場所を探す <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/player') }}">演奏者を探す <span class="sr-only">(current)</span></a>
                        </li>
                        @guest
                        <li class="nab-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                演奏したい<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('admin/player/create') }}">プロフィールの新規作成</a>
                                <a class="dropdown-item" href="{{ url('admin/player/edit') }}">プロフィールの編集・削除</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                依頼したい<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('admin/request/create') }}">演奏依頼を投稿</a>
                                <a class="dropdown-item" href="{{ url('admin/request/create') }}">掲示中のものを編集・削除</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin/mypage') }}">マイページ <span class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('messages.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                </div>
            </nav>
            <!--ここまでナビゲーションバー-->
            <main class="">
                @yield('content')
            </main>
        </div>
    </body>
    
</html>