@extends('layouts.main')

@section('title')
    @parent Регистрация
@endsection

@section('content')
    <form action=''>
        <label>
            Login
            <input type='text'>
        </label>
        <label>
            Password
            <input type='password'>
        </label>
        <label>
            Save?
            <input type='checkbox'>
        </label>
        <label>
            <input type='submit'>
        </label>
    </form>
@endsection
