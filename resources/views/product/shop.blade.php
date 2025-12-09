@extends('layouts.layout')
@section('content')
    <style>
        .product-card img {
            height: 230px;
            object-fit: cover;
        }

        .product-card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        .shop__sidebar select,
        .shop__sidebar input {
            border-radius: 6px !important;
        }

        .shop__sidebar h5 {
            color: #5a5a5a;
        }
    </style>

    <!-- Breadcrumb -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="breadcrumb__text">
                <h4>Cửa hàng</h4>
                <div class="breadcrumb__links">
                    <a href="/">Trang chủ</a>
                    <span>Cửa hàng</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section -->
    <section class="shop spad py-5" style="background: beige">
        <div class="container">
            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-lg-3">
                    <div class="shop__sidebar shadow-sm p-3 bg-white rounded mb-1">

                        {{-- SEARCH --}}
                        <div class="mb-4">
                            <div class="input-group" id="searchBox">
                                <input type="text" name="nameProduct" value="{{ $nameProduct }}" class="form-control"
                                    placeholder="🔍 Tìm kiếm sản phẩm...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Tìm</button>
                                </div>
                            </div>
                        </div>

                        {{-- CATEGORY --}}
                        <div class="mb-4">
                            <h5 class="font-weight-bold mb-3">📂 Danh mục</h5>
                            <ul class="list-group overflow-auto" >
                                @foreach ($category_all as $item)
                                    <a href="{{ route('products.showProduct', ['categorySlug' => $item->slug]) }}"
                                        class="list-group-item list-group-item-action">
                                        {{ $item->title }}
                                    </a>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- PRODUCT LIST -->
                <div class="col-lg-9 bg-white">

                    {{-- FILTER OPTIONS --}}
                    <div id="filterForm" class="d-flex flex-lg-row flex-md-column flex-row align-items-lg-center justify-content-lg-between justify-content-md-center justify-content-between pb-2 border-bottom mt-lg-0 mt-2">

                        <div class="d-flex flex-md-row flex-column justify-content-lg-end justify-content-between text-nowrap mt-lg-0 mt-2">

                            {{-- FILTER BRAND --}}
                            <div class="d-flex align-items-center mb-md-0 mb-2 mr-2">
                                <label class="font-weight-bold mb-0 mr-2" style="font-size: 24px">💻</label>
                                <select class="form-select" name="brand">
                                    <option value="">HÃNG</option>
                                    <option value="dell">Dell</option>
                                    <option value="hp">HP</option>
                                    <option value="acer">Acer</option>
                                    <option value="asus">Asus</option>
                                    <option value="lenovo">Lenovo</option>
                                    <option value="macbook">Macbook</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>

                            {{-- FILTER STATUS --}}
                            <div class="d-flex align-items-center mb-md-0 mb-2 mr-2">
                                <label class="font-weight-bold mb-0 mr-2" style="font-size: 24px">📦</label>
                                <select class="form-select" name="condition">
                                    <option value="">TÌNH TRẠNG</option>
                                    <option value="new">New</option>
                                    <option value="likenew">Like New</option>
                                    <option value="old">Cũ</option>
                                </select>
                            </div>

                            {{-- FILTER PRICE --}}
                            <div class="d-flex align-items-center">
                                <label class="font-weight-bold mb-0 mr-2" style="font-size: 24px">💲</label>
                                <select class="form-select" name="price_sort">
                                    <option value="">GIÁ</option>
                                    <option value="asc">Giá thấp → cao</option>
                                    <option value="desc">Giá cao → thấp</option>
                                </select>
                            </div>

                        </div>

                        <button class="btn btn-success mt-lg-0 mt-2">
                            Áp dụng
                        </button>
                    </div>
                    <div class="row mt-3">
                        @foreach ($products as $product)
                            <div id="product-infor-list-{{ $product->id }}"
                                class="col-lg-4 col-md-4 col-sm-6 product-infor-main">
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
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
