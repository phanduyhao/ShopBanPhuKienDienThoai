
<style>
    /* Hiện dropdown cấp 1 khi hover */
.nav-item.dropdown:hover > .dropdown-menu {
    display: flex;
    flex-direction: column;
}

/* Hiện dropdown cấp 2 khi hover */
.dropdown-submenu:hover > .sub-dropdown-menu {
    display: flex;
    flex-direction: column;    left: 100%;
    top: 0;
}

/* Căn chỉnh dropdown con */
.dropdown-submenu {
    position: relative;
}

.sub-dropdown-menu {
    position: absolute;
    display: none;
    min-width: 200px;
}

</style>
<header class="header">
    <!-- Top bar -->
    <div class="header__top py-2 border-bottom d-block">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left info -->
                <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center">
                    <span class="me-2 icon-wiggle">📍</span>
                    <span class="font-weight-bolder text-white text-shake">
                        Giao dịch trực tiếp tại Tp Vinh - Nghệ An
                    </span>
                </div>

                <!-- Search bar -->
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <div class="top-search search-float d-flex align-items-center px-3 py-1 bg-white border rounded-pill shadow-sm w-100"
                        style="max-width: 280px;">
                        <span class="me-2 icon-wiggle">🔍</span>
                        <input type="text" class="border-0 bg-transparent w-100" placeholder="Tìm kiếm..."
                            style="outline: none;">
                    </div>
                </div>

                <!-- Contact info -->
                <div
                    class="col-lg-4 col-md-12 d-none d-md-flex justify-content-lg-end justify-content-start align-items-center">
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
            <div class="col-lg-3 col-6">
                <div class="header__logo py-1">
                    <a href="/">
                        <img src="/temp/assets/img/logo.png" alt="Logo" class="img-fluid" width="200">
                    </a>
                </div>
            </div>

            <!-- Menu -->
            <div class="col-lg-6 col-md-8 d-none d-lg-block">
                <nav class="header__menu h-100">
                    <ul class="navbar-nav d-flex flex-row gap-3 h-100 align-items-center text-nowrap">

                        <li class="nav-item">
                            <a href="/" class="nav-link fw-semibold">Trang chủ</a>
                        </li>

                        <li class="nav-item dropdown position-relative">
    <a class="nav-link fw-semibold dropdown-toggle" href="{{ route('products.shop') }}">
        Cửa hàng
    </a>

    <ul class="dropdown-menu rounded-3 shadow-lg fade-menu p-2 position-absolute" style="top: 20px">

        @foreach ($menus as $menu)
            @if ($menu->parent_id == null)

                <li class="dropdown-submenu px-2 py-1 position-relative w-100">
                    <a class="dropdown-item fw-semibold d-flex justify-content-between"
                       href="{{ route('products.showProduct', ['categorySlug' => $menu->slug]) }}">
                        {{ $menu->title }}
                    </a>

                    @if ($menu->children->isNotEmpty())
                        <ul class="dropdown-menu rounded-3 shadow sub-dropdown-menu p-2 position-absolute" style="left:75%">
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
            <div class="col-lg-3 d-none d-lg-flex align-items-center justify-content-end mt-2 mt-lg-0">
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
                            <a href="/login" class="btn btn-outline-primary fw-semibold px-3 py-2 rounded-pill mr-2">
                                Đăng nhập
                            </a>
                            <a href="/registers" class="btn btn-primary fw-semibold px-3 py-2 rounded-pill">
                                Đăng ký
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="col-6 d-lg-none btn-sidebar d-block mt-2">
                <i class="fa fa-bars float-right" style="font-size: 28px"></i>
            </div>
        </div>
    </div>
</header>
<div id="mobileOverlay" class="mobile-overlay" aria-hidden="true"></div>

