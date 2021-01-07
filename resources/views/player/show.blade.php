@extends('layouts.front')

@section('title', 'プロフィール画面')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto">
            <h3>{{ $player->firstname_1 }} {{ $player->lastname_1 }} さん</h3>
            <hr color="">
            <div class="card">
                <div class="card-header">
                        {{ __('messages.updated_at') }}:{{ $player->updated_at }}
                </div>
                <div class="card-body col-md-6 row">
                    <div class="col-md-3">
                        {{ __('messages.area') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->prefecture }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.experience') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->experience }} 年
                    </div>
                    <div class="col-md-2">
                        {{ __('messages.birthday') }}
                    </div>
                    <div class="col-md-10">
                        {{ $player->birthday }}
                    </div>
                    <div class="col-md-2">
                        {{ __('messages.introduction') }}
                    </div>
                    <div class="col-md-10">
                        {{ str_limit($player->introduction, 300) }}
                    </div>
                </div>
                <div class="card-body col-md-6">
                    <div class="image col-md-4 text-right mt-4">
                        @if ($player->image_path_1)
                            <img src="{{ $player->image_path_1 }}">
                        @endif
                    </div>
                </div>
             </div>   
        </div>
    </div>
@endsection
