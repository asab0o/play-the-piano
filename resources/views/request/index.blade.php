@extends('layouts.front')
@section('title', '依頼の一覧')
    
@section('content')
    <div class="container-fluid">
            <div class="col-md-10 mx-auto">
                <h1>依頼の一覧</h1>
                    <div class="post">
                        @for ($i = 0; $i < 5; $i++)
                        <div class="card mt-3">
                            <div class="card-header">
                                21/01/09
                            </div>
                            {{--<!--imageを配列で取得するようにmigrate直す？-->
                            <!--@foreach ($posts as $)-->
                            <!--<div class="card-header"> 更新日: {{ $request->created_at }}</div>-->
                            <!--@if($request->$images)-->
                            <!--@for($i = 0; $i < 5; $i++)-->
                            <!--<img src="{{ $images->image_.$i }}" class="card-img-top .justify-content-around">-->
                            <!--@endfor-->
                            <!--@endif-->--}}
                            <div class="card-body">
                                <h5 class="card-title">テスト</h5>
                                <p class="card-text">テストです</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ action('RequestController@showArticle') }}" class="btn btn-outline-primary">詳細をみる</a>
                                {{--<!--<a href="{{ action('RequestController@showArticle', ['id' => $request->id]) }}" class="btn btn-outline-primary">詳細をみる</a>----}}
                            </div>
                        </div>
                        @endfor
                    </div>
                <!--カードここまで-->
            </div>
        </div>

@endsection