<div class="form-group row align-items-center" :class="{'has-danger': errors.has('social'), 'has-success': fields.social && fields.social.valid }">
    <label for="social" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.social.columns.social') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.social" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('social'), 'form-control-success': fields.social && fields.social.valid}" id="social" name="social" placeholder="{{ trans('admin.social.columns.social') }}">
        <div v-if="errors.has('social')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('social') }}</div>
    </div>
</div>

            @if ($mode === 'create')
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Social::class)->getMediaCollection('icona'),
                            'label' => 'Icon'
                        ])
                @else
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                        'mediaCollection' => $social->getMediaCollection('icona'),
                        'media' => $social->getThumbs200ForCollection('icona'),
                        'label' => 'Icon'
                    ])
                @endif