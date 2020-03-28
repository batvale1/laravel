@extends('layouts.main')

@section('title')
    @parent Категория: {{ $category->short_desc }}
@endsection

@section('content')

    <h1>Категория: {{ $category->short_desc }}</h1>

    @forelse($category->news as $item)
        <h2><a href="{{ route('news::newsCard', $item->id) }}">{{ $item->short_desc }}</a></h2>
    @empty
        <h2>Nothing to show</h2>
    @endforelse

@endsection
