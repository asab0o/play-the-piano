@extends('layouts.welcome')

@section('content')
<div class="container-fluid">
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
                                <!--required autofocusどこにいれるか-->
                                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => "form-control $errors->has('email') ? ' is-invalid' : ''"]) }}
                                {{--<!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->--}}
                                {{--<!--もしエラーがなければ$errors->has('email')はnullを返す-->--}}
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                {{ Form::label('password', __('messages.password')) }}
                            </div>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
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
                                {{ Form::submit(__('messages.login'), ['class' => 'btn btn-secondary']) }}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
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
