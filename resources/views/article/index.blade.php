@extends('layouts.app')

@section('title', 'المقالات')

@section('content')
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
                @foreach($articles as $key => $article)
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
                        <div id="carouselExampleIndicators{{$key}}" class="carousel slide">
                            <div class="carousel-indicators">
                                @foreach($article->images as $index => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators{{$key}}" data-bs-slide-to="{{$index}}" class="{{$index == 0 ? 'active' : ''}}" aria-current="{{$index == 0 ? 'true' : ''}}" aria-label="Slide {{$index + 1}}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($article->images as $index => $image)
                                <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                                    <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$key}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$key}}" data-bs-slide="next">
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
    <!-- Repeat similar changes for other sections like sports, health, art, and web -->
    @foreach(['sport', 'healthe', 'art', 'web'] as $section)
        <section id="{{ $section }}" class="contentSections">
            <div class="container">
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <h2 class="mb-4 text-center"><span>أخبار {{ $section }}</span></h2>
                    @php $sectionVar = ${$section.'s'}; @endphp
                    @if($sectionVar)
                    @foreach($sectionVar as $key => $item)
                    <div class="articlecontainer">
                        <h1>{{$item->title}}</h1>
                        <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{$item->created_at}}</small></p>
                        <div class="container mb-3" style="text-align: center;">
                            <img class="image" src="{{asset('/images/'. $item->feture_img)}}" alt="">
                        </div>
                        <div id="content" class="content">
                            <p>{{$item->content}}</p>
                            <div id="carouselExampleIndicators{{$section}}{{$key}}" class="carousel slide">
                                <div class="carousel-indicators">
                                    @foreach($item->images as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators{{$section}}{{$key}}" data-bs-slide-to="{{$index}}" class="{{$index == 0 ? 'active' : ''}}" aria-current="{{$index == 0 ? 'true' : ''}}" aria-label="Slide {{$index + 1}}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach($item->images as $index => $image)
                                    <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                                        <img src="{{asset('/images/'. $image->image)}}" class="d-block w-100" alt="...">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$section}}{{$key}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$section}}{{$key}}" data-bs-slide="next">
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
    @endforeach
    
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
    
@endsection
