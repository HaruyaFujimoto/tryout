@extends('templates.base')
@section('title', 'Plan detail')
@section('main')
<h2>企画名</h2>
<h3>{{ $plan->name }}</h3>
<h2>目的・動機</h2>
<p>{{ $plan->object }}</p>
<h2>企画詳細</h2>
<p>{{ $plan->description }}</p>
<a href="{{ route('plan.edit', $plan) }}">編集</a>
<form action="{{ route('plan.destroy', $plan) }}" method="post">
{{ csrf_field()}}
{{ method_field('delete') }}
<input type="submit" value="削除する">
</form>
<a href="{{ route('plan.index') }}">リストへ</a>
@endsection
