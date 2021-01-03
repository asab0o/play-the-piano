@extends('layouts.front')

@section('title', 'プロフィール画面')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto">
            @foreach($posts as $player)
            {{ var_dump($player) }}
                {{--<!--<h3>{{ $player->firstname_1 }} {{ $player->lastname_1 }} さん</h3>-->--}}
                <hr color="">
                <div class="row">
                    <div class="col-md-4 row">
                        <div class="col-md-2">
                            {{ __('messages.updated_at') }}
                        </div>
                        <div class="col-md-10">
                            {{ $player->updated_at }}
                        </div>
                        <div class="col-md-2">
                            {{ __('messages.area') }}
                        </div>
                        <div class="col-md-10">
                            {{ $player->prefecture }}
                        </div>
                        <div class="col-md-2">
                            {{ __('messages.experience') }}
                        </div>
                        <div class="col-md-10">
                            {{ $player->experience }} 年
                        </div>
                        <div class="col-md-2">
                            {{ __('messages.birthday') }}
                        </div>
                        <div class="col-md-10">
                            {{ $player->birthday->format('Y年 m月 d日') }}
                        </div>
                        <div class="col-md-2">
                            {{ __('messages.introduce') }}
                        </div>
                        <div class="col-md-10">
                            {{ str_limit($player->introduce, 300) }}
                        </div>
                        
                    </div>
                    <div class="image col-md-4 text-right mt-4">
                        @if ($post->image_path)
                            <img src="{{ $post->image_path }}">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
