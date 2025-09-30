<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.post.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.body" v-validate="''" id="body" name="body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('body') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('short_body'), 'has-success': fields.short_body && fields.short_body.valid }">
    <label for="short_body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.short_body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.short_body" v-validate="''" id="short_body" name="short_body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('short_body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('short_body') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
             :class="{'has-danger': errors.has('category_id'), 'has-success': this.fields.category_id && this.fields.category_id.valid }">
            <label for="category_id"
                   class="col-form-label text-md-right col-md-2">{{ trans('admin.post.columns.category_id') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <select v-model="form.category_id" @input="validate($event)" class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>

                <div v-if="errors.has('category_id')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('category_id') }}
                </div>
            </div>
        </div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.post.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link'), 'has-success': fields.link && fields.link.valid }">
    <label for="link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.link') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.link" v-validate="''" id="link" name="link"></textarea>
        </div>
        <div v-if="errors.has('link')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link') }}</div>
    </div>
</div>


<div class="form-group row align-items-center"
             :class="{'has-danger': errors.has('social_id'), 'has-success': this.fields.social_id && this.fields.social_id.valid }">
            <label for="social_id"
                   class="col-form-label text-md-right col-md-2">{{ trans('admin.post.columns.social_id') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <select v-model="form.social_id" @input="validate($event)" class="form-control" name="social_id">
                    @foreach($socials as $social)
                        <option value="{{ $social->id}}">{{$social->social}}</option>
                    @endforeach
                </select>

                <div v-if="errors.has('social_id')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('social_id') }}
                </div>
            </div>
        </div>

<div class="card">
    @if ($mode === 'create')
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('gallery'),
                'label' => 'Gallery'
            ])
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('pdf'),
                'label' => 'PDF'
            ])
        @else
            @include('brackets/admin-ui::admin.includes.media-uploader', [
               'media' => $post->getThumbs200ForCollection('gallery'),
               'mediaCollection' => $post->getMediaCollection('gallery'),
               'label' => 'Gallery'
           ])
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'media' => $post->getThumbs200ForCollection('pdf'),
                'mediaCollection' => $post->getMediaCollection('pdf'),
                'label' => 'PDF'
            ])

        @endif
</div>





