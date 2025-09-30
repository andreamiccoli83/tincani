<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.book.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('anno'), 'has-success': fields.anno && fields.anno.valid }">
    <label for="anno" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.anno') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.anno" :config="datePickerConfig" class="flatpickr" :class="{'form-control-danger': errors.has('anno'), 'form-control-success': fields.anno && fields.anno.valid}" id="anno" name="anno" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('anno')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('anno') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('author'), 'has-success': fields.author && fields.author.valid }">
    <label for="author" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.author') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.author" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('author'), 'form-control-success': fields.author && fields.author.valid}" id="author" name="author" placeholder="{{ trans('admin.book.columns.author') }}">
        <div v-if="errors.has('author')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('author') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('coauthor'), 'has-success': fields.coauthor && fields.coauthor.valid }">
    <label for="coauthor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.coauthor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.coauthor" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('coauthor'), 'form-control-success': fields.coauthor && fields.coauthor.valid}" id="coauthor" name="coauthor" placeholder="{{ trans('admin.book.columns.coauthor') }}">
        <div v-if="errors.has('coauthor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('coauthor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('editore'), 'has-success': fields.editore && fields.editore.valid }">
    <label for="editore" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.editore') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.editore" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('editore'), 'form-control-success': fields.editore && fields.editore.valid}" id="editore" name="editore" placeholder="{{ trans('admin.book.columns.editore') }}">
        <div v-if="errors.has('editore')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('editore') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link'), 'has-success': fields.link && fields.link.valid }">
    <label for="link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.link') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link'), 'form-control-success': fields.link && fields.link.valid}" id="link" name="link" placeholder="{{ trans('admin.book.columns.link') }}">
        <div v-if="errors.has('link')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_two'), 'has-success': fields.link_two && fields.link_two.valid }">
    <label for="link_two" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.link_two') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link_two" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link_two'), 'form-control-success': fields.link_two && fields.link_two.valid}" id="link_two" name="link_two" placeholder="{{ trans('admin.book.columns.link_two') }}">
        <div v-if="errors.has('link_two')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link_two') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_three'), 'has-success': fields.link_three && fields.link_three.valid }">
    <label for="link_three" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.link_three') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link_three" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link_three'), 'form-control-success': fields.link_three && fields.link_three.valid}" id="link_three" name="link_three" placeholder="{{ trans('admin.book.columns.link_three') }}">
        <div v-if="errors.has('link_three')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link_three') }}</div>
    </div>
</div>


<div class="card">
    @if ($mode === 'create')
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Book::class)->getMediaCollection('copertina'),
                'label' => 'Copertina'
            ])
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Book::class)->getMediaCollection('doc'),
                'label' => 'Doc'
            ])
        @else
            @include('brackets/admin-ui::admin.includes.media-uploader', [
               'media' => $book->getThumbs200ForCollection('copertina'),
               'mediaCollection' => $book->getMediaCollection('copertina'),
               'label' => 'Copertina'
           ])
            @include('brackets/admin-ui::admin.includes.media-uploader', [
               'media' => $book->getThumbs200ForCollection('doc'),
               'mediaCollection' => $book->getMediaCollection('doc'),
               'label' => 'Doc'
           ])

        @endif
</div>

