@extends('layouts.front')
@section('title', '依頼の一覧')
    
@section('content')
    <div class="container-fluid">
            <div class="col-md-10 mx-auto mt-3">
                <h1>依頼の一覧</h1>
                @if($posts->isEmpty())
                    <h3>現在の募集はありません</h3>
                @else
                    <div class="request-post">
                        @foreach($posts as $post)
                        <div class="card mt-3">
                            <div class="card-header">
                                更新日: {{ $post->created_at->format('Y/m/d') }}
                            </div>
                            <div class="card-image-top justify-content-around row">
                                @for ($i = 1; $i <= 3; $i++)
                                @if($post->{'image_path_'.$i})
                                    <img src="{{ asset('storage/image/'.$post->{'image_path_'.$i}) }}">
                                @endif
                                @endfor
                                <!--<hr color="">-->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ str_limit($post->title, 10) }}</h5>
                                <p class="card-text">{{ str_limit($post->introduction, 1500) }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ action('RequestController@showArticle', ['id' => $post->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                                {{--<!--<a href="{{ action('RequestController@showArticle', ['id' => $request->id]) }}" class="btn btn-outline-primary">詳細をみる</a>----}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                <!--カードここまで-->
                @endif
            </div>
        </div>

@endsection