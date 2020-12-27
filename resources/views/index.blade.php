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
                <div class="col-md-12">
                    <div class="carousel slide" data-ride="carousel" style="midth:400px">
                        <div class="carousel-inner">
                            @for ($i = 0; $i < 3; $i++)
                            <div class="carousel-item active">
                                <img src="" alt="Slide".$i>
                                <div class="carousel-caption" style="top:10px">
                                    <!--{{--{{ str_limit($post->title, 20) }}--}}-->
                                    <h6>タイトル表示させます</h6>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>演奏者</h2>
                <a href="{{ url('player/index') }}">一覧をみる</a>
                <div class="row">
                    @for($i = 0; $i < 6; $i++)
                    <div class="col-md-4 col-sm-12">
                        <div class="card"　style="">
                            <img class="card-img-top" src="" >
                            <div class="card-body">
                                <h5 class="card-title">タイトル</h5>
                                <p class="card-text">テキストテキスト</p>
                                <a href="" class="btn btn-secondary">詳細リンク</a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    
@endsection