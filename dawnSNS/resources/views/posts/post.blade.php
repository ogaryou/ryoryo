@extends('layouts.login')
@section('post')
<div class="main-contents">
  <div class="post-area">
    <div class="post-user">
      <img src="{{asset('images/dawn.png')}}" class="image-icon"/>
    </div>
    {!! Form::open(['url' => '/top']) !!}
    {{ csrf_field() }}
    <div class="post-field">
    
    {!! Form::textarea('newPost',null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか？']) !!}
    </div>
    <div class="post-submit">
    {!! Form::button('<i class="fas fa-paper-plane"></i>', ['class' => 'btn-post', 'type' => 'submit']) !!}
    </div>
    
  </div>
  <div class="text-open">
    <table class="posts-table">
      @foreach ($posts as $posts)
      <tr>
        <td><img src="{{ asset('images/'. $username->images)}}" class="image-icon"/></td>
        <td>{{$posts->user->username}}</td>
        <td>{{$posts->posts}}</td>
        <td>{{$posts->created_at}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>  
@endsection