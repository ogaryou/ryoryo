@extends('layouts.login')
@section('post')
<div class="main-contents">
  <div class="post-area">
    <div class="post-user">
      <img src="{{asset('images/dawn.png')}}" class="image-icon"/>
    </div>
    {!! Form::open(['url' => '/top']) !!}
    <div class="post-field">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか？']) !!}
    </div>
    <div class="post-submit">
    {!! Form::button('<i class="fas fa-paper-plane"></i>', ['class' => 'btn-post', 'type' => 'submit']) !!}
    </div>
    
  </div>
  <div class="text-open">
    <table class="posts-table"></table>
  </div>
</div>  
@endsection