<!-- Mobile Sidebar -->
<aside id="mobileSidebar" class="mobile-sidebar" aria-hidden="true" aria-labelledby="mobileSidebarLabel" role="dialog">
    <div class="sidebar-header d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
        <h5 id="mobileSidebarLabel" class="m-0">Menu</h5>
        <i class="fa fa-times close-sidebar" style="font-size: 24px; cursor: pointer;" aria-label="Đóng menu"></i>
    </div>

    <nav class="p-3" role="navigation" aria-label="Main mobile navigation">
        <!-- Account block -->
        <div class="mb-3">
            @if (Auth::check())
                <!-- Logged in: show name + dropdown -->
                <div class="account-block">
                    <button
                        class="account-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2"
                        type="button" aria-expanded="false">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fa fa-chevron-down ml-2"></i>
                    </button>

                    <ul class="account-menu list-unstyled mt-2 p-2 rounded-2" style="display:none;">
                        @if (Auth::user()->level == 1)
                            <li class="py-1"><a href="/admin" class="sidebar-link d-block">Quản trị</a></li>
                        @endif
                        <li class="py-1"><a href="{{ route('profile.index') }}" class="sidebar-link d-block">Trang
                                cá nhân</a></li>
                        <li class="py-1">
                            <form action="{{ route('logout') }}" method="post" class="m-0 sidebar-link d-block py-0">
                                <input type="hidden" name="_token" value="anAMJ0QcoeOZJDBNyH2zp7pENXEZpPcSOD1AwuS0" autocomplete="off">                                <button type="submit" class="border-0 bg-transparent" fdprocessedid="uh08z">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Not logged in: show buttons -->
                <div class="d-flex gap-2">
                    <a href="/login" class="btn btn-outline-primary w-50 mr-2">Đăng nhập</a>
                    <a href="/registers" class="btn btn-primary w-50">Đăng ký</a>
                </div>
            @endif
        </div>

        <ul class="list-unstyled m-0">
            <li class="mb-2">
                <a href="/" class="shop-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2">Trang chủ</a>
            </li>

            <!-- Shop with collapsible children -->
            <li class="mb-2">
                <button class="shop-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2"
                    type="button" aria-expanded="false">
                    <span>Cửa hàng</span>
                    <i class="fa fa-chevron-down ml-2"></i>
                </button>

                <ul class="shop-menu list-unstyled mt-2 p-2 rounded-2" style="display:none;">
                    <!-- Parent categories -->
                    @foreach ($menus as $menu)
                        @if ($menu->parent_id == null)
                            @if ($menu->children->isNotEmpty())
                                <!-- If has children, make an inner toggler -->
                                <li class="py-1">
                                    <button class="inner-toggle btn btn-sm d-flex justify-content-between align-items-center w-100" aria-label="Mở {{ $menu->title }}"
                                        data-target="#sub-{{ $menu->id }}">
                                        {{ $menu->title }}
                                        <i class="fa fa-chevron-right"></i>
                                    </button>

                                    <ul id="sub-{{ $menu->id }}" class="list-unstyled ml-3 border-0 mt-2 sub-menu"
                                        style="display:none;">
                                        @foreach ($menu->children as $child)
                                            <li class="py-1">
                                                <a class="sidebar-link small d-block"
                                                    href="{{ route('products.showProduct', ['categorySlug' => $child->slug]) }}">
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="py-1">
                                    <a class="sidebar-link d-block"
                                        href="{{ route('products.showProduct', ['categorySlug' => $menu->slug]) }}">
                                        {{ $menu->title }}
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="mb-2">
                <a href="/about" class="shop-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2">Giới thiệu</a>
            </li>

            <li class="mb-2">
                <a href="{{ route('post') }}" class="shop-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2">Bài viết</a>
            </li>

            <li class="mb-2">
                <a href="/contact" class="shop-toggle btn btn-light w-100 d-flex justify-content-between align-items-center py-2">Liên hệ</a>
            </li>
        </ul>
    </nav>
</aside>
<script>
    (function() {
        const menuBtn = document.querySelector(".fa-bars");
        const sidebar = document.getElementById("mobileSidebar");
        const overlay = document.getElementById("mobileOverlay");
        const closeBtn = document.querySelector(".close-sidebar");

        function openSidebar() {
            sidebar.classList.add("open");
            sidebar.setAttribute("aria-hidden", "false");
            overlay.style.display = "block";
            overlay.setAttribute("aria-hidden", "false");
            // prevent body scroll
            document.body.style.overflow = "hidden";
        }

        function closeSidebar() {
            sidebar.classList.remove("open");
            sidebar.setAttribute("aria-hidden", "true");
            overlay.style.display = "none";
            overlay.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
            // collapse any open submenus (optional)
            document.querySelectorAll(
                "#mobileSidebar .account-menu, #mobileSidebar .shop-menu, #mobileSidebar .sub-menu").forEach(
                el => {
                    el.style.display = "none";
                });
            // reset chevrons
            document.querySelectorAll(
                "#mobileSidebar .account-toggle i, #mobileSidebar .shop-toggle i, #mobileSidebar .inner-toggle i"
                ).forEach(ic => {
                ic.classList.remove("rotated");
            });
        }

        function toggleSidebar() {
            if (sidebar.classList.contains("open")) closeSidebar();
            else openSidebar();
        }

        // Attach main handlers
        if (menuBtn) menuBtn.addEventListener("click", toggleSidebar);
        if (closeBtn) closeBtn.addEventListener("click", closeSidebar);
        if (overlay) overlay.addEventListener("click", closeSidebar);

        // Account dropdown toggle
        document.querySelectorAll("#mobileSidebar .account-toggle").forEach(btn => {
            btn.addEventListener("click", function() {
                const menu = this.nextElementSibling;
                const expanded = this.getAttribute("aria-expanded") === "true";
                this.setAttribute("aria-expanded", String(!expanded));
                if (menu) menu.style.display = expanded ? "none" : "block";
                // rotate icon
                const ic = this.querySelector("i");
                if (ic) ic.classList.toggle("rotated");
            });
        });

        // Shop main toggle
        document.querySelectorAll("#mobileSidebar .shop-toggle").forEach(btn => {
            btn.addEventListener("click", function() {
                const menu = this.nextElementSibling;
                const expanded = this.getAttribute("aria-expanded") === "true";
                this.setAttribute("aria-expanded", String(!expanded));
                if (menu) menu.style.display = expanded ? "none" : "block";
                const ic = this.querySelector("i");
                if (ic) ic.classList.toggle("rotated");
            });
        });

        // Inner toggles for categories with children
        document.querySelectorAll("#mobileSidebar .inner-toggle").forEach(btn => {
            btn.addEventListener("click", function(e) {
                // prevent parent toggles
                e.stopPropagation();
                const targetId = this.getAttribute("data-target");
                const target = document.querySelector(targetId);
                if (!target) return;
                const isVisible = target.style.display !== "none";
                target.style.display = isVisible ? "none" : "block";
                // rotate arrow (icon is inside button)
                const ic = this.querySelector("i");
                if (ic) ic.classList.toggle("rotated");
            });
        });

        // Small helper: close sidebar on ESC
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape" && sidebar.classList.contains("open")) {
                closeSidebar();
            }
        });

        // icon rotation CSS via class
        const style = document.createElement('style');
        style.innerHTML = `
            #mobileSidebar .rotated { transform: rotate(180deg); transition: transform .18s ease; }
        `;
        document.head.appendChild(style);
    })();
</script>
