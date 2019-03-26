@extends('templates.base')
@section('css')
{{-- css --}}
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
@else
@isset ($user)
<div class="like-button">
    <button id="isLiked">「お気に入り」済み ♥</button>
    <button id="isUnliked">「お気に入り」に保存する</button>
    {{-- script --}}
    <script>
    window.onload = function () {
        let isLiked_button = document.getElementById('isLiked');
        let isUnliked_button = document.getElementById('isUnliked');
        if ("{{ $isLiked }}" === '') {
            isLiked_button.setAttribute('style', 'display: none');
            isLiked_button.setAttribute('disabled', 'disabled');
        } else {
            isUnliked_button.setAttribute('style', 'display: none');
            isUnliked_button.setAttribute('disabled', 'disabled');
        }
        let url = "{{ route('plan.like', $plan) }}";
        let token = document.getElementsByName('csrf-token').item(0).content;
        let myXml = new XMLHttpRequest();

        // 登録ぼたん
        isUnliked_button.addEventListener('click', function() {
            isUnliked_button.setAttribute('disabled', 'disabled');
            
            console.log('clicked');
            console.log(url);
            
            myXml.onreadystatechange = function() {
                if (myXml.readyState === 4) {
                    if (myXml.status == 200) {
                        //通信成功時
                        console.log(myXml.responseText)
                        isUnliked_button.setAttribute('style', 'display: none');
                        isLiked_button.removeAttribute('style');
                        isLiked_button.removeAttribute('disabled');
                    } else {
                        //通信失敗時
                        alert("登録が失敗しました、ページのリロードをお願いします。")
                    }
                }
            }
            myXml.onload = function(){
                //通信完了時
            }
            myXml.open("POST", url, true);
            myXml.setRequestHeader('X-CSRF-Token', token);
            myXml.send("");
        });

        // 登録解除ぼたん
        isLiked_button.addEventListener('click', function() {
            isLiked_button.setAttribute('disabled', 'disabled');
            
            console.log('clicked');
            console.log(url);
            
            myXml.onreadystatechange = function() {
                if (myXml.readyState === 4) {
                    if (myXml.status == 200) {
                        //通信成功時
                        console.log(myXml.responseText)
                        isLiked_button.setAttribute('style', 'display: none');
                        isUnliked_button.removeAttribute('style');
                        isUnliked_button.removeAttribute('disabled');
                    } else {
                        //通信失敗時
                        alert("登録が失敗しました、ページのリロードをお願いします。")
                    }
                }
            }
            myXml.onload = function(){
                //通信完了時
            }
            myXml.open("POST", url, true);
            myXml.setRequestHeader('X-CSRF-Token', token);
            myXml.send("");
        });
    }
    </script>
@endisset
@endif
<p class="to-list"><a href="{{ route('plan.index') }}">リストへ</a></p>
</div>
@endsection
