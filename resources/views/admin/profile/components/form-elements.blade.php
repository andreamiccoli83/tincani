<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bio'), 'has-success': fields.bio && fields.bio.valid }">
    <label for="bio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.profile.columns.bio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.bio" v-validate="'required'" id="bio" name="bio"></textarea>
        </div>
        <div v-if="errors.has('bio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bio') }}</div>
    </div>
</div>

<div class="card">
    @if ($mode === 'create')
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Profile::class)->getMediaCollection('foto_bio'),
                'label' => 'Foto'
            ])
        @else
            @include('brackets/admin-ui::admin.includes.media-uploader', [
               'media' => $profile->getThumbs200ForCollection('foto_bio'),
               'mediaCollection' => $profile->getMediaCollection('foto_bio'),
               'label' => 'Foto'
           ])
        @endif
</div>
