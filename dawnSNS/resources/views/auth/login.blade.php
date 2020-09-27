@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="form-layout">
  <div class="form-box">
    <div class="form-inline2">
      <div class="form-h2">
        <p class="dawn-name">DAWNSNSへようこそ</p>
      </div>
      <div class="form-name">
        {{ Form::label('e-mail',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::text('mail',null,['class' => 'input']) }}
      </div>
      <div class="form-name">
        {{ Form::label('password',null,['class' =>'name']) }}
      </div>
      <div class="form-contents">
        {{ Form::password('password',['class' => 'input']) }}
      </div>
      <div class="form-contents">
        {{ Form::submit('ログイン',['class'=> 'register-submit']) }}
      </div>  

        <p class="register-link2"><a href="/" class="register-link">新規ユーザーの方はこちら</a></p>
      </div>  
  </div>  

    {!! Form::close() !!}
</div>
@endsection
