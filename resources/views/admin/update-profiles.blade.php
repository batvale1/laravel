@extends('layouts.main')

@section('title')
    @parent Изменение профиля пользователя
@endsection

@section('content')
    <h1>Изменение профиля пользователя с id {{ $user->id }}</h1>
    <form action='{{ route('admin::profiles::update', $user->id) }}' method='post'>
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger" style="color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label>
            Name:
            <input class="form-control" type='text' name="name" value="{{ $user->name ?? old('name') }}">
        </label>

        <label>
            Email:
            <input class="form-control" type='email' name="email" value="{{ $user->email ?? old('email') }}">
        </label>
        <label>
            New password:
            <input class="form-control" type='password' name="newPassword" value="">
        </label>
        <label>
            Админ:
            @if($user->is_admin == 0)
                <input type="checkbox" name="is_admin" value="1">
            @else
                <input type="checkbox" checked name="is_admin" value="1">
            @endif
        </label>
        <label>
            <input class="btn btn-success w-100" type='submit' name='submit' value="Save">
        </label>
    </form>
@endsection