@extends('layouts.front')
@section('title', 'playThePiano')

@section('content')

<div class="container">
    <div class="col-md-12 mx-auto mt-3">
        <div class="requestHead justify-content-between mx-1 row" style="inline">
            <h3 class="mb-0">演奏者求人</h3>
            <a href="{{ action('RequestController@index') }}"><i class="fas fa-arrow-alt-circle-right"></i>一覧をみる</a>
        </div>
        <!--以下カルーセル-->
        <div class="carousel slide mt-2" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#example3" data-slide-to="0" class="ative"></li>
                <li data-target="#example3" data-slide-to="1"></li>
                <li data-target="#example3" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item{{ $i == 0 ? ' active' :  ''}} ">
                    <!--投稿がない場合の条件分岐-->
                    @if(empty($requests[$i]))
                    <img src="images/carousel_test/投稿お待ちしてます。.png" alt="Slide" class="requestImg d-md-block d-none w-100">
                    <div class="non_image w-100 d-sm-none">投稿お待ちしてます！</div>
                    @else
                    <!--投稿はあるが表示させる画像がなかった場合の条件分岐（三項演算子）-->
                    @if($requests[$i]->image_path_1)
                    <img src="{{ $requests[$i]->image_path_1 }}" alt="Slide" class="d-block w-100">
                    @else
                    <img src="{{ secure_asset('images/non_image/piano_neko.png') }}" alt="Slide" class="d-block w-100">
                    @endif
                    {{--<!--<img src="{{ $requests[$i]->image_path_1 ? $requests[$i]->image_path_1 : secure_asset('images/non_image/piano_neko.png')) }}" alt="Slide" class="d-block w-100">-->--}}
                    <div class="carousel-caption text-left d-none d-md-block" style="top:50px">
                        <p class="card-text"><small class="text-muted">{{ $requests[$i]->updated_at->format('Y/m/d') }}</small></p>
                        <h1 class="card-title">{{ $requests[$i]->title }}</h1>
                        <p class="card-text">{{ str_limit($requests[$i]->introduction, 50) }}</p>
                        <a href="{{ action('RequestController@showArticle', ['id' => $requests[$i]->id]) }}" class="btn btn-primary">詳細をみる</a>
                    </div>
                    @endif
                </div>
                @endfor
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
        <!--ここまでカルーセル-->
    </div>   
    <div class="col-md-12 mx-auto mt-5">
        <div class="playerHead justify-content-between mx-1 row" style="inline">
            <h3 class="mb-0">演奏者</h3>
            <a href="{{ action('PlayerController@index') }}"><i class="fas fa-arrow-alt-circle-right"></i>一覧をみる</a>
        </div>
        <div class="playerList mt-2 row">
            @if($players->isEmpty())
                <P>現在の登録者はいません</P>
            @else
            @foreach($players as $player)
            <div class="col-md-4 col-sm-12 mb-2">
                <div class="card h-100">
                    @if($player->image_path_1)
                    <img class="card-img-top" src="{{ $player->image_path_1 }}" width="100%" height="180">
                    @else
                    <img class="card-img-top" src="{{ asset('images/non_image/animal_hamster.png') }}" widht="100%" height="180">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $player->firstname_1 }} {{ $player->lastname_1 }} <small>さん</small></h5>
                        <p class="card-text">{{ str_limit($player->introduction, 50) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ action('PlayerController@showProfile', ['id' => $player->id]) }}" class="card-link">詳細をみる</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
    
@endsection
