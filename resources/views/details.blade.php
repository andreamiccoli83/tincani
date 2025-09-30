@include('partials.header')


<section class="details list">
    <div class="content">
        <div class="content-details-news">
            <div class="content-news flex-column">
                <div class="single-news list">
                    <div class="news-detail">
                        <div class="data-news">
                            <div class="date">{{$details->getDateFormattedAttribute('published_at')}}</div>
                        </div>
                        <div class="content-title">
                            <div class="title"><h2>{{$details->title}}</h2></div>
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_x"></a>
                            </div>
                            <!-- AddToAny END -->
                            <script>
                                var a2a_config = a2a_config || {};
                                a2a_config.locale = "it";
                            </script>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                        </div>
                    </div>
                    <div class="cover_image">{{$details->getFirstMedia('cover')}}</div>
                    <div class="description ql-editor">{!! $details->body !!}</div>

                    @if($details->getFirstMedia('gallery'))
                        <section class="slider-slick">
                            <div class="content">
                                <div class="box-slider">
                                    <div class="content-slider">
                                        @foreach($details->getMedia('gallery') as $file)
                                                <div><img class="lightbox" src="{{$file->getUrl()}}" alt="{{$file->getAttribute('file_name')}}" title="{{$file->getAttribute('file_name')}}"></div>
                                        @endforeach
                                    </div>
                                    <div class="arrow-left"><img src="{{asset('images/arrow_left.png')}}" alt="left-arrow"></div>
                                    <div class="arrow-right"><img src="{{asset('images/arrow_right.png')}}" alt="right-arrow"></div>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($details->getFirstMedia('pdf'))
                        <div class="separator"></div>
                        <div class="attachments">
                            <div class="title">{{__('application.news.attachments')}}</div>
                            <div class="attachments-container">
                                <a target="_blank" class="single-attachment" href="{{$details->getMedia('pdf')[0]->getUrl()}}">
                                    <i class="fa fa-file-pdf"></i>
                                    <div class="text-attachment-content">
                                        <div class="attachment-title">{{$details->getMedia('pdf')[0]->getAttribute('file_name')}}</div>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
            @include('component.sidebar')
        </div>
    </div>
</section>
@include('partials.footer')


