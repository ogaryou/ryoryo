@extends('layouts.login')

@section('content')
<div class="follow-list">
  <div class="follow-list-title">
    <h1>Follow list</h1>
  </div>
  <div class="follow-list-image">
@foreach($following as $following)
    <tr class="image-list">
    @if($following->images ==null)
        <td><a href="{{ action('PostsController@follows', $following->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a></td>
    @else 
        <td><a href="{{ action('PostsController@follows', $following->id)}}"><img src="{{ asset('storage/'.$following->images)}}" class="image-icon"/></a></td>
    @endif      
    </tr>
 @endforeach
  </div>
</div>  

<div class="posts-table">
    @foreach($posts as $posts)
  <div class="posts-box">
      <div class="posts-image">
        @if($posts->user->images == null)
          <a href="{{ action('PostsController@follows', $posts->user->id)}}"><img src="{{asset('storage/dawn.png')}}" class="image-icon"/></a>
        @else
          <a href="{{ action('PostsController@follows', $posts->user->id)}}"><img src="{{ asset('storage/'.$posts->user->images)}}" class="image-icon"/></a>
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