@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('content')
    <h1>Категории новостей</h1>
    <ul class="news-categories">
        @foreach ($catNews as $item)
            <li class="news-categories__item"><a class="news-categories__item-link" href="{{ route('news::CategoriesList', $item->id) }}">{{ $item->short_desc }}</a></li>
        @endforeach
    </ul>
    {{ $catNews->links() }}
@endsection
