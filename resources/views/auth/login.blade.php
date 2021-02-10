@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-center">
        <form class="form-signin pb-3" method="POST" action="{{ route('login') }}" style="width:300px;">
            @csrf

            <h1 class="h3 mb-3 text-center font-weight-normal">Zaloguj się</h1>
            <input type="email" name="email" id="email" class="form-control rounded-0 @error('email') is-invalid @enderror"
                   placeholder="Adres email" required="" autofocus="">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <input type="password" name="password" id="password" class="form-control rounded-0 @error('password') is-invalid @enderror"
                   placeholder="Hasło" required="">

            <div class="checkbox m-3 align">
                <label>
                    <input name="remember" type="checkbox" value="remember-me"  {{ old('remember') ? 'checked' : '' }}> Zapamiętaj mnie
                </label>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror

            <button class="mt-2 btn btn-lg btn-primary btn-block rounded-0" type="submit">Zaloguj sie</button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>

@endsection
