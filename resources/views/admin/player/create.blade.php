@extends('layouts.front')
@section('title', 'プロフィール画面の作成')
    
@section('content')
<div class="playerPages">
    <div class="container">
         <div class="card mx-auto col-md-10 mt-3">
            <div class="card-header row">
                <h2>演奏者として登録する</h2>
            </div>
            <div class="card-body">
                {{ Form::open(['action' => 'Admin\PlayerController@create', 'files' => true, 'class' => "form-horizontal"]) }}
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('image', __('messages.image')) }}
                    </div>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <!--リストにしたい-->
                        @for ($i = 1; $i <= 3; $i++)
                        <div class="col-md-6">
                            {{ Form::file('image['.$i.']', ['class' => 'form-control custom-file-input', 'id' => 'customFile']) }}
                            {{ Form::label('customFile', '写真を選択', ['class' => 'custom-file-label', 'data-browse' => '参照']) }}
                        </div>
                        @endfor
                        </div>
                    </div>
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_1', __('messages.name_1')) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('firstname_1', old('firstname_1'), ['class' => 'form-control', 'placeholder' => '山田']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('lastname_1', old('lastname_1'), ['class' => 'form-control', 'placeholder' => '太郎']) }}
                    </div>
                </div>
                <!--ナマエ-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_2', __('messages.name_2')) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('firstname_2', old('firstname_2'), ['class' => 'form-control', 'placeholder' => 'ヤマダ']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::text('lastname_2', old('lastname_2'), ['class' => 'form-control', 'placeholder' => 'タロウ']) }}
                    </div>
                </div>
                <!--生年月日-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('birthday', __('messages.birthday')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('birthday', old('birthday'), ['class'=>'form-control datepicker'])}}
                    </div>
                    {{--<!--<div class="col-md-3">-->
                    <!--    {{ Form::selectMonth('birth_month', old('birth_month'), ['class'=>'form-control'])}}-->
                    <!--</div>-->
                    <!--<div class="col-md-3">-->
                    <!--    {{ Form::selectRange('birth_ day' , 1, 31, old('birth_day'), ['class'=>'form-control'])}}-->
                    <!--</div>-->--}}
                </div>
                <!--性別 -->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('gender', __('messages.gender')), ['class' => 'form-control'] }}
                    </div>
                    <div class="col-md-8">
                        <!--foreachの引数を強制的に配列-->
                        @foreach ($genders as $gender)
                        <!--クラスを再確認-->
                        <div class="form-group form-check form-check-inline">
                            <!--201227 訂正-->
                            {{ Form::radio('gender', $gender->type, false, ['class'=>'form-check-input','id'=>'gender-'.$gender->type])}}
                            {{ Form::label('gender-'.$gender->type, $gender->name, ['class' => 'form-check-label']) }}
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
                        {{ Form::number('experience', old('experience'), ['class' => 'form-control', 'placeholder' => '半角数字で入力']) }}
                    </div>
                    <div class="col-md-2">
                        <label>年</label>
                    </div>
                </div>
                <!--活動エリア-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('prefecture', '活動エリア') }}
                        <!--選択にするか入力にするか-->
                    </div>
                    <div class="col-md-8">
                        <!--初期値を東京にしたい-->
                        {{ Form::select('prefecture', $prefectures, null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <!--自己紹介-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('introduction', __('messages.introduction')) }}
                    </div>
                    <div class="col-md-8">
                    {{ Form::textarea('introduction', null, ['class' => 'form-control', 'rows' => '5']) }}
                    </div>
                </div>
                <!--参考動画-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('performance', __('messages.performance')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::url('performance', null, ['class' => 'form-control', 'placeholder' => 'URL']) }}
                    </div>
                </div>
                <!--登録ボタン-->
                {{ Form::submit('register', ['class' => 'btn btn-success']) }}
                @csrf
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection