@extends('layouts.front')
@section('title', 'pia-match')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto mt-3">
                <div class="boder-bottom" style="inline">
                    <h2>演奏場所</h2>
                    <a href="{{ action('RequestController@index') }}">一覧をみる</a>
                </div>
                <!--<hr color=>-->
                <!--以下カルーセル-->
                <div class="carousel slide mt-2" data-ride="carousel" data-interval="3000">
                    <ol class="carousel-indicators">
                        <li data-target="#example3" data-slide-to="0" class="ative"></li>
                        <li data-target="#example3" data-slide-to="1"></li>
                        <li data-target="#example3" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @if($requests[0]->image_path_1)
                            <img src="{{ secure_asset('storage/image/'.$requests[0]->image_path_1) }}" alt="Slide" class="d-block w-100" >
                            @else
                            <img src="{{ secure_asset('images/non_image/piano_neko.png') }}" alt="Slide" class="d-block w-100" >
                            @endif
                            <div class="carousel-caption d-none d-md-block" style="top:50px">
                                <h5 class="card-title">{{ $requests[0]->title }}</h5>
                                <p class="card-text">{{ str_limit($requests[0]->introduction, 20) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $requests[0]->updated_at->format('Y/m/d') }}</small></p>
                                <a href="{{ action('RequestController@showArticle', ['id' => $requests[0]->id]) }}" class="btn btn-primary">詳細をみる</a>
                            </div>
                        </div>
                        
                        @for ($i = 1; $i < 3; $i++)
                        <div class="carousel-item">
                            @if($requests[$i]->image_path_1)
                            <img src="{{ secure_asset('storage/image/'.$requests[$i]->image_path_1) }}" alt="Slide" class="d-block w-100" >
                            @else
                            <img src="{{ secure_asset('images/non_image/piano_neko.png') }}" alt="Slide" class="d-block w-100" >
                            @endif
                            <div class="carousel-caption d-none d-md-block" style="top:50px">
                                <h5 class="card-title">{{ $requests[$i]->title }}</h5>
                                <p class="card-text">{{ str_limit($requests[$i]->introduction, 20) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $requests[$i]->updated_at->format('Y/m/d') }}</small></p>
                                <a href="{{ action('RequestController@showArticle', ['id' => $requests[$i]->id]) }}" class="btn btn-primary">詳細をみる</a>
                            </div>
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
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                <h2>演奏者</h2>
                <a href="{{ action('PlayerController@index') }}">一覧をみる</a>
                <div class="col-md-10 mt-2 mx-auto row">
                    @foreach($players as $player)
                    <div class="col-md-4 col-sm-12">
                        <div class="card h-100">
                            @if($player->image_path_1)
                            <img class="card-img-top" src="{{ asset('storage/image/'.$player->image_path_1) }}" >
                            @else
                            <img class="card-img-top" src="{{ asset('images/non_image/animal_hamster.png') }}" >
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $player->firstname_1 }} {{ $player->lastname_1 }} <small>さん</small></h5>
                                <p class="card-text">{{ str_limit($player->introduction, 50) }}</p>
                                <a href="{{ action('PlayerController@showProfile', ['id' => $player->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection