<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>{{ __('admin.navigation') }}</span>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-image-filter-drama"></i>
                    </span>
                    <span class="title">{{ __('admin.product') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('admin.create_product') }}">{{ __('admin.create') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.index_product') }}">{{ __('admin.show') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-ninja"></i>
                    </span>
                    <span class="title">{{ __('admin.user') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">{{ __('admin.create') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.index_user') }}">{{ __('admin.show') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-cart"></i>
                    </span>
                    <span class="title">{{ __('admin.order') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">{{ __('admin.create') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.index_order') }}">{{ __('admin.show') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-menu"></i>
                    </span>
                    <span class="title">{{ __('admin.category') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">{{ __('admin.create') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.index_category') }}">{{ __('admin.show') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
