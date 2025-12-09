@extends('layouts.layout')
@section('content')
    <style>
        .owl-next,
        .owl-prev {
            background: #ffffff69 !important;
            border-radius: 5px;

        }

        /* Căn chỉnh item */
        .category-item {
            text-align: center;
            display: block;
            transition: 0.3s ease;
            position: relative;
        }

        /* Vòng tròn icon */
        .category-circle {
            width: 130px;
            height: 130px;
            background: #f2f4fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            overflow: hidden;
        }

        /* Ảnh bên trong */
        .category-circle img {
            width: 70%;
            height: 70%;
            object-fit: contain;
            transition: transform 0.35s ease;
        }

        /* Hover → phóng to ảnh */
        .category-item:hover img {
            transform: scale(1.15);
        }

        /* Chữ thương hiệu */
        .category-item h4 {
            margin-top: 12px;
            font-size: 16px;
            font-weight: 600;
            position: relative;
            display: block;
            /* mạnh nhất */
            width: 100%;
            text-align: center;
            padding-bottom: 6px;
        }

        .category-item h4::after {
            content: "";
            width: 0;
            height: 10px;
            background: #1a73e8;
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.35s ease;
            border-radius: 10px;
        }

        .category-item:hover h4::after {
            width: 40%;
        }
    </style>
    <section class="" style="background-color: #e5eaf4">
        <div class="hero container row mx-auto py-3 ">
            <div class="col-lg-8 col-12">
                <div class="bg-white p-3 h-100" style="border-radius:10px">
                    <div class="hero-slider-box ">
                        <div class="owl-carousel hero-slider ">
                            <div class="h-100"><img src="/temp/assets/img/hero/hero-1.jpg" class="slide-img" /></div>
                            <div class="h-100"><img src="/temp/assets/img/hero/hero-2.jpg" class="slide-img" /></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner bên phải -->
            <div class="col-lg-4 col-12 d-md-flex flex-lg-column mt-lg-0 mt-3 justify-content-between hero-right d-none">
                <div class="banner__item px-3 py-4 mr-lg-0 mr-2 bg-white w-100 h-100 mb-3 d-flex align-items-center">
                    <div class="d-flex flex-column h-100 justify-content-between ">
                        <h5 class="font-weight-bold">Dell Gaming & Acer Nitro 5</h5>
                        <div>
                            <i>Giảm giá giới hạn</i>
                            <div>
                                <h5 class="font-weight-bold">12.000.000đ</h5>
                                <h6 class="text-danger text-decoration-line-through font-weight-bolder">13.500.000đ</h6>
                            </div>
                        </div>
                    </div>
                    <div class="banner__item__pic">
                        <img class="img-banner" width="180" src="/temp/assets/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="banner__item px-3 py-4 bg-white w-100 h-100 d-flex align-items-center">
                    <div class="d-flex flex-column h-100 justify-content-between ">
                        <h5 class="font-weight-bold">Dell Gaming & Acer Nitro 5</h5>
                        <div>
                            <i>Giảm giá giới hạn</i>
                            <div>
                                <h5 class="font-weight-bold">12.000.000đ</h5>
                                <h6 class="text-danger text-decoration-line-through font-weight-bolder">13.500.000đ</h6>
                            </div>
                        </div>
                    </div>
                    <div class="banner__item__pic">
                        <img class="img-banner" width="180" src="/temp/assets/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4" style="background: #e6ebf5;">
            <div class="container-sm full-width p-0">
                <div class="row text-center justify-content-center">

                    <!-- Item 1 -->
                    <div class="col-6 col-lg-3 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mr-3" style="font-size: 36px;">🚀</div>
                        <div class="text-left">
                            <h5 class="mb-1 font-weight-bold">Miễn phí vận chuyển</h5>
                            <p class="mb-0 small">Cho các đơn hàng Ship Cod</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-6 col-lg-3 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mr-3" style="font-size: 36px;">🔄</div>
                        <div class="text-left">
                            <h5 class="mb-1 font-weight-bold">Đổi trả 1 - 1</h5>
                            <p class="mb-0 small">Hủy đơn trong vòng 1 ngày</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-6 col-lg-3 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mr-3" style="font-size: 36px;">✅</div>
                        <div class="text-left">
                            <h5 class="mb-1 font-weight-bold">Thanh toán an toàn 100%</h5>
                            <p class="mb-0 small">Đảm bảo giao dịch bảo mật</p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-6 col-lg-3 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mr-3" style="font-size: 36px;">💬</div>
                        <div class="text-left">
                            <h5 class="mb-1 font-weight-bold">Hỗ trợ 24/7</h5>
                            <p class="mb-0 small">Ở bất cứ đâu & bất cứ lúc nào</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="">
        <div class="container">
            <div class="container py-5 position-relative">

                <!-- Title -->
                <h4 class="text-primary mb-1 font-weight-bolder">🏷️ Hãng máy</h4>
                <h2 class="font-weight-bold mb-4">Duyệt theo danh mục</h2>
                <!-- Slider -->
                @php
                    $categories = [
                        [
                            'name' => 'HP',
                            'href' => '/shop?Hang=hp',
                            'img' => '/temp/images/Hp-min.png',
                        ],
                        [
                            'name' => 'DELL',
                            'href' => '/shop?Hang=dell',
                            'img' => '/temp/images/Dell-min.png',
                        ],
                        [
                            'name' => 'ASUS',
                            'href' => '/shop?Hang=asus',
                            'img' => '/temp/images/AUSS-min.png',
                        ],
                        [
                            'name' => 'ACER',
                            'href' => '/shop?Hang=acer',
                            'img' => '/temp/images/ACER-min.png',
                        ],
                        [
                            'name' => 'LENOVO',
                            'href' => '/shop?Hang=lenovo',
                            'img' => '/temp/images/LENOVO-min.png',
                        ],
                        [
                            'name' => 'MACBOOK',
                            'href' => '/shop?Hang=macbook',
                            'img' => '/temp/images/apple-min.png',
                        ],
                        [
                            'name' => 'KHÁC',
                            'href' => '/shop?Hang=khac',
                            'img' => '/temp/images/Khac-min.png',
                        ],
                    ];
                @endphp

                <div class="owl-carousel" id="categorySlider">
                    @foreach ($categories as $cat)
                        <a href="{{ $cat['href'] }}" class="category-item">
                            <div class="category-circle p-4">
                                <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }}">
                            </div>
                            <h4 class="mt-3 font-weight-bold">{{ $cat['name'] }}</h4>
                        </a>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Sản phẩm mới</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter" id="MixItUp086433">
                @foreach ($product_hots as $product)
                    <div id="product-infor-list-{{ $product->id }}"
                        class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals product-infor-main">
                        <input type="number" hidden class="quantity" value="1">
                        <div class="product__item">
                            <div class="product__item__pic set-bg position-relative"
                                data-setbg="/temp/images/product/{{ $product->thumb }}">
                                <img class="thumb-product d-none" src="/temp/images/product/{{ $product->thumb }}"
                                    alt="{{ $product->title }}">
                                <a href="{{ route('products.details', ['slug' => $product->slug]) }}"
                                    class="detail-product-bg position-absolute"
                                    style="bottom: 0; top: 0; right: 0; left: 0"></a>
                                <a href=""
                                    class="badge badge-warning position-relative z-20">{{ $product->Category->title ?? '' }}</a>
                                <ul class="product__hover">
                                    <li><a href="{{ route('products.details', ['slug' => $product->slug]) }}"><img
                                                src="/temp/assets/img//icon/search.png" alt=""><span>Chi
                                                tiết</span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6 class="my-2 title-product">{{ $product->Title }}</h6>
                                <a data-user-id="{{ Auth::id() }}" data-product-id="{{ $product->id }}"
                                    data-quantity="{{ $product->Amounts }}"
                                    href="{{ route('products.details', ['slug' => $product->slug]) }}"class="add-cart">Chi
                                    tiết sản phẩm</a>
                                <div class="border-top pt-2">
                                    @if ($product->discount > 0)
                                        <div class="discount text-danger font-weight-bold"
                                            style="text-decoration: line-through; font-size:13px">
                                            {{ number_format($product->price) }} VNĐ</div>
                                        <div class="price okPrice-product text-info font-weight-bold">
                                            {{ number_format($product->discount) }} VNĐ</div>
                                    @else
                                        <div class="price okPrice-product text-info font-weight-bold">
                                            {{ number_format($product->price) }} VNĐ</div>
                                    @endif
                                </div>
                                {{-- <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Tin tức mới</span>
                        <h2>Xu hướng điện thoại mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($post_hots as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="/temp/images/post/{{ $item->thumb }}"
                                alt="{{ $item->Title }}"></div>
                            <div class="blog__item__text">
                                <span><img src="/temp/assets/img/icon/calendar.png" alt="">
                                    {{ $item->updated_at }}</span>
                                <h5>{{ $item->Title }}</h5>
                                <a href="{{ route('posts.details', ['slug' => $item->slug]) }}">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
@endsection
