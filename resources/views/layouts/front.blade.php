<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible", content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!--timepicker表示されない-->
        <script src="https://cdn.jsdelivr.net/npm/timepicker@1.13.16/jquery.timepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/timepicker@1.13.16/jquery.timepicker.js"></script>
        <!--Fontの設定-->
        <link rel="" href=""> 
        <link rel="" href="" type="">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/org.css') }}" rel="stylesheet">
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
                            <a class="nav-link" href="{{ action('RequestController@index')}}">演奏場所を探す <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PlayerController@index') }}">演奏者を探す <span class="sr-only">(current)</span></a>
                        </li>
                        @guest
                        <li class="nab-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        @else
                        {{--@if($playerJudge)--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('Admin\PlayerController@edit', ['id' => auth()->user()->id]) }}">プロフィールの編集・削除</a>    
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('Admin\PlayerController@add') }}">プロフィールの新規作成</a>
                        </li>
                        {{--@endif--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                依頼したい
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ action('Admin\RequestController@add') }}">演奏依頼を投稿</a>
                                <a class="dropdown-item" href="{{ action('Admin\RequestController@edit', ['id' => auth()->user()->id]) }}">掲示中のものを編集・削除</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{--<!--<a class="dropdown-item" href="{{ action('Admin\MypageController@index', ['id' => auth()->user()->id]) }}">マイページ <span class="sr-only">(current)</span></a>-->--}}
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