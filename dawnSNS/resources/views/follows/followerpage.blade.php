@extends('layouts.login')

@section('content')
<div class="followuser">
  <div class="followtable">
    <div class="followuser-profile">
      <div class="followuser-profile-image">
        @if($user->images ==null)
        <img src="{{asset('storage/dawn.png')}}" class="image-icon"/>
        @else
        <img src="{{ asset('storage/'.$user->images)}}" class="image-icon"/>
        @endif
      </div>
      <div class="followuser-profile-table">
        <div class="follow-profile">
          <div class="follow-user-table">
            <div class="username2">Name</div>
            <div class="folloe-userprofile-name">
              {{$user->username}}
            </div>
          </div>
          <div class="follow-user-table">
            <h3>Bio</h3>
            <div class="folloe-userprofile-name" id="bio">
              {{$user->bio}}
            </div>
          </div>
        </div>

          <div class="follow-button">
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
          </div>
      </div>
    </div>
  </div>
  <div class="posts-table">
    @foreach($users as $users)
    <div class="posts-box">
      <div class="posts-image">
        @if($user->images ==null)
        <img src="{{asset('storage/dawn.png')}}" class="image-icon"/>
        @else
        <img src="{{ asset('storage/'.$user->images)}}" class="image-icon"/>
        @endif
      </div>
      <div class="tweet-box">
        <div class="date-time">
          <div class="posts-user">
            {{$user->username}}
          </div>  
          <div class="posts-time">
            {{$users->created_at}}
          </div>
        </div>  
        <div class="posts-content">
          {!! nl2br($users->posts) !!}
        </div>
      </div>
    </div>  
    @endforeach
  </div>  

</div>


@endsection