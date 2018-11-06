<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('translate.register') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts._head')
</head>
<body>
    <div class="container-fluid register">
        <!-- Default form register -->
        {!! Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'text-center border border-light p-5']) !!}
            <p class="h4 mb-4">{{ __('translate.register') }}</p>
            {!! Form::text('name', null, ['class' => 'form-control username', 'id' => 'defaultRegisterFormFirstName', 'placeholder' => __('translate.username')]) !!}
            @if ($errors->has('name'))
                <p class="help-block validated" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </p>
            @endif
            <!-- E-mail -->
            {!! Form::email('email', null, ['class' => 'form-control mt-4 email', 'id' => 'defaultRegisterFormEmail', 'placeholder' => 'E-mail']) !!}
            @if ($errors->has('email'))
                <p class="help-block validated" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </p>
            @endif
            <!-- Password -->
            {!! Form::password('password', ['class' => 'form-control mt-4 password', 'id' => 'defaultRegisterFormPassword', 'aria-describedby' => 'defaultRegisterFormPasswordHelpBlock', 'placeholder' => __('translate.password')]) !!}
            @if ($errors->has('password'))
                <p class="help-block validated" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </p>
            @endif
            {!! Form::password('password_confirmation', ['class' => 'form-control mt-4 password-confirm', 'id' => 'defaultRegisterFormConfirmPassword', 'aria-describedby' => 'defaultRegisterFormPasswordHelpBlock', 'placeholder' => __('translate.confirm_password')]) !!}
            <!-- Sign up button -->
            {!! Form::button(__('translate.register'), ['type' => 'submit', 'class' => 'btn btn-info my-4 btn-block register']) !!}
            <!-- Register -->
            <p>{{ __('translate.haven') }}
                <a href="{{ route('login') }}">{{ __('translate.login') }}</a>
            </p>
            <!-- Social register -->
            <p>{{ __('translate.register_social') }}</p>
            <a class="light-blue-text mx-2" href="{{ route('social.oauth', 'facebook') }}">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="light-blue-text mx-2" href="{{ route('social.oauth', 'twitter') }}">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="light-blue-text mx-2" href="{{ route('social.oauth', 'google') }}">
                <i class="fab fa-google"></i>
            </a>
            <a class="light-blue-text mx-2" href="{{ route('social.oauth', 'github') }}">
                <i class="fab fa-github"></i>
            </a>
        {!! Form::close() !!}
        <!-- Default form register -->
    </div>
    @include('layouts._script')
</body>
</html>
