@include('partials.header')

<section class="posts list">
    <div class="content">
        <div class="content-page-news">
            <div class="content-news">
                @foreach ($allPosts as $d)
                    <div class="single-news list">
                        <div class="news-detail">
                            <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                <div class="title"><h2>{{$d->title}}</h2></div>
                            </a>
                        </div>
                        <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                            <div class="cover_image">{{$d->getFirstMedia('cover')}}</div>
                        </a>
                        <div class="data-news">
                            <span class="category">CATEGORY</span>
                            <div class="date">{{$d->getDateFormattedAttribute('published_at')}}</div>
                        </div>
                        <div class="description">{!! $d->short_body !!}</div>

                        <div class="link-news">
                            <div class="content-link">
                                <a href="{{route('news-detail', ['id' => $d->id, 'title' => Str::slug($d->title)])}}">
                                    <div class="leggi">
                                        <p>{{__("application.index.news.leggi.single")}}</p>
                                        <p><i class="fas fa-chevron-right"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('component.sidebar')
        </div>
    </div>
</section>

@include('partials.footer')