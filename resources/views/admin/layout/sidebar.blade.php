<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Content</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/posts') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.post.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/socials') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.social.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/books') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.book.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/songs') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.song.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/profiles') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.profile.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/singles') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.single.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">Settings</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
