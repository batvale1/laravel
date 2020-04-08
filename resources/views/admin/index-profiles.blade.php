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
    @parent Админка профилей пользователя
@endsection

@section('content')
    <h1>Изменение профилей пользователей</h1>
    @forelse($users as $item)
        <h2>{{ $item->name }}</h2>
        <a class="btn" style="text-decoration: none; font-size: 30px; background-color: darkgreen; color: white; padding: 10px" href="{{ route('admin::profiles::update', $item->id) }}">Изменить</a>
    @empty
        <h2>Nothing to show</h2>
    @endforelse
    {{ $users->links() }}
@endsection
