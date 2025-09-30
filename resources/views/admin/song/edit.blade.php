@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.song.actions.edit', ['name' => $song->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <song-form
                :action="'{{ $song->resource_url }}'"
                :data="{{ $song->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.song.actions.edit', ['name' => $song->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.song.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </song-form>

        </div>
    
</div>

@endsection