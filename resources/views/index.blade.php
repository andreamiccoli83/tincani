@include('partials.header')

<section class="evidence">
    <div class="content">
        <div class="column-news">
            <div class="content-evidence-news">
                <div class="evidence-img">
                    <a href="{{route('news-detail', ['id' => $evidence->id, 'title' => Str::slug($evidence->title)])}}">
                    {{$evidence->getFirstMedia('cover')}}
                    </a>
                </div>
                <div class="content-evidence-subtitle">
                    <p>{{$evidence->category->category}}</p>
                    <p>/</p>
                    <p>{{$evidence->getDateFormattedAttribute('published_at')}}</p>
                </div>
                <div class="content-evidence-title">
                    <div class="evidence-title">
                        <a href="{{route('news-detail', ['id' => $evidence->id, 'title' => Str::slug($evidence->title)])}}">
                            <p>{{$evidence->title}}</p>
                        </a>
                    </div>
                    <div class="evidence-social">
                        @if ($evidence->social_id !== '1' && $evidence->link !== null)
                            <a href="{{$evidence->link}}">{{$evidence->social->getFirstMedia('icona')}}</a>
                        @endif
                    </div>
                </div>
                <div class="content-evidence-body">
                    <p>{!! $evidence->short_body !!}</p>
                </div>
                <div class="link-news">
                    <div class="content-link">
                        <a href="{{route('news-detail', ['id' => $evidence->id, 'title' => Str::slug($evidence->title)])}}">
                            <div class="leggi">
                                <p>{{__("application.index.news.leggi.single")}}</p>
                                <div class="image-arrow"><img src="{{asset("images/red_right.png")}}"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column-sidebar">
            <div class="content-evidence-sidebar">
                <div class="content-social">
                    <p class="title-social">SEGUIMI</p>
                    <div class="social">
                        <!-- Facebook -->
                        <div class="content-button" style="background-color: #3b5998;">
                            <a class="btn text-white" href="https://www.facebook.com/edoardo.tincani.10" role="button">
                                <div class="box-icon">
                                    <i class="fab fa-facebook-f"></i>
                                    <p>Facebook</p>
                                    {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        5
                                        <span class="visually-hidden">unread messages</span>
                                    </span>     --}}
                                </div>
                            </a>
                        </div>
                        <div class="content-button" style="background-color: #833AB4;">
                            <a class="btn text-white" href="https://www.instagram.com/edoardo_tincani" role="button">
                                <div class="box-icon">
                                    <i class="fab fa-instagram me-2"></i>
                                    <p>Instagram</p>
                                   {{--  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        10
                                        <span class="visually-hidden">unread messages</span>
                                    </span>   --}}  
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="social">
                        <div class="content-button" style="background-color: #55acee;">
                            <a class="btn text-white"" href="https://twitter.com/Edoardo_Tincani" role="button">
                                <div class="box-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                      </svg>
                                    <p>Twitter</p>
                                   {{--  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        3
                                        <span class="visually-hidden">unread messages</span>
                                    </span> --}}
                                </div>
                            </a>
                        </div>
                        <div class="content-button" style="background-color: #FF0000;">
                            <a class="btn text-white" href="https://www.youtube.com/channel/UCz0CcgvVNHBg4dXpaiy39Pw" role="button">
                                <div class="box-icon">
                                    <i class="fab fa-youtube me-2"></i>
                                    <p>Youtube</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="social">
                        <div class="content-button" style="background-color: #0082ca;">
                            <a class="btn text-white" href="https://it.linkedin.com/in/edoardo-tincani-67040b72" role="button">
                                <div class="box-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                    <p>LinkedIn</p>
                                </div>
                            </a>
                        </div>
                        <div class="content-button" style="background-color: #1DB954;">
                            <a class="btn text-white" href="https://open.spotify.com/intl-it/artist/76cMAkIwyKyBUx8GbW3qXF?si=Z3xCbx2vTLaQQ5I_c27Htg" role="button">
                                <div class="box-icon">
                                    <i class="fab fa-spotify me-2"></i>
                                    <p>Spotify</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-musica">
                    <div class="title">
                        <p class="section-title">CANZONI</p>
                    </div>
                    <div class="content-swiper-music swiper tincani">
                        <div class="swiper-music swiper-wrapper">
                            @foreach ($singles as $single)
                            <div class="content-swiper swiper-slide">
                                <a href="{{route('single-detail', ['id' => $single->id, 'title' => Str::slug($single->title)])}}"><img class="lozad" data-src="{{$single->getMedia('singolo')[0]->getUrl('thumb')}}" src=""></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
</section>
<section class="posts">
    <div class="content">
        <p class="section-title">NEWS</p>
        <hr class="hr-title">
        <div class="content-news">
            @foreach($news as $d)
                <div class="single-news index">
                    <div class="news-img">
                        <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                            <img class="lozad" data-src="{{$d->getFirstMediaUrl('cover', 'thumb')}}" src="">
                        </a>
                    </div>
                    <div class="news-text-box">
                        <div class="data-news">
                            <p class="text-data">{{$d->getDateFormattedAttribute('published_at')}} </p>
                            <div class="social">
                                @if ($d->social_id !== '1' && $d->link !== null)
                                    <a target="_blank" href="{{ $d->link }}">{{$d->social->getFirstMedia('icona')}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="title-news">

                            <h2 class="text-title"><a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">{{$d->title}}</a></h2>
                           
                        </div>
                        <div class="text-news p-2">
                            {{--<p class="text-news-paragraph"></p>--}}
                            {!! $d->short_body !!}
                        </div>
                        <div class="link-news">
                            <div class="content-link">
                                <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                    <div class="leggi">
                                        <p>{{__("application.index.news.leggi.single")}}</p>
                                        <div class="image-arrow"><img src="{{asset("images/red_right.png")}}"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="content-link-news-all">
            <a href="{{route('news')}}">
                <div class="link-all-news">
                    <p>{{__("application.index.news.leggi.all")}}</p>
                    <p><i class="fas fa-chevron-right"></i></p>
                </div>
            </a>
        </div> --}}
    </div>
