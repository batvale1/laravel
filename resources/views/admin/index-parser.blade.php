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
    @parent Загрузка новостей
@endsection

@section('content')
    <form action='{{ route('admin::parser::load') }}' method='post'>
        @csrf
        <label>
            <input class="btn btn-success w-100" type='submit' name='submit' value="Load">
        </label>
    </form>
@endsection
