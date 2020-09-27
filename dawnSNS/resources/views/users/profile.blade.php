
@extends('layouts.login')

@section('content')
<div class="user-profile-page">
  <div class="user-profile">
    <div class="update-image">
      <div class="users-profile-image">
        @if($username->images== null)
        <img src="{{asset('storage/dawn.png')}}" class="image-icon"/>
        @else
        <img src="{{ asset('storage/'.$username->images)}}" class="image-icon"/>
        @endif
      </div>
    </div>


    <div class="users-profile-update">
    @if($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach  
      </ul>
    @endif
      {!! Form::open(['method'=>'post','files'=> true,"enctype"=>"multipart/form-data"])!!}
      {!! Form::hidden('id', $username->id) !!}
      <div class="update-form">
      <ul>
          <li>
            <div class="users-update-name">
                {{ Form::label('UserName') }}
            </div>
            <div class="users-update-contents">
                {!! Form::text('username', $username->username,['class' => 'username-update']) !!}
            </div>
          </li>
        </ul>
      </div>  
      <div class="update-form">
        <ul>
          <li>
            <div class="users-update-name">
            {{ Form::label('メールアドレス') }}
            </div>
            <div class="users-update-contents">
              {!! Form::text('mail', $username->mail,['class' =>'mail-update']) !!}
            </div>
          </li>
        </ul>
      </div>
      <div class="update-form">
        <ul>
          <li>
            <div class="users-update-name">
            {{ Form::label('パスワード') }}
            </div>
            <div class="users-update-contents">
            <input id="password" type="password" class='password-old' name="password"  value="{{$username->password}}"readonly>
            </div>
          </li>
        </ul>
      </div>
      <div class="update-form">
        <ul>
          <li>
            <div class="users-update-name">
            {{ Form::label('new Password') }}
            </div>
            <div class="users-update-contents">
              {{ Form::password('newpassword',['class' =>'newpassword'])}}
            </div>
          </li>
        </ul>
      </div>
      <div class="update-form">
        <ul>
          <li>
            <div class="users-update-name">
            {{ Form::label('Bio') }}
            </div>
            <div class="users-update-contents">
              {!! Form::textarea('bio',$username->bio, ['class' => 'formBio']) !!}
            </div>
          </li>
        </ul>

      </div>
      <div class="update-form">
        <ul>
          <li>
            <div class="users-update-name">
            {{ Form::label('Icon Image') }}
            </div>
            <div class="users-update-contents">
              <label for="filename">
                <div  class="update-image-label">
                  <span class="browse_btn">
                    ファイルを選択
                  </span>
                </div>
                {{Form::file('images', ['class' => 'file-field','id' => 'filename'])}}
              </label>
            </div>
          </li>
        </ul>

      </div>

      <div class="btn-update">
        <button type="submit" class="btn btn-primary pull-right">更新</button>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection