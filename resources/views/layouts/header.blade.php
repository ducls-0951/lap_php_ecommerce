<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            <!-- Logo2 -->
            <a href="#" class="logo2">
                <h3 class="text-uppercase font-weight-bold">{{ __('header.shoesStore') }}</h3>
            </a>

            <div class="topbar-child2">
                <span class="topbar-email">
                </span>

                <div class="topbar-language rs1-select2">
                </div>

                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <span class=" h4 lnr lnr-enter"></span>
                </a>
                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <span class="h4 lnr lnr-user"></span>
                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2 m-r-13">
                    {{-- Cart --}}
                    <img src="bower_components/template-fesha/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"></span>

                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="bower_components/template-fesha/images/item-cart-01.jpg" alt="{{ __('header.img') }}">
                                </div>
                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                    </a>
                                    <span class="header-cart-item-info">
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    {{ __('header.viewCart') }}
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    {{ __('header.checkOut') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="#"></a>
                            <ul class="sub_menu">
                                <li><a href="#"></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">{{ __('header.shop') }}</a>
                        </li>

                        <li>
                            <a href="#">{{ __('header.cart') }}</a>
                        </li>

                        <li>
                            <a href="#">{{ __('header.suggest') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="#" class="logo-mobile">
            <h3 class="text-uppercase font-weight-bold">{{ __('header.shoesStore') }}</h3>
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <span class=" h4 lnr lnr-enter"></span>
                </a>
                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <span class="h4 lnr lnr-user"></span>
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="bower_components/template-fesha/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="{{ __('header.icon') }}">
                    <span class="header-icons-noti"></span>

                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="bower_components/template-fesha/images/item-cart-01.jpg" alt="{{ __('header.img') }}">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                    </a>

                                    <span class="header-cart-item-info">
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    {{ __('header.viewCart') }}
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    {{ __('header.checkOut') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <span class="topbar-email">
                        </span>

                        <div class="topbar-language rs1-select2">
                        </div>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="#"></a>
                    <ul class="sub-menu">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">{{ __('header.shop') }}</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">{{ __('header.cart') }}</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">{{ __('header.suggest') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
