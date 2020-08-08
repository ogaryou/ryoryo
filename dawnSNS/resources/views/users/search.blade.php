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
        @if(auth()->user()->isFollowing($user->id))
          {!!Form::open(['action' => 'UsersController@unfollow',['id' => $user->id], 'method' => 'post'])!!}
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <td>{{Form::button('フォロー解除', ['class' => 'btn'])}}</td>
          {!! Form::close() !!}
        @else
          {!!Form::open(['action'=> 'UsersController@follow',['id' => $user->id], 'method' => 'post'])!!}
          {{ csrf_field() }}
          <td>{Form::button('フォローする', ['class' => 'btn-primary'])}</td>
          {!! Form::close() !!}
        @endif  
      </tr>
      @endforeach
    </table>
</div>
@endsection