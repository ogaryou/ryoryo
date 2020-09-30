@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="register-box">
      <div class="register-name">
        <p>{{$username->username}}さん、</p>
        <p>ようこそ！DAWNSNSへ！</p>
      </div>
      <div class="register-text">
        <p>ユーザー登録が完了しました。</p>
        <p>さっそく、ログインをしてみましょう。</p>
        
      </div>
      <div class="register-btn">
        <p class="btn-register"><a href="/login">ログイン画面へ</a></p>
      </div>
      

  </div>

</div>

@endsection