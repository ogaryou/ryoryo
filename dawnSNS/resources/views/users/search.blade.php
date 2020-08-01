@extends('layouts.login')

@section('content')
<div class="search-block">
  {!!Form::open(['method' => 'get'])!!}
  <div class="search-text">
    {!! Form::text('use','',['class'=>'name-search','placeholder'=>'ユーザー名'])!!}
  </div>
  <div class="search-button">
  {!! Form::button('<i class="fas fa-search"></i>', ['class' => 'btn', 'type' => 'submit']) !!}
  </div>
  {!! Form::close() !!}
</div>
<div class="main-block">
  
    <table class="users-table">
      @foreach ($user as $user)
      <tr>
        <td><img src="{{ asset('images/'. $user->images)}}"/></td>
        <td>{{ $user->username}}</td>  
      </tr>
      @endforeach
    </table>
</div>
@endsection