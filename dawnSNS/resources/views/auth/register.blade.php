@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="form-layout">
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
    <div class="form-inline">
        <div class="form-h2">
        <h2>新規ユーザー登録</h2>
      </div>

      <div class="form-name">
        {{ Form::label('ユーザー名',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::text('username',null,['class' => 'input']) }}
      </div>

      <div class="form-name">
        {{ Form::label('メールアドレス',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::text('mail',null,['class' => 'input']) }}
      </div>
      <div class="form-name">
        {{ Form::label('パスワード',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::password('password',['class' => 'input']) }}
      </div>


      <div class="form-name">
        {{ Form::label('パスワード確認',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::password('password_confirmation',['class' => 'input']) }}
    


      <div class="form-contents">
      {{ Form::submit('登録',['class'=> 'register-submit']) }}
      </div>

      <p><a href="/login" class="register-link">ログイン画面へ戻る</a></p>
    </div>  
  </div>


  

  {!! Form::close() !!}
</div>


@endsection
