@extends('layouts.main')

@section('title')
    @parent Создание новости
@endsection

@section('content')
    <form style="display: grid; grid-template-columns: 500px; grid-gap: 20px" action='{{ route('admin::news::save') }}' method='post'>
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
            Short desc:
            <input type='text' name="short_desc" value="{{ $model->short_desc ?? old('short_desc') }}">
        </label>
        <label>
            Full desc:
            <textarea type='text' id="full-desc" name="full_desc">{{ $model->full_desc ?? old('full_desc') }}</textarea>
        </label>
        <label>
            Category id:
            <input type='number' name="cat_id" value="{{ $model->cat_id ?? old('cat_id') }}">
        </label>
        <label for="">
            <input type="checkbox" name="active" value="1">
        </label>
        <label>
            <input type='submit' name='submit'>
        </label>
    </form>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('full-desc', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        } );
    </script>
@endsection