@extends('layouts.app')

@section('title', 'انشاء خبر يومي')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('daily.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="cattitle">محتوى الخبر</label>
                <input type="text" class="form-control mt-3" name="dailycontent" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">انشاء الخبر</button>
        </form>
    </div>
@endsection