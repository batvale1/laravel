@extends('layouts.main')

@section('title')
    @parent Новость: {{$item['title']}}
@endsection

@section('content')
    <h1>{{$item['title']}}</h1>
    <p>{{$item['shortDesc']}}</p>
    <p>{{$item['fullDesc']}}</p>
@endsection
