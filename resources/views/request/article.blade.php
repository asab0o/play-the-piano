@extends('layouts.front')

@section('title', '演奏依頼')

@section('content')
<div class="requestView">
    <div class="container">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header row">
                <h3>{{ $request->title }}</h3>
                <div class="goToChat">
                    @guest
                    <a href="{{ route('login') }}"><span class="fas fa-comment fa-2x"></span></a>
                    @else
                    <a href="{{ action('Admin\ChatController@show', ['id' => $request->id, 'user_id' => $request->user_id]) }}"><span class="fas fa-comment fa-2x"></span></a>
                    @endguest
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush fa-ul">
                    <li class="list-group-item">
                        <span class="fa-li"><i class="fas fa-store-alt fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.name') }}</p>
                            <p class="list-group-item-text">{{ $request->name }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"><i class="far fa-calendar-alt fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.date_time') }}</p>
                            <p class="list-group-item-text">{{ $request->date_time }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"><i class="fas fa-map-marked-alt fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.area') }}</p>
                            <p class="list-group-item-text">{{ $request->area }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"><i class="fas fa-gifts fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.rewards') }}</p>
                            <p class="list-group-item-text">{{ $request->rewards }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"> <i class="fas fa-parking fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.parking_lots') }}</p>
                            <p class="list-group-item-text">{{ $request->parking_lots }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"><i class="fas fa-music fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.genres') }}</p>
                            <p class="list-group-item-text"> {{ $request->genres }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"> <i class="fas fa-user-tie fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.dress') }}</p>
                            <p class="list-group-item-text">{{ $request->dress }}</p>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <span class="fa-li"><i class="far fa-address-card fa-2x"></i></span>
                        <div class="bmd-list-group-col">
                            <p class="list-group-item-heading">{{ __('messages.introduction') }}</p>
                            <p class="list-group-item-text">{{ str_limit($request->introduction, 300) }}</p>
                        </div>
                    </li>
                </ul>
            </div>
            @for($i = 1; $i <= 5; $i++)
            @if($request->{"image_path_".$i})
            <div class="image col-md-4">
                <img src="{{ asset('storage/image/'.$request->{'image_path_'.$i}) }}">
            </div>
            @endif
            @endfor
            <div class="card-footer">
                {{ __('messages.display_term') }} :{{ $request->display_date_from }} ~ {{ $request->display_date_to }}
            </div>
        </div>
    </div>
</div>
@endsection
