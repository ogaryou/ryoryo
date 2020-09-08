@extends('layouts.login')

@section('content')
<div class="follow-list">
  <div class="follow-list-title">
    <h1>Follow list</h1>
  </div>
  <div class="follow-list-image">
@foreach($following as $following)
    <tr class="image-list">
    @if($username->images ==null)
        <td><a href="{{ action('PostsController@follows', $following->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a></td>
    @else 
        <td><a href="{{ action('PostsController@follows', $following->id)}}"><img src="{{ asset('storage/'.$following->images)}}" class="image-icon"/></a></td>
    @endif      
    </tr>
 @endforeach
  </div>

  <div class="follow-list-posts">
    @foreach($posts as $posts)
    <ul class="post-list">
    <li><a href="{{ action('PostsController@follows', $posts->user->id)}}"><img src="{{ asset('storage/'.$posts->user->images)}}" class="image-icon"/></a></li>
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