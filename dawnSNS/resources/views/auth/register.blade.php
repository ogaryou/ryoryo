@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="form-layout">
  <div class="form-h2">
    <h2>新規ユーザー登録</h2>
  </div>
  <div class="form-error">
    @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach  
    </ul>
    @endif
  </div>

  <div class="form-box">
    <div class="form-name">
      {{ Form::label('ユーザー名') }}
    </div>
    <div class="form-contents">
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>

    <div class="form-name">
      {{ Form::label('メールアドレス') }}
    </div>
    <div class="form-contents">
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="form-name">
      {{ Form::label('パスワード') }}
    </div>
    <div class="form-contents">
      {{ Form::text('password',null,['class' => 'input']) }}
    </div>


    <div class="form-name">
      {{ Form::label('パスワード確認') }}
    </div>
    <div class="form-contents">
      {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    </div>



    {{ Form::submit('登録') }}
  </div>


  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>


@endsection
