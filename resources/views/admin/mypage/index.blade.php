@extends('layouts.front')

@section('title', 'マイページ')

@section('content')
    <div class="container-fluid">
        <!--コメント表示画面-->
        <div class="chat-area col-md-10">
            <div class="card">
                <div class="card-header">コメント</div>
                <div class="card-body chat-card">
                    
                    
                </div>
            </div>
        </div>
        <!--ユーザーが投稿したものを確認-->
        @if($player)
        @foreach()
        <div class="col-md-10 mx-auto">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        @endforeach
        @endif
        @if($request)
        @foreach()
        <div class="col-md-10 mx-auto">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        @endforeach
        @endif
    </div>
    
@endsection