</section>
<section class="content-events-book">
    <div class="content">
        <div class="events-book">
            <div class="posts column50">
                <p class="section-title">EVENTS</p>
                <hr class="hr-title">
                <div class="content-news">
                    @foreach($events as $d)
                        <div class="single-news index">
                            <div class="news-img">
                                <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                    <img class="lozad" data-src="{{$d->getFirstMediaUrl('cover', 'thumb')}}" src="">
                                </a>
                            </div>
                            <div class="news-text-box">
                                <div class="data-news">
                                    <p class="text-data">{{$d->getDateFormattedAttribute('published_at')}} </p>
                                    <div class="social">
                                        @if ($d->social_id !== '1' && $d->link !== null)
                                            <a target="_blank" href="{{ $d->link }}">{{$d->social->getFirstMedia('icona')}}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="title-news">
                                    <h2 class="text-title"><a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">{{$d->title}}</a></h2>
                                    
                                </div>
                                <div class="text-news p-2">
                                    {!! $d->short_body !!}
                                </div>
                                <div class="link-news">
                                    <div class="content-link">
                                        <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                            <div class="leggi">
                                                <p>{{__("application.index.news.leggi.single")}}</p>
                                                <div class="image-arrow"><img src="{{asset("images/red_right.png")}}"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="book">
                <div class="title">
                    <p class="section-title">LIBRI</p>
                    <hr class="hr-title">
                </div>
                <div class="content-swiper-book swiper tincani">
                    <div class="swiper-book swiper-wrapper">
                        @foreach ($books as $book)
                        <div class="content-swiper swiper-slide">
                            <a href="{{route('libri-detail', ['id' => $book->id, 'title' => Str::slug($book->title)])}}">{{$book->getFirstMedia('copertina')}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="posts">
    <div class="content">
        <p class="section-title">EDOTORIALE</p>
        <hr class="hr-title">
        <div class="content-news">
            @foreach($edo as $d)
                <div class="single-news index">
                    <div class="news-img">
                        <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                            <img class="lozad" data-src="{{$d->getFirstMediaUrl('cover', 'thumb')}}" src="">
                        </a>
                    </div>
                    <div class="news-text-box">
                        <div class="data-news">
                            <p class="text-data">{{$d->getDateFormattedAttribute('published_at')}} </p>
                            <div class="social">
                                @if ($d->social_id !== '1' && $d->link !== null)
                                    <a target="_blank" href="{{ $d->link }}">{{$d->social->getFirstMedia('icona')}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="title-news">
                            <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                <h2 class="text-title">{{$d->title}}</h2>
                            </a>
                        </div>
                        <div class="text-news p-2">
                            {!! $d->short_body !!}
                        </div>
                        <div class="link-news">
                            <div class="content-link">
                                <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                    <div class="leggi">
                                        <p>{{__("application.index.news.leggi.single")}}</p>
                                        <div class="image-arrow"><img src="{{asset("images/red_right.png")}}"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="posts">
    <div class="content">
        <p class="section-title">ALBUM</p>
        <hr class="hr-title">
        <div class="content-news">
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('aedo')}}">
                        <img class="lozad" data-src="{{asset('images/musica/cd_aedo.jpg')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('aedo')}}"><h2 class="text-title">AEDO</h2></a>
                    </div>
                </div>
            </div>
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('lo-sguardo')}}">
                        <img class="lozad" data-src="{{asset('images/musica/cd_volgeranno_sguardo.jpg')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('lo-sguardo')}}"><h2 class="text-title">2033 E VOLGERANNO LO SGUARDO</h2></a>
                    </div>
                </div>
            </div>
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('di-viaggio')}}">
                        <img class="lozad" data-src="{{asset('images/cd5.png')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('di-viaggio')}}"><h2 class="text-title">COMPAGNI DI VIAGGIO</h2></a>
                    </div>
                </div>
            </div>
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('un-canto')}}">
                        <img class="lozad" data-src="{{asset('images/cd4.png')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('un-canto')}}"><h2 class="text-title">DUE VOCI UN CANTO</h2></a>
                    </div>
                </div>
            </div>
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('ti-cerchero')}}">
                        <img class="lozad" data-src="{{asset('images/cd2.png')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('ti-cerchero')}}"><h2 class="text-title">IO TI CERCHERÒ</h2></a>
                    </div>
                </div>
            </div>
            <div class="single-news index">
                <div class="news-img">
                    <a href="{{route('venga-regno')}}">
                        <img class="lozad" data-src="{{asset('images/cd1.png')}}" src="">
                    </a>
                </div>
                <div class="news-text-box">
                    <div class="title-news">
                        <a href="{{route('venga-regno')}}"><h2 class="text-title">VENGA IL TUO REGNO</h2></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('partials.footer')
