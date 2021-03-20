@extends('layouts.front')

@section('title', 'プロフィール画面')

@section('content')
<div class="profileView">
    <div class="container">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header row">
                <h3>{{ $player->firstname_1 }} {{ $player->lastname_1 }} さん</h3>
                <div class="goToChat">
                    @guest
                        <a href="{{ action('Admin\ChatController@show', ['user_id' => $player->user_id]) }}">チャットで話を聞いてみる<span class="fas fa-comment fa-2x"></span></a>
                    @else
                        @if($player->user_id != Auth::user()->id)
                        <a href="{{ action('Admin\ChatController@show', ['user_id' => $player->user_id]) }}">チャットで話を聞いてみる<span class="fas fa-comment fa-2x"></span></a>
                        @endif
                    @endguest
                </div>
            </div>
            
            <!--要確認-->
            <div class="card-body">
               <ul class="list-group list-group-flush fa-ul">
                   <li class="list-group-item">
                       <span class="fa-li"><i class="fas fa-map-marker-alt fa-2x"></i></span>
                       <div class="bmd-list-group-col">
                           <p class="list-group-item-heading">{{ __('messages.area') }}</p>
                           <p class="list-group-item-text">{{ $player->prefecture }}</p>
                       </div>
                   </li>
                   <li class="list-group-item">
                       <span class="fa-li"><i class="fas fa-music fa-2x"></i></span>
                       <div class="bmd-list-group-col">
                           <p class="list-group-item-heading">{{ __('messages.experience') }}</p>
                           <p class="list-group-item-text">{{ $player->experience }} 年</p>
                       </div>
                   </li>
                   <li class="list-group-item">
                       <span class="fa-li"><i class="far fa-id-badge fa-2x"></i></span>
                       <div class="bmd-list-group-col">
                           <p class="list-group-item-heading">{{ __('messages.introduction') }}</p>
                           <p class="list-group-item-text">{{ str_limit($player->introduction, 300) }}</p>
                       </div>
                   </li>
                   <li class="list-group-item">
                       <span class="fa-li"><i class="fas fa-play-circle fa-2x"></i></span>
                       <div class="bmd-list-group-col">
                           <p class="list-group-item-heading">{{ __('messages.performance') }}</p>
                           @if ($player->performance)
                           <p class="list-group-item-text">{{ $player->performance }}</p>
                           @else
                           <p class="list-group-item-text">登録なし</p>
                           @endif
                        </div>
                   </li>
               </ul> 
                <!--要確認-->
                <div class="col-md-4 row">
                    @for($i = 1; $i <= 3; $i++)
                    @if ($player->{"image_path_{$i}"})
                    <div class="image mt-4">
                        <img src="{{ asset('storage/image/'.$player->{"image_path_{$i}"}) }}">
                    </div>
                    @endif
                    @endfor
                </div>
            </div>
            <div class="card-footer upDateTime row">
                <i class="fas fa-clock"></i>
                <p>{{ $player->updated_at->format('Y/m/d') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
