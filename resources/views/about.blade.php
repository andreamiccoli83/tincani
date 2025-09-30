@include('partials.header')

<section class="about">
    <div class="content">
        <div class="single-book">
            <div class="content-book">
                <div class="image-book">
                    {{$about->getFirstMedia('foto_bio')}}
                    <div class="button">
                        <a href="{{route('contacts')}}"><p>CONTATTAMI</p></a>
                    </div>
                </div>
                <div class="text-book">
                    <div class="content-title">
                        <h2 class="title">ABOUT <span>ME</span></h2>
                    </div>
                    <div class="content-text">
                        <p>{{$about->bio}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
