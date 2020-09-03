@extends('layouts.login')

@section('content')

<div class="follower-list">
  <div class="follower-list-title">
    <h1>Follower list</h1>
  </div>
  <div class="follower-list-image">
  @foreach($followerlist as $followerlist)
    <tr class="image-list">
        <td><a href="{{ action('PostsController@followers',$followerlist->id)}}"><img src="{{ asset('images/'. $followerlist->images)}}" class="image-icon"/></a></td>
    </tr>
 @endforeach
  </div>

  <div class="follower-list-posts">
  @foreach($posts as $posts)
    <ul class="post-list">
    <li><a href="{{ action('PostsController@followers', $posts->user->id)}}"><img src="{{ asset('images/'. $followerlist->images)}}" class="image-icon"/></a></li>
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