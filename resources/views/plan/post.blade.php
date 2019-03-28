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
<div class="wrapper-half post">
<h1>企画投稿</h1>
<form action="{{ route('plan.store') }}" method="post">
    {{ csrf_field() }}
    <label><h2>企画名</h2>
        <input type="text" name="name" value="{{ old('name', '') }}">
        @if ( $errors->has('name') )
            <ul class="errors">
            @foreach ( $errors->get('name') as $error )
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </label>
    <hr>
    <label><h2>目的・動機</h2>
        <textarea name="object">{{ old('object', '') }}</textarea>
        @if ( $errors->has('object') )
            <ul class="errors">
            @foreach ( $errors->get('object') as $error )
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </label>
    <hr>
    <label><h2>企画詳細</h2>
        <textarea name="description">{{ old('description', '') }}</textarea>
        @if ( $errors->has('description') )
            <ul class="errors">
            @foreach ( $errors->get('description') as $error )
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </label>
    <h2>スキル</h2>
    <ul>
        @php
        $skill_ids = [];
        if (old('skills') != null) {
            $skill_ids = array_map('intval', old('skills'));
        }
        @endphp
        @foreach ($skills as $skill)
        <li><label>
            <input type="checkbox" name="skills[]" value="{{ $skill->id }}" {{ in_array($skill->id, $skill_ids, true)? 'checked="checked"' : '' }}>
            {{ $skill->name }}
        </label></li>
        @endforeach
    </ul>
    <input type="submit" value="送信" class="button">
</form>
<p class="link-to-list"><a href="{{ route('plan.index') }}">リストへ</a></p>
</div>
@endsection
