@extends('layouts.main')

@section('title')
    @parent Создание новости
@endsection

@section('content')
    <form action='{{ route('admin::news::create') }}' method='post'>
        @csrf
        <label>
            Short desc:
            <input type='text' name="short_desc">
        </label>
        <label>
            Full desc:
            <input type='text' name="full_desc">
        </label>
        <label>
            Category id:
            <input type='number' name="cat_id">
        </label>
        <label for="">
            <input type="checkbox" name="active" value="1">
        </label>
        <label>
            <input type='submit' name='submit'>
        </label>
    </form>
@endsection