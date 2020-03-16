@extends('layouts.main')

@section('title')
    @parent Категория: {{ $params['title'] }}
@endsection

@section('content')

    <h1>{{ $params['title'] }}</h1>

    @forelse($params['items'] as $key => $value)
        <h2><a href="{{ route('news::newsCard', ['id' => $value['id']]) }}">{{ $value['title'] }}</a></h2>
    @empty
        <h2>Nothing to show</h2>
    @endforelse

@endsection
