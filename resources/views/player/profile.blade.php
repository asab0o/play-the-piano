@extends('layouts.front')

@section('title', 'プロフィール画面')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto mt-3">
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
                    <div class="col-md-3">
                        {{ __('messages.birthday') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->birthday }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.introduction') }}
                    </div>
                    <div class="col-md-9">
                        {{ str_limit($player->introduction, 300) }}
                    </div>
                </div>
                <div class="card-body col-md-6">
                    @for($i = 1; $i <= 3; $i++)
                    @if ($player->{"image_path_{$i}"})
                    <div class="image col-md-4 text-right mt-4">
                        <img src="{{ asset('storage/image/'.$player->{"image_path_{$i}"}) }}">
                    </div>
                    @endif
                    @endfor
                </div>
             </div>   
        </div>
    </div>
@endsection
