{{--@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('content')
    <h1>Admin panel</h1>
    <a href="{{ route('admin::news::create') }}">Create a single news</a>
@endsection--}}

@extends('layouts.main')

@section('title')
    @parent Админка категорий
@endsection

@section('content')
    <a style="text-decoration: none; font-size: 40px; background-color: navy; color: white; padding: 10px" href="{{ route('admin::news::create') }}">Создать</a>

    @forelse($categories as $item)
        <h2>{{ $item->short_desc }}</h2>
        <a class="btn" style="text-decoration: none; font-size: 30px; background-color: darkgreen; color: white; padding: 10px" href="{{ route('admin::categories::update', $item->id) }}">Изменить</a>
        <a class="btn" style="text-decoration: none; font-size: 30px; background-color: darkred; color: white; padding: 10px" href="{{ route('admin::categories::delete', $item->id) }}">Удалить</a>
    @empty
        <h2>Nothing to show</h2>
    @endforelse
    {{ $categories->links() }}
@endsection
