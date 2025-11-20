<style>
    /* Menu link đẹp hơn */
    .header__menu .nav-link {
        transition: 0.25s;
    }

    .header__menu .nav-link:hover {
        color: #ffd369 !important;
        transform: translateY(-2px);
    }

    /* Dropdown mượt */
    .dropdown-menu {
        animation: fadeIn 0.25s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Dropdown con */
    .dropdown-submenu {
        position: relative;
    }

    .sub-dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: 5px;
    }

    /* Hover highlight item */
    .dropdown-item {
        border-radius: 6px;
        transition: 0.2s;
    }

    .dropdown-item:hover {
        background: #f5f5f5;
        padding-left: 14px;
    }

    /* Mobile menu button */
    .canvas__open i {
        cursor: pointer;
        transition: 0.3s;
    }

    .canvas__open i:hover {
        transform: scale(1.1);
    }

    /* Bố cục tổng thể mượt hơn */
    .header__logo img {
        transition: transform 0.3s;
    }

    .header__logo img:hover {
        transform: scale(1.05);
    }

    .dropdown-hover:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        /* tránh nhảy */
        transition: all 0.2s ease;
    }
</style>

<header class="header">
    <!-- Top bar -->
    <div class="header__top py-2 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left info -->
                <div class="col-lg-4 col-md-6 d-flex align-items-center mb-2 mb-md-0">
                    <span class="me-2 icon-wiggle">📍</span>
                    <span class="font-weight-bolder text-white text-shake">
                        Giao dịch trực tiếp tại Tp Vinh - Nghệ An
                    </span>
                </div>

                <!-- Search bar -->
                <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-2 mb-md-0">
                    <div class="top-search search-float d-flex align-items-center px-3 py-1 bg-white border rounded-pill shadow-sm w-100"
                        style="max-width: 280px;">
                        <span class="me-2 icon-wiggle">🔍</span>
                        <input type="text" class="border-0 bg-transparent w-100" placeholder="Tìm kiếm..."
                            style="outline: none;">
                    </div>
                </div>

                <!-- Contact info -->
                <div class="col-lg-4 col-md-12 d-flex justify-content-lg-end justify-content-center align-items-center">
                    <span class="me-2 icon-wiggle">📞</span>
                    <span class="fw-semibold text-white text-shake">
                        <a href="tel:0855840100" class="font-weight-bold">0855 840 100</a> /
                        <a href="tel:0942263111" class="font-weight-bold">0942 263 111</a>
                    </span>
                </div>

            </div>
        </div>
    </div>

    <!-- Main nav -->
    <div class="container py-2">
        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-lg-3 col-md-4 col-6">
                <div class="header__logo py-1">
                    <a href="/">
                        <img src="/temp/assets/img/logo.png" alt="Logo" class="img-fluid" width="200">
                    </a>
                </div>
            </div>

            <!-- Menu -->
            <div class="col-lg-6 col-md-8 d-none d-md-block">
                <nav class="header__menu h-100">
                    <ul class="navbar-nav d-flex flex-row gap-3 h-100 align-items-center text-nowrap">

                        <li class="nav-item">
                            <a href="/" class="nav-link fw-semibold">Trang chủ</a>
                        </li>

                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link fw-semibold dropdown-toggle" href="{{ route('products.shop') }}">
                                Cửa hàng
                            </a>

                            <ul class="dropdown-menu rounded-3 shadow-lg fade-menu p-2">
                                @foreach ($menus as $menu)
                                    @if ($menu->parent_id == null)
                                        <li class="dropdown-submenu px-2 py-1">
                                            <a class="dropdown-item fw-semibold d-flex justify-content-between"
                                                href="{{ route('products.showProduct', ['categorySlug' => $menu->slug]) }}">
                                                {{ $menu->title }}
                                            </a>

                                            @if ($menu->children->isNotEmpty())
                                                <ul class="dropdown-menu rounded-3 shadow sub-dropdown-menu p-2">
                                                    @foreach ($menu->children as $child)
                                                        <li class="py-1">
                                                            <a class="dropdown-item"
                                                                href="{{ route('products.showProduct', ['categorySlug' => $child->slug]) }}">
                                                                {{ $child->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="/about" class="nav-link fw-semibold">Giới thiệu</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('post') }}" class="nav-link fw-semibold">Bài viết</a>
                        </li>

                        <li class="nav-item">
                            <a href="/contact" class="nav-link fw-semibold">Liên hệ</a>
                        </li>

                    </ul>
                </nav>
            </div>

            <!-- User/Login -->
            <div class="col-lg-3 col-md-12 d-flex align-items-center justify-content-end mt-2 mt-lg-0">
                <div class="header__top__right">

                    @if (Auth::check())
                        <div class="dropdown dropdown-hover">
                            <button class="btn btn-primary px-4 py-2 rounded-pill fw-semibold dropdown-toggle"
                                type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0"
                                aria-labelledby="userDropdown">
                                @if (Auth::user()->level == 1)
                                    <li>
                                        <a href="/admin" class="dropdown-item fw-semibold text-dark hover-bg-light">
                                            Quản trị
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a href="{{ route('profile.index') }}"
                                        class="dropdown-item fw-semibold text-dark hover-bg-light">
                                        Trang cá nhân
                                    </a>
                                </li>

                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item fw-semibold text-danger hover-bg-light">
                                            Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex gap-2">
                            <a href="/login" class="btn btn-outline-primary fw-semibold px-3 py-2 rounded-pill">
                                Đăng nhập
                            </a>
                            <a href="/registers" class="btn btn-primary fw-semibold px-3 py-2 rounded-pill">
                                Đăng ký
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <!-- Mobile menu button -->
        <div class="canvas__open d-lg-none d-block mt-2">
            <i class="fa fa-bars fs-3"></i>
        </div>
    </div>
</header>
