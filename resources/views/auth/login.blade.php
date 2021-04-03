@extends('layouts.app')

@section('content')
<div class="loginPage container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="card-header">{{ __('messages.login') }}</div>

                <div class="card-body">
                    {{ Form::open(['route' => 'login']) }}
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                {{ Form::label('email', __('messages.E-mail Adress')) }}
                            </div>

                            <div class="col-md-6">
                                {{--<!--もしエラーがなければ$errors->has('email')はnullを返す-->--}}
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                {{ Form::label('password', __('messages.password')) }}
                            </div>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" autofocus>
                                {{--<!--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">-->--}}
                                
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{ Form::checkbox('remember', old('remember') ? 'checked' : '', false, ['class' => 'form-check-input', 'id' => 'remember'] ) }}
                                    {{--<!--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->--}}
                                    {{ Form::label('remember', __('messages.Remember Me'), ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{ Form::submit(__('messages.login'), ['class' => 'btn btn-primary']) }}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
