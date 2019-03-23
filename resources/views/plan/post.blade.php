@extends('templates.base')
@section('title', 'Plan Post')
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
<h1>企画投稿</h1>
<form action="{{ route('plan.store') }}" method="post">
{{ csrf_field() }}
<label><h2>企画名</h2></br>
    @if ( old('name') )
        @php
        $value = old('name');
        @endphp
    @else
        @php
        $value = '';
        @endphp
    @endif
    <input type="text" name="name" value="{{ $value }}"></br> 
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
        @php
        $value = old('object');
        @endphp
    @else
        @php
        $value = '';
        @endphp
    @endif
    <textarea name="object">{{ $value }}</textarea></br>
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
        @php
        $value = old('description');
        @endphp
    @else
        @php
        $value = '';
        @endphp
    @endif
    <textarea name="description">{{ $value }}</textarea></br>
    @if ( $errors->has('description') )
        <ul class="errors">
        @foreach ( $errors->get('description') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<input type="submit" value="送信">
</form>
<a href="{{ route('plan.index') }}">リストへ</a>
</div>
@endsection
