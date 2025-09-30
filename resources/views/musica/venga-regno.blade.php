@include('partials.header')

<section class="musica-details">
    <div class="content">
        <div class="musica-title-detail"><p>VENGA IL TUO REGNO</p></div>
        <div class="content-cd-details">
            <div style="width:100%" class="soundcloud-list"><iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/871391435&color=%23c90505&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe></div>
        </div>
        <div class="box-link-details">
            <div class="content-link-details">
                <a href="{{route('presentazione')}}">
                    <div class="link-details">
                        <img src="{{asset('images/musica/details/open_black.png')}}">
                        <p>Presentazione</p>
                    </div>
                </a>
            </div>
            <div class="content-link-details">
                <a href="{{route('cronaca-regno')}}">
                    <div class="link-details">
                        <img src="{{asset('images/musica/details/open_black.png')}}">
                        <p>Cronaca</p>
                    </div>
                </a>
            </div>
            <div class="content-link-details">
                <a href="{{asset('images/musica/details/doc_regno/programma_di_sala.pdf')}}" target="_blank">
                    <div class="link-details">
                        <img src="{{asset('images/musica/details/open_black.png')}}">
                        <p>Programma di sala</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="content-slider-musica-details">
            <div class="slider-music-details">
                <div class="content-slide">
                    <img class="lozad" data-src="{{asset('images/musica/details/vengailtuoregno_02.jpg')}}" src="">
                </div>
                <div class="content-slide">
                   <img class="lozad" data-src="{{asset('images/musica/details/vengailtuoregno_25.jpg')}}" src="">
                </div>
                <div class="content-slide">
                    <img class="lozad" data-src="{{asset('images/musica/details/vengailtuoregno_33.jpg')}}" src="">
                </div>
            </div>
            <div class="arrow-left2"><img src="{{asset('images/arrow_left_2.png')}}" alt="left-arrow"></div>
            <div class="arrow-right2"><img src="{{asset('images/arrow_right_2.png')}}" alt="right-arrow"></div>
        </div>
    </div>
</section>


@include('partials.footer')