@extends('pages.auth.register.skeleton')

@section('action', route('user.auth.register.update'))
@section('email', old('email', $user->email))
@section('name', old('name', $user->name))
