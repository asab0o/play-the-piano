@extends('layouts.front')
@section('title', '依頼の一覧')
    
@section('content')
    <div class="container">
            <div class="col-md-10 mx-auto mt-3">
                <h3>依頼の一覧</h3>
                @if($posts->isEmpty())
                    <p>現在の募集はありません</p>
                @else
                <p>「詳細をみる」からチャットできます</p>
                    <div class="requestList">
                        @foreach($posts as $post)
                        <div class="card mt-3">
                            <div class="card-header">
                                更新日: {{ $post->created_at->format('Y/m/d') }}
                            </div>
                            <div class="card-image-top justify-content-around row">
                                @for ($i = 1; $i <= 3; $i++)
                                @if($post->{'image_path_'.$i})
                                    <img src="{{ $post->{'image_path_'.$i} }}" class="mt-3" width="400" height="300">
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