@extends('layouts.front')
@section('title', 'チャット画面')

@section('content')

<div class="chatPages">
    <div class="container">
        <div class="card col-md-10 mx-auto mt-4">
            <div class="card-header row">
                <div class="chatPartner">
                    <div class="chatPartner_name">{{ $chat_room_user->name }} さん</div>
                </div>
            </div>
            <!--送信者とメッセージを表示させる-->
            <div class="card-body messages">
                @foreach ($chat_msg as $msg)
                <div class="message">
                    @if ($msg->user_id == Auth::id())
                    <span>{{ Auth::user()->name }}</span>
                    @else
                    <span>{{ $chat_room_user_name }}</span>
                    @endif
                    <div class="commonMessage">
                        <div>
                            {{ $msg->message }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer row">
                <form class="messageInputForm">
                    {{ Form::open(['action' => 'Admin\ChatController@chat', 'file' => 'true', 'class' => 'form-horizontal']) }}
                    @csrf
                    {{ Form::text('message', null, ['id' => 'messageInput', 'placeholder' => 'メッセージを入力']) }}
                    {{ Form::submit('送信', ['class' => 'btn btn-primary', 'id' => 'submit']) }}
                    {{ Form::close() }}
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var chat_id = {{ $chat_room_id }};
    var user_id = {{ Auth::user()->id }};
    var current_user_name = "{{ Auth::user()->name }}";
    var chat_room_user_name = "{{ $chat_room_user_name }}";
</script>

@endsection