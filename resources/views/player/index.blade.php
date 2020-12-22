@extends('layouts.front')
@section('title', '演奏者の一覧')
    
@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto">
            <h1>演奏者の一覧</h1>
            <!--カードで表示したい-->
            @foreach ($posts as $player)
                <div class="post">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                              <svg class="bd-placeholder-img card-img-top" width="100%" height="180"></svg>
                              <div class="card-body">
                                <h5 class="card-title">{{ $player->name }}</h5>
                                <p class="card-text">{{ $player->introduction }}</p>
                                <a href="{{ action('コントローラー名とアクション名'), ['id' => $players->id] }}">詳細をみる</a>
                              </div>
                            </div>
                        </div>
                        <!--カードここまで-->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection