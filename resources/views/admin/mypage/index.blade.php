@extends('layouts.front')

@section('title', 'マイページ')

@section('content')
    <div class="container-fluid">
        <!--コメント表示画面-->
        <div class="chat-area col-md-10 mx-auto mt-3">
            <div class="card">
                <div class="card-header">通知</div>
                    @if(empty($chats) || empty($chat_msg_date))
                    <div class="card-body">
                        <p>現在メッセージはありません</p>
                    </div>
                    @else
                    <div class="list-group">
                        @foreach($chats as $chat)
                        <a href="{{ action('Admin\ChatController@show', ['user_id' => $chat->id]) }}" class="list-group-item list-group-item-action">
                            <p>{{ $chat_msg_date->format('Y/m/d') }}</p>
                            <p>{{ $chat->name }}<small> さん</small></p>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!--ユーザーが投稿したものを確認
        <!--プロフィール表示-->
        @if($player)
        <div class="col-md-10 mx-auto mt-5">
            <h3>演奏者プロフィール</h3>
            <hr color="">
            <div class="card">
                <div class="card-header">
                    {{ __('messages.updated_at') }}:{{ $player->updated_at }}
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">名前</p>
                                <p class="list-group-item-text">{{ $player->firstname_1 }} {{ $player->lastname_1 }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.area') }}</p>
                                <p class="list-group-item-text">{{ $player->prefecture }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.experience') }}</p>
                                <p class="list-group-item-text">{{ $player->experience }} 年</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.birthday') }}</p>
                                <p class="list-group-item-text">{{ $player->birthday }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.introduction') }}</p>
                                <p class="list-group-item-text">{{ str_limit($player->introduction, 300) }}</p>
                            </div>
                        </li>
                        @for($i = 1; $i <= 3; $i++)
                        @if ($player->{"image_path_{$i}"})
                        <div class="image col-auto mt-4">
                            <img src="{{ asset('storage/image/'.$player->{"image_path_{$i}"}) }}">
                        </div>
                        @endif
                        @endfor
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ action('Admin\PlayerController@edit', ['id' => $player->id]) }}" class="updateBtn btn btn-secondary">{{ __('messages.update') }}</a>
                    <a href="{{ action('Admin\PlayerController@delete', ['id' => $player->id]) }}" class="deleteBtn btn btn-primary">{{ __('messages.delete') }}</a>
                </div>
            </div>
        </div>
        @endif
        
        <!--演奏依頼表示-->
        @if($requests->isNotEmpty())
        <div class="col-md-10 mx-auto mt-5">
            <h3>演奏依頼の投稿一覧</h3>
            <hr color="">
            @foreach($requests as $request)
            <div class="card mb-3">
                <div class="card-header">
                    <h3>{{ $request->title }}</h3>
                    <small>{{ __('messages.display_term') }} :{{ $request->display_date_from }} ~ {{ $request->display_date_to }}</small>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.name') }}</p>
                                <p class="list-group-item-text">{{ $request->name }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.date_time') }}</p>
                                <p class="list-group-item-text">{{ $request->date_time }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.area') }}</p>
                                <p class="list-group-item-text">{{ $request->area }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.rewards') }}</p>
                                <p class="list-group-item-text">{{ $request->rewards }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.parking_lots') }}</p>
                                <p class="list-group-item-text">{{ $request->parking_lots }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.genres') }}</p>
                                <p class="list-group-item-text">{{ $request->genres }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.dress') }}</p>
                                <p class="list-group-item-text">{{ $request->dress }}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.introduction') }}</p>
                                <p class="list-group-item-text">{{ str_limit($request->introduction, 300) }}</p>
                            </div>
                        </li>
                        @if($request->tel_number)
                        <li class="list-group-item">
                            <div class="bmg-list-group-col">
                                <p class="list-group-item-heading">{{ __('messages.tel_number') }}</p>
                                <p class="list-group-item-text">{{ $request->tel_number }}</p>
                            </div>
                        </li>
                        @endif
                        <!--画像-->
                        @for($i = 1; $i <= 5; $i++)
                        @if($request->{"image_path_".$i})
                            <div class="image col-auto mt-4">
                                <img src="{{ asset('storage/image/'.$request->{'image_path_'.$i}) }}">
                            </div>
                        @endif
                        @endfor
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ action('Admin\RequestController@edit', ['id' => $request->id]) }}" class="updateBtn btn btn-secondary">{{ __('messages.update') }}</a>
                    <a href="{{ action('Admin\RequestController@delete', ['id' => $request->id]) }}" class="deleteBtn btn btn-primary">{{ __('messages.delete') }}</a>
                </div>
            </div>  
            @endforeach
        @endif
    </div>
@endsection

