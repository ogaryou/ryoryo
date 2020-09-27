@extends('layouts.login')

@section('content')

<div class="follow-list">
  <div class="follow-list-title">
    <h1>Follower list</h1>
  </div>
  <div class="follow-list-image">
  @foreach($followerlist as $followerlist)
    
    <tr class="image-list">
    @if($followerlist->images ==null)
        <td><a href="{{ action('PostsController@followers',$followerlist->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a></td>
    @else    
        <td><a href="{{ action('PostsController@followers',$followerlist->id)}}"><img src="{{ asset('storage/'. $followerlist->images)}}" class="image-icon"/></a></td>
    @endif    
    </tr>
 @endforeach
  </div>
</div>  

  <div class="posts-table">
    @foreach($posts as $posts)
  <div class="posts-box">
      <div class="posts-image">
        @if($posts->user->images ==null)
          <a href="{{ action('PostsController@followers', $posts->user->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a>
        @else  
          <a href="{{ action('PostsController@followers', $posts->user->id)}}"><img src="{{ asset('storage/'. $posts->user->images)}}" class="image-icon"/></a>
        @endif
      </div>
      <div class="tweet-box">
        <div class="date-time">
          <div class="posts-user">
            {{$posts->user->username}}
          </div>
                        
          <div class="posts-time">
            {{$posts->created_at}}
          </div>
        </div>
                        
        <div class="posts-content">
              {!! nl2br($posts->posts) !!}
        </div>
      </div>  
  </div>
    @endforeach
</div>

@endsection