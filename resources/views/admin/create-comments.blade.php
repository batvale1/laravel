@extends('layouts.main')

@section('title')
    @parent Создание комментария
@endsection

@section('content')
    <form action='{{ route('admin::comments::create') }}' method='post'>
        @csrf
        <label>
            Short desc:
            <input type='text' name="short_desc">
        </label>
        <label>
            Full desc:
            <input type='text' name="full_desc">
        </label>
        <label for="">
            <input type="checkbox" name="active" value="1">
        </label>
        <label>
            <input type='submit' name='submit'>
        </label>
    </form>
@endsection