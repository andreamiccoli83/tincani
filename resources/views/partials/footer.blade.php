        <footer>
            <div class="content">
                <div class="content-footer">
                    <div class="text-footer">
                        <div class="box-footer">
                            <p class="title-box-footer">MAIL</p>
                            <p class="text-box-footer"><a href="mailto:edoardo@edoardotincani.it">edoardo@edoardotincani.it</a></p>
                        </div>
                        <div class="box-footer">
                            <p class="title-box-footer">ABOUT</p>
                            <p class="text-box-footer"><a href="{{route('about')}}">Chi sono</a></p>
                        </div>
                        <div class="box-footer">
                            <p class="title-box-footer">LINK</p>
                            <p class="text-box-footer"><a href="http://www.laliberta.info">La Libertà</a></p>
                        </div>
                        <div class="box-footer">
                            <p class="title-box-footer">SEGUIMI</p>
                            <div class="social-footer">
                                <div class="social-icon"><a href="https://www.facebook.com/edoardo.tincani.10" target="_blank"><img src="{{asset('images/social/facebook-brands.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://www.instagram.com/edoardo_tincani" target="_blank"><img src="{{asset('images/social/instagram-brands.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://twitter.com/Edoardo_Tincani" target="_blank"><img src="{{asset('images/social/twitter-brands.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://www.youtube.com/channel/UCz0CcgvVNHBg4dXpaiy39Pw" target="_blank"><img src="{{asset('images/social/youtube-brands.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://soundcloud.com/edoardo-tincani" target="_blank"><img src="{{asset('images/social/sound-cloud.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://it.linkedin.com/in/edoardo-tincani-67040b72" target="_blank"><img src="{{asset('images/social/linkedin-brands.png')}}" /></a></div>
                                <div class="social-icon"><a href="https://open.spotify.com/album/5Z7MHEIFosiatmnZYwvbbv" target="_blank"><img src="{{asset('images/social/spotify_logo.png')}}" /></a></div>

                            </div>
                        </div>
                    </div>
                    <div class="content-hr">
                        <hr>
                    </div>
                    <div class="content-copyright">
                        <p class="copyright">Copyright {{ date('Y') }} - <a href="https://www.andreamiccoli.it" target="_blank">Miccoli Andrea</a></p>
                   </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var home = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var libri_cd = new Swiper(".tincani", {
        effect: "cards",
        grabCursor: true,
        centeredSlides: true,
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
      },

    });
  </script> 

    <script src="{{mix('js/web.js')}}"></script>
        
    </body>
</html>
