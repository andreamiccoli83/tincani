<div class="news-sidebar">
    <p class="title-sidebar">Sidebar</p>
    @if(Route::currentRouteName() == 'news' || Route::currentRouteName() == 'events' || Route::currentRouteName() == 'edotoriale')
    <div class="search-news">
        <div class="content-input">
            <label>CERCA</label>
            <input class="input-search-sidebar-news" type="text" value="" name="cerca" placeholder=""/>
        </div>
    </div>
    <a href="{{route('archive.reset')}}"><p class="archive-title">ARCHIVIO</p></a>
    @endif
    <div class="calendar-news">
        {{-- {!! $calendar->script() !!} --}}
    </div>
    @if (Route::currentRouteName() == 'news-detail' || Route::currentRouteName() == 'news')
        <div class="list-news">
            <p class="list-news-title">ULTIMI ARTICOLI</p>
                @foreach ($relatedPosts as $relatedPost)
                    <div class="single-news-list">
                        <a href="{{ route('news-detail', ['id' => $relatedPost->id, 'title' => \Illuminate\Support\Str::slug($relatedPost->title)]) }}">
                            {{ $relatedPost->title }}
                        </a>
                    </div>
                @endforeach
        </div>
    @endif
    @if (Route::currentRouteName() == 'events-detail'|| Route::currentRouteName() == 'events')
        <div class="list-news">
            <p class="list-news-title">ULTIMI ARTICOLI</p>
                @foreach ($relatedPosts as $relatedPost)
                    <div class="single-news-list">
                        <a href="{{ route('events-detail', ['id' => $relatedPost->id, 'title' => \Illuminate\Support\Str::slug($relatedPost->title)]) }}">
                            {{ $relatedPost->title }}
                        </a>
                    </div>
                @endforeach
        </div>
    @endif
    @if (Route::currentRouteName() == 'edo-detail'|| Route::currentRouteName() == 'edotoriale')
        <div class="list-news">
            <p class="list-news-title">ULTIMI ARTICOLI</p>
                @foreach ($relatedPosts as $relatedPost)
                    <div class="single-news-list">
                        <a href="{{ route('edo-detail', ['id' => $relatedPost->id, 'title' => \Illuminate\Support\Str::slug($relatedPost->title)]) }}">
                            {{ $relatedPost->title }}
                        </a>
                    </div>
                @endforeach
        </div>
    @endif
    
</div>