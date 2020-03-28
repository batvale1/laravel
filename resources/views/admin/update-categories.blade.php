@extends('layouts.main')

@section('title')
    @parent Изменение новости
@endsection

@section('content')
    <form action='{{ route('admin::categories::update', $item->id) }}' method='post'>
        @csrf
        <label>
            Short desc:
            <input type='text' name="short_desc" value="{{ $item->short_desc }}">
        </label>
        <label>
            Full desc:
            <input type='text' name="full_desc" value="{{ $item->full_desc }}">
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