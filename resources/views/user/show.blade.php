@extends('templates.base')
@section('title', 'User 詳細画面')
{{-- css --}}
@section('css')
@if (app('env') == 'production' || app('env') == 'test')
    <link rel="stylesheet" href="{{ secure_asset('/css/detail.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('/css/detail.css') }}">
@endif
@endsection

{{-- main --}}
@section('main')
<div class="wrapper-half">
    <div class="userName">
    {{ $user->name }}
    </div>
    <div class="user">
        <div class="userPlans">
            <h2>投稿した企画</h2>
            <ol>
                @forelse( $user->plans as $plan )
                <li><a href="{{ route('plan.show', $plan) }}">{{ $plan->name }}</a></li>
                @empty
                <p>投稿した企画はありません</p>
                @endforelse
            </ol>
        </div>
        <div class="userLikes">
            <h2>興味のある企画</h2>
            <ol>
                @forelse( $user->liked_plans as $plan)
                <li><a href="{{ route('plan.show', $plan) }}">{{ $plan->name }}</a></li>
                @empty
                <p>お気に入りの企画はまだありません</p>
                @endforelse
            </ol>
        </div>
    </div>
    <div class="userDelete">
    <form action="{{ route('user.destroy', $user) }}" method="post">
        {{ csrf_field()}}
        {{ method_field('delete') }}
        <input type="submit" value="ユーザーデータを全削除する" class="button delete">
    </form>
    </div>
    <p class="link-to-list"><a href="{{ route('plan.index') }}">リストへ</a></p>
</div>
@endsection