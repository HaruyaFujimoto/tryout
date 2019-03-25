@extends('templates.base')
@section('title', 'Skill Post')

@section('main')
<form action="{{ route('skill.store') }}" method="post">
@csrf
@for ($i=0; $i<10; $i++)
<input type="text" name="name{{ $i }}">
@endfor
<input type="submit" value="send">
</form>
<a href="{{ route('skill.index') }}">Skill 一覧へ</a>
@endsection