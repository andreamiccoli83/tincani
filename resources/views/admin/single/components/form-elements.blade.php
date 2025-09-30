<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.single.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.single.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.single.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.single.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info'), 'has-success': fields.info && fields.info.valid }">
    <label for="info" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.single.columns.info') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.info" v-validate="''" id="info" name="info" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('info')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_spotify'), 'has-success': fields.link_spotify && fields.link_spotify.valid }">
    <label for="link_spotify" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.single.columns.link_spotify') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <wysiwyg v-model="form.link_spotify" v-validate="''" id="link_spotify" name="link_spotify" :config="mediaWysiwygConfig"></wysiwyg>
        <div v-if="errors.has('link_spotify')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link_spotify') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_songs'), 'has-success': fields.link_songs && fields.link_songs.valid }">
    <label for="link_songs" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.single.columns.link_songs') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link_songs" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link_songs'), 'form-control-success': fields.link_songs && fields.link_songs.valid}" id="link_songs" name="link_songs" placeholder="{{ trans('admin.single.columns.link_songs') }}">
        <div v-if="errors.has('link_songs')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link_songs') }}</div>
    </div>
</div>

@if ($mode === 'create')
@include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Single::class)->getMediaCollection('singolo'),
            'label' => 'Singolo'
        ])
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Single::class)->getMediaCollection('doc'),
            'label' => 'Doc'
        ])
@else
@include('brackets/admin-ui::admin.includes.media-uploader', [
        'media' => $single->getThumbs200ForCollection('singolo'),
        'mediaCollection' => $single->getMediaCollection('singolo'),
        'label' => 'Singolo'
    ])
     @include('brackets/admin-ui::admin.includes.media-uploader', [
        'media' => $single->getThumbs200ForCollection('doc'),
        'mediaCollection' => $single->getMediaCollection('doc'),
        'label' => 'Doc'
    ])
@endif

