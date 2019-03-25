@extends('templates.base')
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
@section('title', 'Plan detail')
@section('main')
<div class="detail">
企画名<h2>『{{ $plan->name }}』</h2>
<h3>目的・動機</h3>
<p>{{ $plan->object }}</p>
<h3>企画詳細</h3>
<p>{{ $plan->description }}</p>
<h3>スキル</h3>
<ul class="skills">
@forelse ($plan->skills as $skill)
<li>{{ $skill->name }}</li>
@empty
<li>登録なし</li>
@endforelse
</ul>
@if ($user == $plan->user)
<div class="to-edit">
    <a href="{{ route('plan.edit', $plan) }}"><button>編集する</button></a>
    <form action="{{ route('plan.destroy', $plan) }}" method="post">
        {{ csrf_field()}}
        {{ method_field('delete') }}
        <input type="submit" value="削除する">
    </form>
</div>
@endif
<p class="to-list"><a href="{{ route('plan.index') }}">リストへ</a></p>
</div>
@endsection
