@extends('templates.base.html')
@section('title', 'user')
@section('main')
{{ $user->name }}
@endsection
