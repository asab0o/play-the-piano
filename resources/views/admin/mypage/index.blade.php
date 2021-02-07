@extends('layouts.front')

@section('title', 'マイページ')

@section('content')
    <div class="container-fluid">
        <!--コメント表示画面-->
        <div class="chat-area col-md-10 mx-auto mt-3">
            <div class="card">
                <div class="card-header">通知</div>
                <div class="card-body chat-card">
                    
                </div>
            </div>
        </div>
        <!--ユーザーが投稿したものを確認-->
        <!--プロフィール表示-->
        @if($player)
        <div class="col-md-10 mx-auto mt-5">
            <h3>{{ $player->firstname_1 }} {{ $player->lastname_1 }} さん</h3>
            <hr color="">
            <div class="card">
                <div class="card-header">
                    {{ __('messages.updated_at') }}:{{ $player->updated_at }}
                </div>
                <div class="card-body row">
                    <i class="material-icons">inbox</i>
                    <div class="col-md-4 row">
                        <p class="col-md-3">
                            {{ __('messages.area') }}
                        </p>
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
                    <div class="col-md-8 row">
                        @for($i = 1; $i <= 3; $i++)
                        @if ($player->{"image_path_{$i}"})
                        <div class="image col-auto mt-4">
                            <img src="{{ asset('storage/image/'.$player->{"image_path_{$i}"}) }}">
                        </div>
                        @endif
                        @endfor
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button", class="btn btn-primary" href="{{ action('Admin\PlayerController@edit', ['id' => $player->id]) }}">update</button>
                    <button type="button", class="btn btn-danger" href="{{ action('Admin\PlayerController@delete', ['id' => $player->id]) }}">delete</button>
                </div>
            </div>
        </div>
        @endif
        
        <!--演奏依頼表示-->
        @if($requests)
        @foreach($requests as $request)
        <div class="col-md-10 mx-auto mt-3">
        <h3>{{ $request->title }}</h3>
        <hr color="">
            <div class="card">
                <div class="card-header">
                        {{ __('messages.display_term') }} :{{ $request->display_date_from }} ~ {{ $request->display_date_to }}
                </div>
                <div class="card-body row">
                    <div class="col-md-3">
                        {{ __('messages.name') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->name }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.date_time') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->date_time }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.area') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->area }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.rewards') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->rewards }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.parking_lots') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->parking_lots }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.genres') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->genres }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.dress') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->dress }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.introduction') }}
                    </div>
                    <div class="col-md-9">
                        {{ str_limit($request->introduction, 300) }}
                    </div>
                    @if($request->tel_number)
                    <div class="col-md-3">
                        {{ __('messages.tel_number') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->tel_number }}
                    </div>
                    @endif
                </div>
                @for($i = 1; $i <= 5; $i++)
                @if($request->{"image_path_".$i})
                <div class="card-body col-md-6">
                    <div class="image col-md-4 text-right mt-4">
                        <img src="{{ asset('storage/image/'.$request->{'image_path_'.$i}) }}">
                    </div>
                </div>
                @endif
                @endfor
                <div class="card-footer">
                    <button type="button", class="btn btn-primary", shref="{{ action('Admin\RequestController@edit', ['id' => $request->id]) }}">update</button>
                    <button type="button", class="btn btn-danger", shref="{{ action('Admin\RequestController@delete', ['id' => $request->id]) }}">delete</button>
                </div>
            </div>  
        </div>
        @endforeach
        @endif
    </div>
@endsection

