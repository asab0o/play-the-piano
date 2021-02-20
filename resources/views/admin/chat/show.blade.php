@extends('layouts.front')

@section('content')

<div class="chatPages">
    <div class="container">
        <!--送信者とメッセージを表示させる-->
        <div class="messagesArea">
            @foreach ($chat_msg as $msg)
            <div class="messages">
                @if ($msg->user_id == Auth::id())
                <span>{{ Auth::user()->name }}</span>
                @else
                <span>{{ $chat_room_user_name }}</span>
                @endif
                <div class="commonMessages">
                    <div>
                        {{ $message->message }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <form class="messagesInput">
            {{ Form::text('') }}
        </form>
    </div>
</div>

@endsection