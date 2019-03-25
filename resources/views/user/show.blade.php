@extends('templates.base'))
@section('css')
{{-- css --}}
@section('css')
@if (app('env') == 'production' || app('env') == 'test')
    <link rel="stylesheet" href="{{ secure_asset('/css/detail.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('/css/detail.css') }}">
@endif
@endsection
{{-- main --}}
@section('title', 'User 詳細画面')
@section('main')
<div class="user">
<div class="userName">
{{ $user->name }}
</div>
<div class="userPlans">
    <h2>投稿した企画</h2>
    <ul>
    @forelse( $user->plans as $plan )
    <li><a href="{{ route('plan.show', $plan) }}">{{ $plan->name }}</a></li>
    @empty
    <li>投稿した企画はありません<li>
    @endforelse
    </ul>
</div>
<div class="userLikes">
    <h2>興味のある企画</h2>
    <ul>
    <li>未実装</li>
    </ul>
</div>
<div class="userDelete">
<form action="{{ route('user.destroy', $user) }}" method="post">
    {{ csrf_field()}}
    {{ method_field('delete') }}
    <input type="submit" value="ユーザーデータを全削除する">
</form>
</div>
</div>
@endsection