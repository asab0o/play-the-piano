@extends('layouts.front')
@section('title', '依頼の一覧')
    
@section('content')
    <div class="container-fluid">
            <div class="col-md-10 mx-auto">
                <h1>依頼の一覧</h1>
                    <div class="post">
                        <div class="card">
                            <!--imageを配列で取得するようにmigrate直す-->
                            @foreach ($posts as $request)
                            <div class="card-header"> 更新日: {{ $request->created_at }}</div>
                            @if($request->$images)
                            @for($i = 0; $i < 5; $i++)
                            <img src="{{ $images->image_.$i }}" class="card-img-top .justify-content-around">
                            @endfor
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $request->title }}</h5>
                                <p class="card-text">{{ $request->introduction }}</p>
                            </div>
                            <div class="card-footer">
                                
                                <a href="{{ action('RequestController@showArticle', ['id' => $request->id]) }}" class="btn btn-outline-primary">詳細をみる</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                <!--カードここまで-->
            </div>
        </div>

@endsection