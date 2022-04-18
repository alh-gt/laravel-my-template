@extends('layouts.app')

@section('base-content')

<form action="@yield('action')" method="post">
    @csrf
    <div>
        <div>メールアドレス</div>
        <input type="text" name="email" value="@yield('email')">
        @error('email')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <div>なまえ</div>
        <input type="text" name="name" value="@yield('name')">
        @error('name')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <div>パスワード</div>
        <input type="password" name="password" value="{{ old('password') }}">
        @error('password')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <div>パスワード再確認</div>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    @error('fail')
        <div>
            {{ $message }}
        </div>
    @enderror
    <button type="submit">送信</button>
</form>

@endsection
