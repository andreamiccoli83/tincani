@include('partials.head')

<body>
<div class="page-container">
<div class="content-wrap">
<header>
    <div class="content content-menu">
            <div class="sub-menu">
                <div class="menu-about">
                    <div class="content-menu-about">
                        <div><a href="{{route('about')}}"><p>ABOUT</p></a></div>
                        <div><a href="{{route('contacts')}}"><p>CONTATTI</p></a></div>
                        <div><a href="{{route('archive.reset')}}"><p>ARCHIVIO</p></a></div>
                    </div>
                </div>
                <div class="social">
                    {{-- <div class="link"><a href="http://www.econquestavitaticanto.it/" target="_blank"><img src="{{asset('images/logo_ecqvitc.png')}}"></a></div> --}}
                    <div class="social-icon"><a href="https://www.facebook.com/edoardo.tincani.10" target="_blank"><img src="{{asset('images/social/facebook-brands.png')}}" /></a></div>
                    <div class="social-icon"><a href="https://www.instagram.com/edoardo_tincani" target="_blank"><img src="{{asset('images/social/instagram-brands.png')}}" /></a></div>
                    <div class="social-icon"><a href="https://twitter.com/Edoardo_Tincani" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                      </svg></a></div>
                    <div class="social-icon"><a href="https://www.youtube.com/channel/UCz0CcgvVNHBg4dXpaiy39Pw" target="_blank"><img src="{{asset('images/social/youtube-brands.png')}}" /></a></div>
                    <div class="social-icon"><a href="https://soundcloud.com/edoardo-tincani" target="_blank"><img src="{{asset('images/social/sound-cloud.png')}}" /></a></div>
                    <div class="social-icon"><a href="https://it.linkedin.com/in/edoardo-tincani-67040b72" target="_blank"><img src="{{asset('images/social/linkedin-brands.png')}}" /></a></div>
                    <div class="social-icon"><a href="https://open.spotify.com/intl-it/artist/76cMAkIwyKyBUx8GbW3qXF?si=Z3xCbx2vTLaQQ5I_c27Htg" target="_blank"><img src="{{asset('images/social/spotify_logo.png')}}" /></a></div>
                </div>
            </div>
            <hr>
        <div class="navigation">
            <div class="content-menu-right">
                <div class="menu-right">
                    <div class="content-button">
                        <div class="hamburger">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <div class="logo-red"><a href="{{route('home')}}"><p>EDOARDO</p></a></div>
                    <div class="logo-black"><a href="{{route('home')}}"><p>TINCANI</p></a></div>
                </div>
            </div>
            
            <div class="menu">
                <div><a href="{{route('home')}}"><p>{{__("application.header.menu.home")}}</p></a></div>
                <div><a href="{{route('news')}}"><p>{{__("application.header.menu.news")}}</p></a></div>
                <div><a href="{{route('events')}}"><p>{{__("application.header.menu.events")}}</p></a></div>
                <div><a href="{{route('edotoriale')}}"><p>{{__("application.header.menu.edotoriale")}}</p></a></div>
                <div><a href="{{route('libri')}}"><p>{{__("application.header.menu.libri")}}</p></a></div>
                <div><a href="{{route('musica')}}"><p>{{__("application.header.menu.album")}}</p></a></div>
                <div><a href="{{route('single')}}"><p class="evidence">{{__("application.header.menu.singoli")}}</p></a></div>
            </div>
            <div class="menu-list close-menu">
                <ul class="menu-link">
                    <li><a href="{{route('home')}}"><p>{{__("application.header.menu.home")}}</p></a></li>
                    <li><a href="{{route('news')}}"><p>{{__("application.header.menu.news")}}</p></a></li>
		                <li><a href="{{route('events')}}"><p>{{__("application.header.menu.events")}}</p></a></li>
		                <li><a href="{{route('edotoriale')}}"><p>{{__("application.header.menu.edotoriale")}}</p></a></li>
                    <li><a href="{{route('libri')}}"><p>{{__("application.header.menu.libri")}}</p></a></li>
                    <li><a href="{{route('musica')}}"><p>{{__("application.header.menu.musica")}}</p></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
