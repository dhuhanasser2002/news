@extends('layouts.app')

@section('title', 'التصنيفات')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm mb-5">Create Category</a>
    </div>
    <div class="container">
        <h1 class="my-4">التصنيفات</h1>
        <div class="row">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">العنوان</th>
                        <th scope="col">الحدث</th>
                    </tr>
                </thead>
                @forelse ($categories as $category)
                <tbody>
                    <tr>
                        <td class=" align-items-center">{{ $category->name }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to block this user?')">حذف</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @empty
                <h2>لا يوجد تصنيفات</h2>
                @endforelse
            </table>
        </div>
    </div>
@endsection