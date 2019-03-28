@extends('templates.base')
@section('title', 'user')
@section('main')
<div class="wrapper-half aboutPage">
<h2>ログイン・ユーザー情報について</h2>
<p>
このウェブアプリケーションでは Twitter 連携によるログインを使用しています。<br>
Twitter のアカウントからこのアプリケーションへ、<br>
<ol>
<li>「Twitter 表示名」</li><li>「Twitter ニックネーム」</li><li>「Twitter user_id」</li><li>「アイコン画像のURL」</li>
</ol>
が取得・保存されます。<br>
識別のみに利用され、統計などのデータ利用には一切使用しません。
</p>
<p>
ログイン済みであれば、このウェブアプリケーション上から<br>
これらの<span style="color:red;">ユーザー情報の削除</span>をいつでも行うことができます。
</p>
<p class="link-to-list"><a href="{{ route('plan.index') }}">リストへ</a></p>
<div>
@endsection
