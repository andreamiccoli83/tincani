@include('partials.header')

<section class="single-details">
    <div class="content">
        <div class="single-title-detail"><p>{{$details->title}}</p></div>
        <div class="content-column-details">
            <div class="content-frame-details">
                {!! $details->link_spotify !!}
            </div>
            <div class="description-single-details">
                <h5>INFO:</h5>
                <p>{!! $details->info !!}</p>
                <div class="desc">
                    <h5>DESCRIZIONE:</h5>
                    {!! $details->description !!}
                </div>
                <div class="box-link">
                    <a class="link" href="{{route('download-mediasingle', $details )}}" target="_blank">Media</a>
                    @if($details->link_songs)
                        <a class="link" href="{{$details->link_songs}}" target="_blank">Songs Link</a>
                    @endif
                </div>
            </div>
            
        </div>
        
    </div>
</section>


@include('partials.footer')