@extends('layouts.app')

@section('title', 'الاخبار اليومية')

@section('content')
    <div class="container">
        <a href="{{ route('daily.create') }}" class="btn btn-primary btn-sm mt-5">انشاء خبر</a>
    </div>
    <div class="container">
        <h1 class="my-4">اخبار يومية</h1>
        <div class="row">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">المحتوى</th>
                        <th scope="col">الحدث</th>
                    </tr>
                </thead>
                @forelse ($dailays as $dailay)
                <tbody>
                    <tr>
                        <td class=" align-items-center">{{ $dailay->dailycontent }}</td>
                        <td><a href="{{ route('daily.edit', $dailay->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <form action="{{ route('daily.destroy', $dailay->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this daily?')">حذف</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @empty
                <h2>لا يوجد محتوى</h2>
                @endforelse
            </table>
        </div>
    </div>
@endsection