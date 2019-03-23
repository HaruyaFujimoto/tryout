@extends('templates.base')
@section('title', 'This is List of Plan')
{{-- css --}}
@section('css')
@if (app('env') == 'production' || app('env') == 'test')
    <link rel="stylesheet" href="{{ secure_asset('/css/list.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('/css/list.css') }}">
@endif
@endsection
{{-- main --}}
@section('main')

<a href="{{ route('plan.create') }} ">企画を投稿する</a>

<ul class="items">
@forelse ( $plans as $plan )
    <li>
        <a href="{{ route('plan.show', $plan) }}"class="item">
        
            <h2>{{ $plan->name }}</h2>
            {{ str_limit($plan->object, $limit = 150, $end = '...') }}
        
        </a>
    </li>
@empty
<li>企画はまだありません</li>
@endforelse
</ul>
@endsection
