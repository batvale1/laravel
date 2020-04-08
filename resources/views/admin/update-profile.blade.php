@extends('layouts.main')

@section('title')
    @parent Редактирование данных профиля
@endsection

@section('content')
    <h1>User profile</h1>
    <form style="display: grid; grid-template-columns: 500px; grid-gap: 20px" action='{{ route('admin::profile::update') }}' method='post'>
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
            Current password:
            <input class="form-control" type='password' name="password" value="">
        </label>
        <label>
            New password:
            <input class="form-control" type='password' name="newPassword" value="">
        </label>
        <label>
            <input class="btn btn-success w-100" type='submit' name='submit' value="Save">
        </label>
    </form>
@endsection