@extends('layouts.front')
@section('title', '依頼の一覧')
    
@section('content')
    <div class="container-fluid">
            <div class="col-md-10 mx-auto">
                <h1>依頼の一覧</h1>
                    <div class="post">
                        @foreach($posts as $post)
                        <div class="card mt-3">
                            <div class="card-header">
                                更新日: {{ $post->created_at->format('Y/m/d') }}
                            </div>
                            @if($post->$image)
                            <img src="{{ $images->image_.1 }}" class="card-img-top .justify-content-around">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ str_limit($post->title, 10) }}</h5>
                                <p class="card-text">{{ str_limit($post->introduction, 1500) }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ action('RequestController@showArticle', ['id' => $poat->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                                {{--<!--<a href="{{ action('RequestController@showArticle', ['id' => $request->id]) }}" class="btn btn-outline-primary">詳細をみる</a>----}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                <!--カードここまで-->
            </div>
        </div>

@endsection