@extends('templates.base')
@section('title', 'user')
@section('main')
<div class="aboutPage">
<h2>ログイン・ユーザー情報について</h2>
<p>
このウェブアプリケーションでは Twitter 連携によるログインを使用しています。<br>
Twitter のアカウントからこのアプリケーションへ、<br>
<ol>
<li>「Twitter 表示名」</li><li>「Twitter ニックネーム」</li><li>「Twitter user_id」</li><li>「アイコン画像のURL」</li>
</ol>
が取得・保存されます。<br>
</p>
<p>
ログイン済みであれば、このウェブアプリケーション上から<br>
これらの<span style="color:red;">ユーザー情報の削除</span>をいつでも行うことができます。
</p>
<div>
@endsection
