@include('partials.header')

<section class="contatti page-contacts">
    <div class="content">
        <div class="box-contact">
            @include('partials/form_contacts', ['title'=> __("application.index.contacts.message.title"), 'placeholder_message'=> __("application.chi-siamo.contacts.placeholder.messaggio"),'contattaci' => true])
        </div>
    </div>
</section>

@include('partials.footer')
