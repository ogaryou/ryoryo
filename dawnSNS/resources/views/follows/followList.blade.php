@extends('layouts.login')

@section('content')
<div class="follow-list">
  <div class="follow-list-title">
    <h1>Follow list</h1>
  </div>
  <div class="follow-list-image">
@foreach($following as $following)
    <tr>
        <td><img src="{{ asset('images/'. $following->images)}}" class="image-icon"/></td>
    </tr>
 @endforeach
  </div>

</div>

@endsection