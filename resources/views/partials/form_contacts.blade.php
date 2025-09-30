<div class="contact-form">
    <div class="title-form">
        @if (isset($icon))
            <p><i class="{{$icon}}"></i></p>
        @endif
            <h1 class="title">{{$title}}</h1>
            <p class="subtitle">{{__("application.index.contacts.subtitle")}}</p>
    </div>
    <form class="form-footer" action="{{route('sendMail')}}" method="POST">
        @csrf
        <div class="content-form form-valid">
            <div class="content-input-name">
                <input type="text" class="@error('name_surname') is-invalid @enderror" value="{{old("name_surname")}}" name="name_surname" placeholder="{{__("application.index.contacts.placeholder.nome")}}"/>
                <input type="text" name="email" class="@error('email') is-invalid @enderror" value="{{old("email")}}" placeholder="{{__("application.index.contacts.placeholder.email")}}"/>
            </div>
            <div class="content-validation">
                <div class="single-validation">
                    @error('name_surname')
                    <div class="invalid-feedback text-invalid" role="alert">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="single-validation">
                    @error('email')
                    <div class="invalid-feedback text-invalid" role="alert">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="content-form form-valid">
            <textarea rows="8" name="message" placeholder="{{__("application.index.contacts.placeholder.messaggio")}}">{{old('message')}}</textarea>
            <div class="content-validation">
                <div class="single-validation">
                    @error('message')
                    <div class="invalid-feedback text-invalid" role="alert">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="content-form form-valid">
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY_TEST') }}"></div>
            <div class="content-validation">
                <div class="single-validation">
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="content-button">
            <button type="submit" class="form-button">{{__("application.index.contacts.button")}}</button>
        </div>
    </form>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</div>
