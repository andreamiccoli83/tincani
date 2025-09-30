@include('partials.header')

<section class="musica-details">
    <div class="content">
        <div class="musica-title-detail"><p>E CON QUESTA VITA TI CANTO</p></div>
        <div class="content-cd-details">
            <div class="soundcloud-list"><a href="{{route('ti-cerchero')}}"><img style="width:100%" src="{{asset('images/musica/details/doc_ticanto/locandina_io_ti.jpg')}}"></a></div>
            <div class="video-cd-details">
                <img style="width:100%" src="{{asset('images/musica/details/doc_ticanto/econquestavita.jpg')}}">
                <ul class="list-details">
                    <li><a href="{{route('concerto')}}">Il Concerto</a></li>
                    <li><a href="{{route('ti-canto-progetto')}}">Il Progetto</a></li>
                    <li><a href="{{route('libri-detail', ['id' => 3, 'title' => 'e-con-questa-vita-ti-canto'])}}">Il Libro</a></li>
                    <li><a href="{{route('ti-cerchero')}}">Il Cd Live</a></li>
                    <li><a href="http://gazzettadireggio.gelocal.it/tempo-libero/2016/11/29/news/tincani-racconta-vent-anni-di-canzoni-1.14492368" target="_blank">L'intervista</a></li>
                    <li><a href="https://youtu.be/u8663rsYDP0" target="_blank">Il Video</a></li>
                    <li><a href="{{asset('images/musica/details/doc_ticanto/volantino.pdf')}}" target="_blank">La Locandina</a></li>
                </ul>
            </div>
        </div>
        <div class="box-link-details">
            
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