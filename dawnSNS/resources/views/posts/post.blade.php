@extends('layouts.login')
@section('post')
<div class="main-contents">
  <div class="post-area">
    <div class="post-user">
    @if($username->images == null)
        <img src="{{asset('storage/dawn.png')}}" class="image-icon">
        @else
        <img src="{{asset('storage/'.$username->images)}}" class="image-icon">
        @endif
    </div>
    {!! Form::open() !!}
    {{ csrf_field() }}
    <div class="post-area">
      <div class="post-field">
      
      {!! Form::textarea('newPost',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか？']) !!}
      </div>
      <div class="post-submit">
      {!! Form::button('<i class="fas fa-paper-plane"></i>', ['class' => 'btn-post', 'type' => 'submit']) !!}
      </div>
      {!! Form::close() !!}

    </div>

  </div>


<div class="text-open">
  <div class="posts-table">
    @foreach ($posts as $posts)
    <div class="posts-box">
      <div class="posts-image">
        @if($posts->user->images == null)
          <img src="{{asset('storage/dawn.png')}}" class="image-icon">
        @elseif($posts->user->images == $username->images)
          <img src="{{asset('storage/'.$username->images)}}" class="image-icon">
        @else
          <img src="{{asset('storage/'.$posts->user->images)}}" class="image-icon">
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

        @if ( Auth::id() === $posts->user_id )
          <!-- deleteModalの呼び出し引数に投稿IDを指定する -->
          <div class="label-mark">
            <label class="label"  data-id="{{ $posts->id }}" ><i class="fas fa-edit update{{$posts->id}}" data-id="{{ $posts->id }}"></i></label>
            <label class="delete" data-delete="{{ $posts->id }}"><i class="fas fa-trash-alt delete{{$posts->id}}" data-delete="{{ $posts->id}}"></i></label>

          </div>
        @endif
      </div>  
  </div>

       

        

          <div class="edit-modal editModal-{{ $posts->id }}" data-id="{{ $posts->id }}">
      <div class="modal__bg js-modal-close"></div>
        <div class="modal-content">
            {!! Form::open(['method' => 'PATCH','url' => ['top', $posts->id]]) !!}
            
            {!! Form::hidden('id', $posts->id) !!}
            {!! Form::textarea('updatePost',$posts->posts, ['class' => 'form-update']) !!}
                <div class="line-right"> 
                    {!! Form::button('<i class="fas fa-paper-plane"></i>', ['class' => 'btn-post','type' => 'submit']) !!}  
                </div>
            {!! Form::close() !!}    
        </div>
      </div>
      <div class="delete-modal deleteModal-{{ $posts->id}}" data-delete="{{$posts->id}}">
        <div class="modal__delete"></div>
        <div class="modal-delete">
          {!! Form::open(['method'=>'delete'])!!}
          {!! Form::hidden('id', $posts->id) !!}
          <p>このつぶやきを削除します。よろしいでしょうか？</p>
          <div class="modal-button">
            <div class="modal-button-left">
              {!! Form::submit('OK',['class'=>'btn btn-danger btn-sm']) !!}
            </div>
            <div class="modal-button-right">
            {!! Form::button('キャンセル', ['class' => 'btn-cancel','data-dismiss'=>"modal",])!!}
            </div>

          </div>
          {!! Form::close() !!}    
        </div>
      </div>

      
    @endforeach

</div>
  </div>
</div>  
@endsection