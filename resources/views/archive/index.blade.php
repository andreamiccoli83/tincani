@include('partials.header')

<section class="archive">
    <div class="content">
        <form class="form-archive" method="GET" action="{{ route('archive.index') }}">
            <div>
                <label for="year">Seleziona un anno:</label>
                <select name="year" id="year">
                    <option value="all">Tutti gli anni</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
           <div>
            <label for="year">Seleziona una categoria:</label>
            <select name="category" id="category">
                <option value="all">Tutte le news</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach
            </select>
           </div>
            <div class="list-button">
                <div class="content-button">
                    <button class="form-button" type="submit">Invia</button>
                </div>
            </div>
        </form>
        <div class="content-button">
            <a href="{{ route('archive.reset') }}"><button class="form-button">Reset</button></a>
        </div>

        <div class="search-news">
            <div class="content-input">
                <label>CERCA</label><p>(filtra le news con almeno 3 caratteri)</p>
                <input class="input-search-sidebar-news" type="text" value="" name="cerca" placeholder=""/>
            </div>
        </div>
        
        @if (!empty($filteredPosts))
            @if ($filteredPosts->count() > 0)
                <section class="posts list archive-news">
                    <div class="content">
                        <div class="content-page-news">
                            <div class="content-news">
                                @foreach ($filteredPosts as $d)
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
                        </div>
                    </div>
                </section>
            @else
                <p>Nessun risultato trovato per l'anno {{ $selectedYear }}</p>
            @endif
        @endif
    </div>
</section>




@include('partials.footer')