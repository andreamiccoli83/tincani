@include('partials.header')

<section class="libri">
    <div class="content">
        <div class="single-book">
            <div class="content-book">
                <div class="image-book">
                    {{$details->getFirstMedia('copertina')}}
                    <div class="content-box-link">
                        @if($details->link)
                        <div class="box-link">
                            <a class="link" href="{{$details->link}}" target="_blank">Youtube</a>
                        </div>
                        @endif
                        @if($details->link_two)
                        <div class="box-link">
                            <a class="link" href="{{$details->link_two}}" target="_blank">Editore</a>
                        </div>
                        @endif
                        @if($details->link_three)
                        <div class="box-link">
                            <a class="link" href="{{$details->link_three}}" target="_blank">Amazon</a>
                        </div>
                        @endif
                        <div class="box-link">
                            <a class="link" href="{{route('download-mediabook', $details )}}" target="_blank">Media</a>
                        </div>
                    </div>
                </div>
                <div class="text-book">
                    <div class="box-libro">
                        <div class="content-title">
                            <h2 class="title">{{$details->title}}</h2>
                            <p class="subtitle">by {{$details->author}}</p>
                            <div class="box-info">
                                <p class="info-title">EDITORE</p>
                                <p class="info-text">{{$details->editore}}</p>
                            </div>
                            <div class="box-info">
                                <p class="info-title">ANNO</p>
                                <p class="info-text">{{$details->getDateFormattedAttribute('anno')}}</p>
                            </div>
                        </div>
                        <div class="info-libro">
                        </div>
                    </div>
                    <div class="content-text">
                        <p>{!! $details->description !!}</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>

@include('partials.footer')
