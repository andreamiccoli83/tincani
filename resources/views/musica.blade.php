@include('partials.header')

<section class="musica">
    <div class="content">
        <div class="content-cd">
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('aedo')}}"><img src="{{asset('images/musica/cd_aedo.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('aedo')}}"><p class="title-cd">AEDO</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('lo-sguardo')}}"><img src="{{asset('images/musica/cd_volgeranno_sguardo.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('lo-sguardo')}}"><p class="title-cd">2033 E VOLGERANNO LO SGUARDO</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('di-viaggio')}}"><img src="{{asset('images/musica/cd_compagni.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('di-viaggio')}}"><p class="title-cd">COMPAGNI DI VIAGGIO</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('un-canto')}}"><img src="{{asset('images/musica/cd_due_voci.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('un-canto')}}"><p class="title-cd">DUE VOCI UN CANTO</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('ti-cerchero')}}"><img src="{{asset('images/musica/cd_io_ti _cerchero.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('ti-cerchero')}}"><p class="title-cd">IO TI CERCHERÒ</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('venga-regno')}}"><img src="{{asset('images/musica/cd_venga_regno.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('venga-regno')}}"><p class="title-cd">VENGA IL TUO REGNO</p></a></div>
            </div>
            <div class="single-cd">
                <div class="content-image-cd"><a href="{{route('ti-canto')}}"><img src="{{asset('images/musica/cd_ti_canto.jpg')}}"></a></div>
                <div class="content-title-cd"><a href="{{route('ti-canto')}}"><p class="title-cd">E CON QUESTA VITA TI CANTO</p></a></div>
            </div>
        </div>
    </div>
</section>


@include('partials.footer')
