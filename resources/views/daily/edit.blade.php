@extends('layouts.app')

@section('title', 'تعديل الخبر اليومي')

@section('content')
<div class="container mt-5">
    <form action="{{ route('daily.update', $dailay->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mt-3">
            <label for="cattitle">المحتوى</label>
            <input type="text" class="form-control mt-3" name="dailycontent" value="{{ $dailay->dailycontent}}"
                required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">تعديل المحتوى</button>
    </form>
</div>
@endsection