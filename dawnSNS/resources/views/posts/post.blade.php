@extends('layouts.login')
@section('post')
<div class="main-contents">
  <div class="post-area">
    <div class="post-user">
    @if($username->images == null)
        <img src="{{asset('storage/dawn.png')}}" class="image-icon">
        @else
        <img src="{{asset('storage/'.$username->images)}}" class="image-icon">
        @endif
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
        @if($posts->user->images == null)
        <td><img src="{{asset('storage/dawn.png')}}" class="image-icon"></td>
        @elseif($posts->user->images == $username->images)
        <td><img src="{{asset('storage/'.$username->images)}}" class="image-icon"></td>
        @else
        <td><img src="{{asset('storage/'.$posts->user->images)}}" class="image-icon"></td>
        @endif
        <td>{{$posts->user->username}}</td>
        <td>{{$posts->posts}}</td>
        <td>{{$posts->created_at}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>  
@endsection