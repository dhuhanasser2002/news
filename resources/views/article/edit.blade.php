@extends('layouts.app')

@section('title', 'تعديل المقال')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">تعديل مقال</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group mt-3">
                    <label for="title">عنوان المقال:</label>
                    <input type="text" class="form-control" name="title" value="{{ $article->title }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="content">محتوى المقال:</label>
                    <textarea class="form-control" name="content" required>{{  $article->content}}</textarea>
                </div>
                <div class="form-group mt-3">
                    <h5>Categories:</h5>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="image">الصورة الرئيسية:</label>
                    <input type="file" class="form-control-file" name="feture_img">
                </div>
                <div class="form-group mt-3">
                    <label for="image">صور أخرى:</label>
                    <input type="file" class="form-control-file" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary mt-3">تعديل المقال </button>
            </form>
        </div>
    </div>
</div>
@endsection