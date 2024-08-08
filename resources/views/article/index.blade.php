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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
        }

        .articlecontainer {
            max-width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f4f4f4;
        }

        .articlecontainer h1 {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }

        .articlecontainer .content {
            position: relative;
            overflow: hidden;
            max-height: 100px;
            transition: max-height 0.2s ease-out;
        }

        .articlecontainer .content.expanded {
            max-height: 1000px;
        }

        .articlecontainer .content::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(to top, white, transparent);
        }

        .articlecontainer .show-more {
            display: block;
            text-align: center;
            margin: 10px 0;
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
        }

        .articlecontainer .image {
            max-width: 40%;
            
            border-radius: 8px;
        }
    </style>
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
                    <button type="button" class="btn btn-outline-primary">ابحث</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- start landing -->
    <div class="landing">
        <div class="over-lay" style="width: 100%;"><img src="{{asset('/images/background.jpg')}}" alt="" height="100%" width="100%"></div>
        <div class="text">
            <div class="content">
                <h2>اهلاً بكم ! <br /> نحن الجديد , ننقل إليكم الأخبار المنوعة </h2>
                <p>يقدم موقع الوكالة الإلكتروني الخدمات الإعلامية الرياضية والصحية والمنوعة ، إضافة إلى خدمات الصور، ويعد هذا الموقع من المواقع الإعلامية الرائدة في سورية، حيث يعمل عليه كادر متخصص من الصحفيين والفنيين يتابعون أعمال التحرير والنشر وإدارة الموقع على مدار الساعة.</p>
            </div>
        </div>
    </div>
    @if($dailys)
    <div class="news-container">
        <div class="news">
            @foreach($dailys as $daily)
            <img src="{{asset('/images/LOGO.jpeg')}}" style=" width:40px ; border-radius: 50%;">
            <span>{{$daily->dailycontent}}</span>
            @endforeach
        </div>
    </div>
    @endif
    @if(auth()->check())
    <div class="container mt-4">
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm mb-5">انشاء مقال</a>
    </div>
    @endif
    <section id="last" class="contentSections">
        <div class="container">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <h2 class="mb-4 text-center"><span>أحدث الأخبار</span></h2>
                @if($articles)
                @foreach($articles as $article)
                <div class="articlecontainer">
                @if(auth()->check())
                <div class="event" style="width:100%; justify-content:left; display:flex; gap:10px;">
                    <a href="{{route('articles.edit', $article->id)}}"><i class="fa-solid fa-pen-to-square" style="color:#007bff;"></i></a>
                    <form action="{{route('articles.destroy', $article->id)}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="" style="border: none; color:#007bff;" onclick="return confirm('Are you sure you want to delete this article?')"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                </div>
                @endif
                    <h1>{{$article->title}}</h1>
                    <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$article->created_at}}</small></p>
                    <div class="container mb-3" style="text-align: center;">
                        <img class="image" src="{{asset('/images/'. $article->feture_img)}}" alt="">
                    </div>
                    <div id="content" class="content">
                        <p>{{$article->content}}</p>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($article->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <span id="showMore" class="show-more">عرض المزيد</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="sport" class="contentSections">
        <div class="container">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <h2 class="mb-4 text-center"><span> أخبار الرياضة</span></h2>
                @if($sports)
                @foreach($sports as $sport)
                <div class="articlecontainer">
                    <h1>{{$sport->title}}</h1>
                    <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$sport->created_at}}</small></p>
                    <div class="container mb-3" style="text-align: center;">
                        <img class="image" src="{{asset('/images/'. $sport->feture_img)}}" alt="">
                    </div>
                    <div id="content" class="content">
                        <p>{{$sport->content}}</p>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($sport->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <span id="showMore" class="show-more">عرض المزيد</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="health" class="contentSections">
        <div class="container">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <h2 class="mb-4 text-center"><span>أخبار الصحة</span></h2>
                @if($healthes)
                @foreach($healthes as $health)
                <div class="articlecontainer">
                    <h1>{{$health->title}}</h1>
                    <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$health->created_at}}</small></p>
                    <div class="container mb-3" style="text-align: center;">
                        <img class="image" src="{{asset('/images/'. $health->feture_img)}}" alt="">
                    </div>
                    <div id="content" class="content">
                        <p>{{$health->content}}</p>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($health->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <span id="showMore" class="show-more">عرض المزيد</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="art" class="contentSections">
        <div class="container">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <h2 class="mb-4 text-center"><span>أخبار الفن </span></h2>
                @if($arts)
                @foreach($arts as $art)
                <div class="articlecontainer">
                    <h1>{{$art->title}}</h1>
                    <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$art->created_at}}</small></p>
                    <div class="container mb-3" style="text-align: center;">
                        <img class="image" src="{{asset('/images/'. $art->feture_img)}}" alt="">
                    </div>
                    <div id="content" class="content">
                        <p>{{$art->content}}</p>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($art->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <span id="showMore" class="show-more">عرض المزيد</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="web" class="contentSections">
        <div class="container">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <h2 class="mb-4 text-center"><span> أخبار الويب</span></h2>
                @if($webs)
                @foreach($webs as $web)
                <div class="articlecontainer">
                    <h1>{{$web->title}}</h1>
                    <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$web->created_at}}</small></p>
                    <div class="container mb-3" style="text-align: center;">
                        <img class="image" src="{{asset('/images/'. $web->feture_img)}}" alt="">
                    </div>
                    <div id="content" class="content">
                        <p>{{$web->content}}</p>
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($web->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <span id="showMore" class="show-more">عرض المزيد</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="row">
            <div class="col">
                <h3>الجديد</h3>
                <p>يقدم موقع الوكالة الإلكتروني الخدمات الإعلامية الرياضية والصحية والمنوعة ، إضافة إلى خدمات الصور، ويعد هذا الموقع من المواقع الإعلامية الرائدة في سورية، حيث يعمل عليه كادر متخصص من الصحفيين والفنيين يتابعون أعمال التحرير والنشر وإدارة الموقع على مدار الساعة</p>
            </div>
            <div class="col">
                <h3>تواصل معنا <div class="underline"><span></span></div>
                </h3>
                <p> موقعنا : G75Q+QFQ، فوزي اللحام، دمشق، سوريا
                    <br>
                    فيسبوك : https://www.facebook.com/الجديد/
                    <br>
                    البريدالإلكتروني : <span class="email-id">a********@gmail.com</span>
                    <br>
                    الهاتف المحول : **********
            </div>
            <div class="col">
                <img src="images/LOGO.jpeg" class="logo">
            </div>
            <div class="col">

                <div class="social-icons">
                    <i class="fab fa-facebook-f"></i>
                    <br>
                    <i class="fab fa-twitter"></i>
                    <br>
                    <i class="fab fa-whatsapp"></i>
                    <br>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright &copy; 2024 <a href="index.html">الجديد</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.querySelectorAll('.show-more').forEach(function(button) {
            button.addEventListener('click', function() {
                var content = this.previousElementSibling;
                if (content.classList.contains('expanded')) {
                    content.classList.remove('expanded');
                    this.textContent = 'عرض المزيد';
                } else {
                    content.classList.add('expanded');
                    this.textContent = 'عرض أقل';
                }
            });
        });
    </script>
</body>
</html>