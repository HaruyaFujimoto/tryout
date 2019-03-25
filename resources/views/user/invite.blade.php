@extends('templates.base')
@section('title', 'user')
@section('main')
<h2>ログイン・ユーザー情報について</h2>
<p>
このウェブアプリケーションではでは Twitter 連携によるログインを行っています。<br>
Twitter からこのアプリケーションへ、<br>
<ul>
<li>「Twitter 表示名」</li><li>「Twitter ニックネーム」</li><li>「Twitter user_id」</li><li>「アイコン画像のURL」</li>
</ul>
が取得・保存されます。<br>
</p>
<p>
ログイン済みであれば、いつでもサーバー上からユーザー情報の削除を行うことができます。
</p>
@endsection
