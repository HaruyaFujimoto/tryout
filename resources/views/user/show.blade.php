@extends('template.base.html')
@section('title', 'user')

@seciton('main')
{{ $user->name }}
@endsection
