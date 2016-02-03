@extends('masterpage')

@section('title')
    ลงทะเบียน
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    ลงทะเบียน
@endsection

@section('content')
  @if(isset($debug))
    {{ $debug }}
  @endif
@endsection

@section('css')
@endsection

@section('js')
@endsection
