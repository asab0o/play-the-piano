@extends('layouts.front')

@section('title', 'プロフィール画面')

@section('content')
    <div class="container-fluid">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header">
                <h3>{{ $player->firstname_1 }} {{ $player->lastname_1 }} さん</h3>
                <p>{{ __('messages.updated_at') }}:{{ $player->updated_at }}</p>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                   <ul class="list-group">
                       <li class="list-group-item">
                           <p>{{ __('messages.area') }}</p>
                           <p>{{ $player->prefecture }}</p>
                       </li>
                       <li class="list-group-item">
                           <p>{{ __('messages.experience') }}</p>
                           <p>{{ $player->experience }} 年</p>
                       </li>
                       <li class="list-group-item">
                           <p>{{ __('messages.introduction') }}</p>
                           <p>{{ str_limit($player->introduction, 300) }}</p>
                       </li>
                       <li class="list-group-item">
                           <p>{{ __('messages.performance') }}</p>
                           @if ($player->performance)
                           <p>{{ $player->performance }}</p>
                           @else
                           <p>登録なし</p>
                           @endif
                       </li>
                   </ul> 
                </div>
                <!--要確認-->
                <div class="col-md-6">
                    @for($i = 1; $i <= 3; $i++)
                    @if ($player->{"image_path_{$i}"})
                    <div class="image mt-4">
                        <img src="{{ asset('storage/image/'.$player->{"image_path_{$i}"}) }}">
                    </div>
                    @endif
                    @endfor
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger bmd-btn-fab float-right">
                    <i class="material-icons"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
