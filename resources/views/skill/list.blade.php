@extends('templates.base')
@section('title', 'Skill List')

@section('main')
<a href="{{ route('skill.create') }}">Skill を作成</a>
<ul>
@forelse($skills as $skill)
    <li>{{ $skill->name }}</li>
@empty
    <li>レコードがありません。</li>
@endforelse
</ul>
@endsection