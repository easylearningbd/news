@extends('master')
@section('sidebar')
  @parent
  <p> This About Sidebar</p>
@endsection

@section('component')
 <h1>About Us Page </h1>
 @php

  $name = 'Ariyan';
  echo $name;
  @endphp


@endsection