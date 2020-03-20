@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('content')
    <h1>Admin panel</h1>
    <a href="{{ route('admin::news::create') }}">Create a single news</a>
@endsection