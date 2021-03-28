@extends('layouts.front')
@section('title', '演奏者の一覧')
    
@section('content')
    <div class="container">
        <div class="col-md-10 mx-auto mt-3">
            <h3>演奏者の一覧</h3>
            @if($posts->isEmpty())
                <p>現在の登録者はいません</p>
            @else
            <p>「詳細をみる」からチャットできます</p>
                <!--カードで表示したい-->
                <div class="playerPost">
                    <div class="row row-cols-1 row-cols-md-2">
                        @foreach ($posts as $post)
                            <div class="col mt-3">
                                <div class="card h-100">
                                    @if($post->image_path_1)
                                    <img class="card-img-top" src="{{ $post->image_path_1 }}" width="100%" height="200" >
                                    @else
                                    <img class="card-img-top" src="{{ asset('images/non_image/animal_hamster.png') }}" width="100%" height="200">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->firstname_1 }} {{ $post->lastname_1 }} </h5>
                                        <p class="card-title">{{ $post->firstname_2 }} {{ $post->lastname_2 }}</p>
                                        <p class="card-text">{{ $post->introduction }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ action('PlayerController@showProfile', ['id' => $post->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            <!--カードここまで-->
            @endif
        </div>
    </div>
@endsection@extends('layouts.front')
@section('title', '演奏者の一覧')
    
@section('content')
    <div class="container">
        <div class="col-md-10 mx-auto mt-3">
            <h3>演奏者の一覧</h3>
            @if($posts->isEmpty())
                <p>現在の登録者はいません</p>
            @else
            <p>「詳細をみる」からチャットできます</p>
                <!--カードで表示したい-->
                <div class="playerPost">
                    <div class="row row-cols-1 row-cols-md-2">
                        @foreach ($posts as $post)
                            <div class="col mt-3">
                                <div class="card h-100">
                                    @if($post->image_path_1)
                                    <img class="card-img-top" src="{{ $post->image_path_1 }}" width="100%" height="200" >
                                    @else
                                    <img class="card-img-top" src="{{ asset('images/non_image/animal_hamster.png') }}" width="100%" height="200">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->firstname_1 }} {{ $post->lastname_1 }} </h5>
                                        <p class="card-title">{{ $post->firstname_2 }} {{ $post->lastname_2 }}</p>
                                        <p class="card-text">{{ $post->introduction }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ action('PlayerController@showProfile', ['id' => $post->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            <!--カードここまで-->
            @endif
        </div>
    </div>
@endsection