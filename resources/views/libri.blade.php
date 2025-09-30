@include('partials.header')

<section class="libri">
    <div class="content">
        @foreach ($books as $book)
        <div class="single-book">
            <div class="content-book">
                <div class="image-book">
                    {{$book->getFirstMedia('copertina')}}
                    <div class="button">
                        <a href="{{route('libri-detail', ['id' => $book->id, 'title' => Str::slug($book->title)])}}">
                            <p>SCHEDA LIBRO</p>
                        </a>
                    </div>
                </div>
                <div class="text-book">
                    <div class="box-libro">
                        <div class="content-title">
                        <h2 class="title">{{$book->title}}</h2>
                        <p class="subtitle">by {{$book->author}}</p>
                        @if ($book->coauthor)
                            <p class="subtitle subtitle2">con {{$book->coauthor}}</p>
                        @endif
                    </div>
                    </div>
                    <div class="content-text">
                        {!! str_limit($book->description, $limit = 1000, $end = '...') !!}
                    </div>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
       
    </div>
</section>

@include('partials.footer')
