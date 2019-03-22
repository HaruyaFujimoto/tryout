@extends('templates.base')
@section('title', 'Plan Post')

@section('main')


<h1>企画投稿</h1>
<form action="{{ route('plan.store') }}" method="post">
{{ csrf_field() }}
<label>企画名</br>
    <input type="text" name="name" value="{{ old('name') }}"></br>
    @if ( $errors->has('name') )
        <ul>
        @foreach ( $errors->get('name') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label>目的・動機</br>
    <textarea name="object">{{ old('object') }}</textarea></br>
    @if ( $errors->has('object') )
        <ul>
        @foreach ( $errors->get('object') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<label>企画詳細</br>
    <textarea name="description">{{ old('description') }}</textarea></br>
    @if ( $errors->has('description') )
        <ul>
        @foreach ( $errors->get('description') as $error )
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</label>
<input type="submit" value="送信" tabindex="0">
</form>
<a href="{{ route('plan.index') }}">リストへ</a>
@endsection
