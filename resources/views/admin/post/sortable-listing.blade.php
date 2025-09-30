@extends('brackets/admin-ui::admin.layout.default')

@section('body')
    <div class="posts-sortable-listing">
        <sortable :data="{{$data}}"
        :post-url="'/admin/posts/update-order'"
        :cancel-url="'{{ url('/admin/posts') }}'"
        ></sortable>
    </div>
@endsection