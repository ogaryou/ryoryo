@extends('layouts.login')

@section('content')
<div class="followuser">
  <div class="followuser-profile">
    <div class="followuser-profile-image">
      <img src="{{ asset('images/'. $user->images)}}" class="image-icon"/>
    </div>
    <div class="followuser-profile-table">
      <tr>
        <h2>Name</h2>
        <td>
          {{$user->username}}
        </td>
      </tr>
      <tr>
        <h3>Bio</h3>
        <td>
          {{$user->bio}}
        </td>
      </tr>
      <tr>
        <td>
        @if(Auth::check())
          @if (Auth::id() != $user->id)
              @if (Auth::user()->is_following($user->id))
                  {!! Form::open(['route' => ['unfollow', $user->id], 'method' => 'delete']) !!}
                      {!! Form::submit('フォロー解除', ['class' => "button btn btn-danger mt-1"]) !!}
                  {!! Form::close() !!}
              @else
                  {!! Form::open(['route' => ['follow', $user->id]]) !!}
                      {!! Form::submit('フォローする', ['class' => "button btn btn-primary mt-1"]) !!}
                  {!! Form::close() !!}
              @endif
          @endif
        @endif
        </td>
      </tr>
    </div>
  </div>
  <div class="users-timeline">
  @foreach($users as $users)
    <div class="users-image"><img src="{{ asset('images/'. $user->images)}}" class="image-icon"/></div>
    <div class="users-posts">
      <tr>
        <td>{{$user->username}}</td>
        <td>{{$users->posts}}</td>
        <td>{{$users->created_at}}</td>
      </tr>
    </div>
    @endforeach
  </div>
</div>

@endsection