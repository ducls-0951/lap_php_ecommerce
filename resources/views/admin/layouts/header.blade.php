<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="#">
                <div class="logo logo-dark logo-header">
                    <img src="{{ asset('bower_components/admin-template/assets/images/logo/logo.png') }}" alt="">
                </div>
            </a>
        </div>
        <ul class="nav-left">
            <li class="search-box">
                <a class="search-toggle" href="javascript:void(0);">
                    <i class="search-icon mdi mdi-magnify"></i>
                    <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                </a>
            </li>
            <li class="search-input">
                <input class="form-control" type="text" placeholder="{{ __('admin.search') }}">
            </li>
        </ul>
        <ul class="nav-right">>
            <li class="user-profile dropdown dropdown-animated scale-left mr-4">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="{{ asset('bower_components/admin-template/assets/images/avatars/thumb-13.jpg') }}" alt="">
                </a>
                <ul class="dropdown-menu dropdown-md p-v-0">
                    <li>
                        <ul class="list-media">
                            <li class="list-item p-15">
                                <div class="media-img">
                                    <img src="{{ asset('bower_components/admin-template/assets/images/avatars/thumb-13.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold"></span>
                                    <span class="sub-title"></span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="ti-user p-r-10"></i>
                            <span>{{ __('admin.profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ti-power-off p-r-10"></i>
                            <span>{{ __('admin.logout') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
