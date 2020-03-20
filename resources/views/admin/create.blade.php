@extends('layouts.main')

@section('title')
    @parent Создание новости
@endsection

@section('content')
    <form action=''>
        <label>
            News name:
            <input type='text'>
        </label>
        <label>
            Short desc:
            <input type='text'>
        </label>
        <label>
            Full desc:
            <input type='text'>
        </label>
        <label>
            <input type='submit'>
        </label>
    </form>
@endsection