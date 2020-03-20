@extends('layouts.main')

@section('title')
    @parent Напишите нам
@endsection('title')

@section('content')
    <form action="{{route('contactUs')}}" method="post">
        @csrf
        @if(@isset($messageHasBeenSent))
            <h2>Message has been sent</h2>
        @endif
        <label>
            Your name:
            <input type="text" name="user-name">
        </label>
        <label>
            Your message
            <textarea name="user-message" id="" cols="30" rows="10" placeholder="your message..."></textarea>
        </label>
        <label>
            Send
            <input type="submit">
        </label>
    </form>
@endsection
