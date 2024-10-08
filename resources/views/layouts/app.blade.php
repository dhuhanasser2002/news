<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> @yield('title','الجديد')</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top " style="border-bottom: 2px solid blue;">
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
                            <li><a class="dropdown-item" href="#last" target="_self">الأحدث</a></li>
                            <li><a class="dropdown-item" href="#sport" target="_self">الرياضة</a></li>
                            <li><a class="dropdown-item" href="#healthe" target="_self">الصحة</a></li>
                            <li><a class="dropdown-item" href="#art" target="_self">الفن</a></li>
                            <li><a class="dropdown-item" href="#web" target="_self"> الويب </a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">تواصل معنا </a>
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
                            <button type="submit" class="btn btn-link nav-link" >تسجل الخروج</button>
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
                    <button type="submit" class="btn btn-outline-primary">ابحث</button>
                </form>
            </div>
        </div>
    </nav>
   <main>
    <div style="position: relative; top: 40px;">
        @yield('content')
        </div>
   </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('/js/script.js')}}"></script>
</body>
</html>