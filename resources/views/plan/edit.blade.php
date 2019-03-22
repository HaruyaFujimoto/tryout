@extends('templates.base')
@section('title', '')
@section('main')
<h1>企画投稿</h1>
<form action="{{ route('plan.update', $plan) }}" method="post">
{{ method_field('put') }}
{{ csrf_field() }}
<label>企画名</br>
    @if ( old('name') )
    <input type="text" name="name" value="{{ old('name') }}"></br>
    @else
    <input type="text" name="name" value="{{ $plan->name }}"></br> 
    @endif
    @if ( $errors->has('name') )
        <ul>
        @foreach ( $errors->get('name') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label>目的・動機</br>
    @if ( old('object') )
    <textarea name="object">{{ old('object') }}</textarea></br>
    @else
    <textarea name="object">{{ $plan->object }}</textarea></br>
    @endif
    @if ( $errors->has('object') )
        <ul>
        @foreach ( $errors->get('object') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label>企画詳細</br>
    @if ( old('description') )
    <textarea name="description">{{ old('description') }}</textarea></br>
    @else
    <textarea name="description">{{ $plan->description }}</textarea></br>
    @endif
    @if ( $errors->has('description') )
        <ul>
        @foreach ( $errors->get('description') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<input type="submit" name="send" value="送信">
</form>
<a href="{{ route('plan.index') }}">リストへ</a>
@endsection