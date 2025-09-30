@include('partials.header')

<section class="musica-details">
    <div class="content">
        <div class="musica-title-detail"><p>IO TI CERCHERÒ</p></div>
        <div class="content-cd-details">
            <div class="soundcloud-list"><iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/871519520&color=%23c90505&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe></div>
            <div class="video-cd-details"><iframe width="560" height="315" src="https://www.youtube.com/embed/vZ5g45-e2wI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        </div>
        <div class="box-link-details">
            <div class="content-link-details">
                <a href="{{asset('images/musica/details/doc_cerchero/locandina.pdf')}}" target="_blank">
                    <div class="link-details">
                        <img src="{{asset('images/musica/details/open_black.png')}}">
                        <p>Locandina</p>
                    </div>
                </a>
            </div>
            <div class="content-link-details">
                <a href="{{route('concerto')}}">
                    <div class="link-details">
                        <img src="{{asset('images/musica/details/open_black.png')}}">
                        <p>Concerto</p>
                    </div>
                </a>
            </div>
            <div class="content-link-details">
                <a href="{{asset('images/musica/details/doc_cerchero/programma_di_sala.pdf')}}" target="_blank">
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
                    <img class="lozad" data-src="{{asset('images/musica/details/DSC_1526.jpg')}}" src="">
                </div>
                <div class="content-slide">
                    <img class="lozad" data-src="{{asset('images/musica/details/DSC_1553.jpg')}}" src="">
                </div>
                <div class="content-slide">
                    <img class="lozad" data-src="{{asset('images/musica/details/DSC_1587.jpg')}}" src="">
                </div>
                <div class="content-slide">
                    <img class="lozad" data-src="{{asset('images/musica/details/DSC_1721.jpg')}}" src="">
                </div>
            </div>
            <div class="arrow-left2"><img src="{{asset('images/arrow_left_2.png')}}" alt="left-arrow"></div>
            <div class="arrow-right2"><img src="{{asset('images/arrow_right_2.png')}}" alt="right-arrow"></div>
        </div>
    </div>
</section>


@include('partials.footer')