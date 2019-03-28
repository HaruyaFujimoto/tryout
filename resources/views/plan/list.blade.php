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
<div class="items">
    @forelse ( $plans as $plan )
    
    <div class="item">
        <a href="{{ route('plan.show', $plan) }}">
        <div>
            <h2>{{ $plan->name }}</h2>
            {{--
            <p>{{ str_limit($plan->object, $limit = 150, $end = '...') }}</p>
            --}}
            <p>{{ $plan->object }}</p>
            <ul class="skills">
            @forelse ($plan->skills as $skill)
                <li class="skill">{{ $skill->name }}</li>
            @empty
                <li>スキルの登録なし</li>
            @endforelse
            </ul>
        </div>
        </a>
    </div>
    
    @empty
    <p>企画はまだありません</p>
    @endforelse
</div>
<div class="paginate">
{{ $plans->links() }}
</div>
@endsection
