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
        <td class="mainlogo"><img src="{{ asset('images/'. $user->images)}}" class="image-icon"/></td>
        <td class="username">{{ $user->username}}</td>  
        <td class="follow-bottom">@include('users.follow_button',['user'=>$user])</td>
      </tr>
      @endforeach
    </table>
</div>
@endsection