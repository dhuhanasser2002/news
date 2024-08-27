@extends('layouts.app')

@section('title', 'انشاء صنف')

@section('content')
    <div class="container mt-5">
    <form action="{{ route('categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="cattitle">الصنف:</label>
                <input type="text" class="form-control mt-3" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">انشاء صنف</button>
        </form>
    </div>
@endsection