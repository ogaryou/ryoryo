@extends('layouts.login')

@section('content')
<div class="search-block">
  {!!Form::open(['method' => 'get'])!!}
  <div class="search-text">
    {!! Form::text('use','',['class'=>'name-search','placeholder'=>'ユーザー名'])!!}
    {!! Form::button('<i class="fas fa-search"></i>', ['class' => 'btn-serch', 'type' => 'submit']) !!}
  </div>
  {!! Form::close() !!}
</div>
<div class="main-block">
    <table class="users-table">
      @foreach ($user as $user)
      <tr>
        @if($user->images == null)
        <td class="mainlogo"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></td>
        @elseif($user->images == $username->images)
        <td><img src="{{asset('storage/'.$username->images)}}" class="image-icon"></td>
        @else($user->images)
        <td><img src="{{asset('storage/'.$user->images)}}" class="image-icon"></td>
        @endif
        <td class="username">{{ $user->username}}</td>  
        <td class="follow-bottom">@include('users.follow_button',['user'=>$user])</td>
        
      </tr>
      @endforeach
    </table>
</div>
@endsection