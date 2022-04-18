@extends('layouts.app')

@section('base-content')

<form action="{{ route('user.auth.login') }}" method="post">
    @csrf
    <div>
        <input type="text" name="email" value="{{ old('email') }}" >
        @error('email')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <input type="password" name="password" value="{{ old('password') }}">
        @error('password')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    @error('login_fail')
        <div>
            {{ $message }}
        </div>
    @enderror
    <div>
        <input type="checkbox" name="remember" value="1" {{ old('remember', false) ? 'checked' : '' }} id="remember">
        <label for="remember">ログイン状態を記録する</label>
    </div>
    <button type="submit">ログイン</button>
</form>

@endsection
