@extends('layouts.main')

@section('title')
    @parent Новость: {{ $item->short_desc }}
@endsection

@section('content')
    {{--<h1>{{$item['title']}}</h1>
    <p>{{$item['shortDesc']}}</p>
    <p>{{$item['fullDesc']}}</p>--}}
    <h1>Категория {{ $item->category->short_desc }}</h1>
    <p>{{ $item->short_desc }}</p>
    <p>{!! $item->full_desc !!}</p>
@endsection
