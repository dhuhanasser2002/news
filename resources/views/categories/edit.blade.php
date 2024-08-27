@extends('layouts.app')

@section('title', 'تعديل الصنف')

@section('content')
<div class="container mt-5">
    <form action="{{ route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mt-3">
            <label for="cattitle">اسم الصنف</label>
            <input type="text" class="form-control mt-3" name="name" value="{{  $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">تعديل الصنف</button>
    </form>
</div>
@endsection