@extends('templates.base')
@section('title', 'This is List of Plan')
@section('main')
<a href="{{ route('plan.create') }} ">POST</a>
<ul>
@foreach ( $plans as $plan )
    <li><a href="{{ route('plan.show', $plan) }}">{{ $plan->name }}</a></li>
@endforeach
@endsection
