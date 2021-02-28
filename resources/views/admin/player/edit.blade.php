@extends('layouts.front')
@section('title', 'プロフィール画面の編集')
    
@section('content')
<div class="playerPages">
    <div class="container">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header row">
                <h2>プロフィール編集</h2>
            </div>
            <div class="card-body">
                {{ Form::open(['action' => 'Admin\PlayerController@update', 'files' => true, 'class' => "form-horizontal"]) }}
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!--画像の設定-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ __('messages.image') }}
                    </div>
                    <div class="col-md-10">
                        @for ($i = 1; $i <= 3; $i++)
                        <div class="col-md-6">
                            {{Form::file('image['.$i.']', ['class'=>'form-control custom-file-input','id'=>'fileImage-'.$i])}}
                            {{ Form::label('file-'.$i, '写真を選択', ['class' => 'custom-file-label', 'data-browse' => '参照']) }}
                        </div>
                        @endfor
                    </div>
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_1', __('messages.name_1')) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('firstname_1', $player_form->firstname_1, ['class' => 'form-control', 'placeholder' => '山田']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('lastname_1', $player_form->lastname_1, ['class' => 'form-control', 'placeholder' => '太郎']) }}
                    </div>
                </div>
                <!--ナマエ-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_2', __('messages.name_2')) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('firstname_2', $player_form->firstname_2, ['class' => 'form-control', 'placeholder' => 'ヤマダ']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('lastname_2', $player_form->lastname_2, ['class' => 'form-control', 'placeholder' => 'タロウ']) }}
                    </div>
                </div>
                <!--生年月日-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('birthday', __('messages.birthday')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('birthday', $player_form->birthday, ['class'=>'form-control datepicker'])}}
                    </div>
                </div>
                <!--性別 -->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('gender', __('messages.gender')), ['class' => 'form-control'] }}
                    </div>
                    <div class="col-md-8">
                        @foreach ($genders as $gender)
                        <!--クラスを再確認-->
                        <div class="form-group form-check form-check-inline">
                            <!--201227 訂正-->
                            @if ($gender->type == $player_form->gender)
                            {{ Form::radio('gender', $gender->type, true, ['class'=>'form-check-input','id'=>'gender-'.$gender->type])}}
                            {{ Form::label('gender-'.$gender->type, $gender->name, ['class' => 'form-check-label']) }}
                            @else
                            {{ Form::radio('gender', $gender->type, false, ['class'=>'form-check-input','id'=>'gender-'.$gender->type])}}
                            {{ Form::label('gender-'.$gender->type, $gender->name, ['class' => 'form-check-label']) }}
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--ピアノ暦-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('experience', __('messages.experience')) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::number('experience', $player_form->experience, ['class' => 'form-control', 'placeholder' => '半角数字で入力']) }}
                    </div>
                    <div class="col-md-2">
                        <label>年</label>
                    </div>
                </div>
                <!--活動エリア-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('prefecture', '活動エリア', null) }}
                        <!--選択にするか入力にするか-->
                    </div>
                    <div class="col-md-6">
                        <!--初期値を東京にしたい-->
                        {{ Form::select('prefecture', $prefectures, $player_form->prefecture, ['class'=>'form-control']) }}
                    </div>
                </div>
                <!--自己紹介-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('introduction', __('messages.introduction')) }}
                    </div>
                    <div class="col-md-8">
                    {{ Form::textarea('introduction', $player_form->introduction, ['class' => 'form-control', 'rows' => '5']) }}
                    </div>
                </div>
                <!--参考動画-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('performance', __('messages.performance')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::url('performance', $player_form->performance, ['class' => 'form-control', 'placeholder' => 'URL']) }}
                    </div>
                </div>
                <!--登録ボタン-->
                {{ Form::hidden('id', $player_form->id) }}
                {{ Form::submit( __('messages.update'), ['class'=>'updateBtn btn btn-secondary']) }}
                <a href="{{ action('Admin\PlayerController@delete', ['id' => $player_form->id]) }}" class="deleteBtn btn btn-primary">{{ __('messages.delete') }}</a>
                @csrf
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection