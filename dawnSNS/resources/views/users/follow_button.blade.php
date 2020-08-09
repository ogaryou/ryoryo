@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if (Auth::user()->is_following($user->id))
        
            {!! Form::open(['action' => ['UsersController@followers', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('フォロー解除', ['class' => "button btn btn-danger mt-1"]) !!}
            {!! Form::close() !!}
            
        @else
        
            {!! Form::open(['action' => ['UsersController@followings', $user->id]]) !!}
                {!! Form::submit('フォロー', ['class' => "button btn btn-primary mt-1"]) !!}
            {!! Form::close() !!}
            
        @endif
    
    @endif

@endif