<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>الجديد</title>
    <!-- render all elements normally -->
    <link rel="stylesheet" href="{{asset('css/normlize.css')}}">
    <!-- font awesome library -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- main template css file -->
    <link rel="stylesheet" href="{{asset('/css/الجديد.css')}}">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- including bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-bottom: 2px solid blue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('articles.index')}}"><img src="{{asset('/images/LOGO.jpeg')}}" style=" width:60px ; border-radius: 50%;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            التصنيفات
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="last" target="_self">عاجل</a></li>
                            <li><a class="dropdown-item" href="#last" target="_self">الأحدث</a></li>
                            <li><a class="dropdown-item" href="#sport" target="_self">الرياضة</a></li>
                            <li><a class="dropdown-item" href="#health" target="_self">الصحة</a></li>
                            <li><a class="dropdown-item" href="#art" target="_self">الفن</a></li>
                            <li><a class="dropdown-item" href="#web" target="_self"> الويب </a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">تواصل معنا </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">حول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('articles.index')}}">مقالات</a>
                    </li>
                    @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">تصنيفات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('daily.index')}}">اخبار يومية</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">تسجل الخروج</button>
                        </form>
                    </li>
                    @endif
                    @if(!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">تسجيل دخول</a>
                    </li>
                    @endif
                </ul>
                <form class="d-flex" role="search" action="{{route('articles.search')}}">
                    <input class="form-control me-2" type="search" placeholder="Search" name="query" aria-label="Search">
                    <button type="button" class="btn btn-outline-primary">ابحث</button>
                </form>
            </div>
        </div>
    </nav>


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
</body>

</html>