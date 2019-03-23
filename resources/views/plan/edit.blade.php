@extends('templates.base')
@section('title', 'Plan Edit')
{{-- css --}}
@section('css')
@if (app('env') == 'production' || app('env') == 'test')
    <link rel="stylesheet" href="{{ secure_asset('/css/post.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('/css/post.css') }}">
@endif
@endsection
{{-- main --}}
@section('main')
<div class="post-form">
<h1>企画内容変更</h1>
<form action="{{ route('plan.update', $plan) }}" method="post">
{{ method_field('put') }}
{{ csrf_field() }}
<label><h2>企画名</h2></br>
    @if ( old('name') )
    <input type="text" name="name" value="{{ old('name') }}"></br>
    @else
    <input type="text" name="name" value="{{ $plan->name }}"></br> 
    @endif
    @if ( $errors->has('name') )
        <ul class="errors">
        @foreach ( $errors->get('name') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label><h2>目的・動機</h2></br>
    @if ( old('object') )
    <textarea name="object">{{ old('object') }}</textarea></br>
    @else
    <textarea name="object">{{ $plan->object }}</textarea></br>
    @endif
    @if ( $errors->has('object') )
        <ul class="errors">
        @foreach ( $errors->get('object') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label><h2>企画詳細</h2></br>
    @if ( old('description') )
    <textarea name="description">{{ old('description') }}</textarea></br>
    @else
    <textarea name="description">{{ $plan->description }}</textarea></br>
    @endif
    @if ( $errors->has('description') )
        <ul class="errors">
        @foreach ( $errors->get('description') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<input type="submit" name="send" value="送信">
</form>
<a href="{{ route('plan.index') }}">リストへ</a>
</div>
@endsection