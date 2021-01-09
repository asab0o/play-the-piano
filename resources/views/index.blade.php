@extends('layouts.front')
@section('title', 'playThePiano')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!--カルーセルをいれたい-->
            <div class="col-md-10 mx-auto">
                <div class="boder-bottom" style="inline">
                    <h2>演奏場所</h2>
                    <a href="{{ url('request/index') }}">一覧をみる</a>
                </div>
                <!--<hr color=>-->
                <div class="col-md-8 mx-auto">
                    <div class="carousel slide" data-ride="carousel" data-interval="2000">
                        <ol class="carousel-indicators">
                            <li data-target="#example3" data-slide-to="0" class="ative"></li>
                            <li data-target="#example3" data-slide-to="1"></li>
                            <li data-target="#example3" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../../images/carousel_test/IMG_4313.jpeg" alt="Slide" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block" style="top:50px">
                                    <h5 class="card-title">タイトル表示させます1</h5>
                                    <p class="card-text">本文を表示させます1</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="./../images/carousel_test/IMG_4354.jpeg" alt="Slide" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block" style="top:50px">
                                    <h5>タイトル表示させます2</h5>
                                    <p>本文を表示させます2</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                            
                            {{--@foreach($requests as $request)
                            <!--<div class="carousel-item">-->
                            <!--    <img src="" alt="Slide" width="50" height="70">-->
                            <!--    <div class="carousel-caption" style="top:10px">-->
                                    {{ str_limit($post->title, 20) }}
                            <!--        <h6>タイトル表示させます3</h6>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--@endforeach--}}
                            <a class="carousel-control-prev" href="#example2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>演奏者</h2>
                <a href="{{ action('PlayerController@index') }}">一覧をみる</a>
                <div class="row">
                    @foreach($players as $player)
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            @if($player->image_1)
                            <img class="card-img-top" src="{{ $player->image_path_1 }}" >
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $player->firstname_1 }} {{ $player->lastname_1 }}</h5>
                                <p class="card-text">{{ str_limit($player->introduction, 15) }}</p>
                                <a href="{{ action('PlayerController@showProfile', ['id' => $player->id]) }}" class="btn btn-secondary">詳細をみる</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection