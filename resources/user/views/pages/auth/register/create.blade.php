@extends('pages.auth.register.skeleton')

@section('action', route('user.auth.register.store'))
@section('email', old('email'))
@section('name', old('name'))
