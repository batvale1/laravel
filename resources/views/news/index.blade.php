@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('content')
    <ul class="news-categories">
        @foreach ($catNews as $key => $value)
            <li class="news-categories__item"><a class="news-categories__item-link" href="{{ route('news::CategoriesList', ['id' => $key]) }}">{{ $value['title'] }}</a></li>
        @endforeach
    </ul>
@endsection
