@include('partials.header')

<section class="musica">
    <div class="content">
        <div class="content-cd">
            @foreach ($singles as $single)
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('single-detail', ['id' => $single->id, 'title' => Str::slug($single->title)])}}">{{$single->getFirstMedia('singolo')}}</div>
                <div class="content-title-cd"><a href="{{route('single-detail', ['id' => $single->id, 'title' => Str::slug($single->title)])}}"><p class="title-cd">{{$single->title}}</p></a></div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@include('partials.footer')
