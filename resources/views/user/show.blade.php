@extends('templates.base')
@section('title', 'User 詳細画面')
@section('main')
{{ $user->name }}
<h2>投稿した企画</h2>
<ul>
@forelse( $user->plans as $plan )
<li><a href="{{ route('plan.show', $plan) }}">{{ $plan->name }}</a></li>
@empty
<li>投稿した企画はありません<li>
@endforelse
</ul>
<h2>興味のある企画</h2>
<ul>
<li>未実装<li>
</ul>
@endsection
