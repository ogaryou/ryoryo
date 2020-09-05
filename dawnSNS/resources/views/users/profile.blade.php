
@extends('layouts.login')

@section('content')
<div class="user-profile-page">
  <div class="user-profile">
    <div class="users-profile-image">
      <img src="{{asset('images/'. $username->images)}}" class="image-icon"/>
    </div>
    <div class="users-profile-update">
      {!! Form::open(['url' => '/post/update']) !!}
      {!! Form::hidden('id', $username->id) !!}
      <tr>
        <th>{{ Form::label('UserName') }}</th>
        <td>{!! Form::text('username', $username->username,['class' => 'username-update']) !!}</td>
      </tr>
        <th>{{ Form::label('メールアドレス') }}</th>
        <td>{!! Form::text('mail', $username->mail,['class' =>'mail-update']) !!}</td>
      </tr>
      <tr>
        <th>{{ Form::label('パスワード') }}</th>
        <td> <input id="password" type="password" class='password-old' name="password"  value="{{$username->password}}" required autofocus  readonly></td>
      </tr>
      <tr>
        <th>{{ Form::label('new Password') }}</th>
        <td>{{ Form::password('newpassword',['class' =>'newpassword'])}}</td>
      </tr>
      <tr>
        <th>{{ Form::label('Bio') }}</th>
        <td>{!! Form::textarea('Bio',null, ['required', 'class' => 'formBio']) !!}</td>
      </tr>
      <tr>
        <th>{{ Form::label('Icon Image') }}</th>
        <td>{{Form::file('thefile', ['class' => 'file-field'])}}</td>
      </tr>
      <button type="submit" class="btn btn-primary pull-right">更新</button>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection