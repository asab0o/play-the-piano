@extends('layouts.front')

@section('title', '演奏依頼')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto">
            <!--以下$playerを変える必要-->
            <h3>{{ $player->title }}</h3>
            <hr color="">
            <div class="card">
                <div class="card-header">
                        {{ __('messages.display_term') }}:{{ $player->display_date_from }} ~ {{ $player->display_date_to }}
                </div>
                <div class="card-body col-md-6 row">
                    <div class="col-md-3">
                        {{ __('messages.name') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->name }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.date_time') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->date_time }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.area') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->area }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.rewards') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->rewards }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.parking_lots') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->parking_lots }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.genres') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->genres }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.dress') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->dress }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.introduction') }}
                    </div>
                    <div class="col-md-9">
                        {{ str_limit($player->introduction, 300) }}
                    </div>
                    @if($player->tel_number)
                    <div class="col-md-3">
                        {{ __('messages.tel_number') }}
                    </div>
                    <div class="col-md-9">
                        {{ $player->tel_number }}
                    </div>
                    @endif
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
