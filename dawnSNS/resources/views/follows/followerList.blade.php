@extends('layouts.login')

@section('content')

<div class="follower-list">
  <div class="follower-list-title">
    <h1>Follower list</h1>
  </div>
  <div class="follower-list-image">
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

  <div class="follower-list-posts">
  @foreach($posts as $posts)
    <ul class="post-list">
      @if($posts->user->images ==null)
        <li><a href="{{ action('PostsController@followers', $posts->user->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a></li>
      @else  
      <li><a href="{{ action('PostsController@followers', $posts->user->id)}}"><img src="{{ asset('storage/'. $posts->user->images)}}" class="image-icon"/></a></li>
      @endif
    <tr>
        <td>{{$posts->user->username}}</td>
        <td>{{$posts->posts}}</td>
        <td>{{$posts->created_at}}</td>
        </tr>
    </ul>
  @endforeach  
  </div>

</div>
@endsection