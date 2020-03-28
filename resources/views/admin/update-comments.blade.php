@extends('layouts.main')

@section('title')
    @parent Изменение новости
@endsection

@section('content')
    <form action='{{ route('admin::comments::update', $item->id) }}' method='post'>
        @csrf
        <label>
            User text:
            <input type='text' name="user_text" value="{{ $item->user_text }}">
        </label>
        <label>
            News id:
            <input type='number' name="news_id" value="{{ $item->news_id }}">
        </label>
        <label for="">
            @if($item->active == 0)
                <input type="checkbox" name="active" value="1">
            @else
                <input type="checkbox" checked name="active" value="1">
            @endif
        </label>
        <label>
            <input type='submit' name='submit'>
        </label>
    </form>
@endsection