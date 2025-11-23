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
    <section class="shop spad">
        <div class="container">
            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-lg-3">
                    <div class="shop__sidebar shadow-sm p-3 bg-white rounded">

                        {{-- SEARCH --}}
                        <div class="mb-4">
                            <form action="{{ route('products.shop') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="nameProduct" value="{{ $nameProduct }}"
                                        class="form-control" placeholder="🔍 Tìm kiếm sản phẩm...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Tìm</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- CATEGORY --}}
                        <div class="mb-4">
                            <h5 class="font-weight-bold mb-3">📂 Danh mục</h5>
                            <ul class="list-group">
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
                <div class="col-lg-9">

                    {{-- FILTER OPTIONS --}}
                    <form action="{{ route('products.shop') }}" method="GET">
                        <input type="hidden" name="nameProduct" value="{{ $nameProduct }}">
                        <div class="row">
                            <div class="col-3">
                                <h5 class="font-weight-bold mb-0">🔎 Bộ lọc nâng cao</h5>

                            </div>

                            <div class="col-9 d-flex">

                                {{-- FILTER BRAND --}}
                                <div class="form-group">
                                    <label class="font-weight-bold">🏷 Hãng</label>
                                    <select class="form-control" name="brand">
                                        <option value="">Tất cả</option>
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
                                <div class="form-group">
                                    <label class="font-weight-bold">📦 Tình trạng</label>
                                    <select class="form-control" name="condition">
                                        <option value="">Tất cả</option>
                                        <option value="new">New</option>
                                        <option value="likenew">Like New</option>
                                        <option value="old">Cũ</option>
                                    </select>
                                </div>

                                {{-- FILTER PRICE --}}
                                <div class="form-group">
                                    <label class="font-weight-bold">💲 Giá</label>
                                    <select class="form-control" name="price_sort">
                                        <option value="">Mặc định</option>
                                        <option value="asc">Giá thấp → cao</option>
                                        <option value="desc">Giá cao → thấp</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-success btn-block mt-3">
                            Áp dụng bộ lọc
                        </button>
                    </form>

                    <div class="shop__product__option mb-3">
                        <p class="text-muted">
                            Hiển thị <b>{{ $pages }}</b> / <b>{{ $products->total() }}</b> sản phẩm
                        </p>
                    </div>

                    <div class="row">
                        @foreach($products as $product)
                            <div id="product-infor-list-{{$product->id}}" class="col-lg-4 col-md-6 col-sm-6 product-infor-main">
                                <input type="number" hidden class="quantity" value="1">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg position-relative" data-setbg="/temp/images/product/{{$product->thumb}}">
                                        <img class="thumb-product d-none" src="/temp/images/product/{{$product->thumb}}" alt="{{$product->title}}">
                                        <a href="{{ route('products.details', ['slug' =>$product->slug]) }}" class="detail-product-bg position-absolute" style="bottom: 0; top: 0; right: 0; left: 0"></a>
                                        <a href="" class="badge badge-warning position-relative z-20">{{$product->Category->title ?? ''}}</a>
                                        <ul class="product__hover">
                                            <li><a href="{{ route('products.details', ['slug' =>$product->slug]) }}"><img src="/temp/assets/img//icon/search.png" alt=""><span>Chi tiết</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6 class="my-2 title-product">{{$product->Title}}</h6>
                                        <a data-user-id="{{ Auth::id() }}" data-product-id="{{$product->id}}" data-quantity="{{ $product->Amounts }}" href="{{ route('products.details', ['slug' =>$product->slug]) }}"class="add-cart">Chi tiết sản phẩm</a>
                                        <div class="border-top pt-2">
                                            @if($product->discount > 0)
                                                <div class="discount text-danger font-weight-bold" style="text-decoration: line-through; font-size:13px">{{ number_format($product->price) }} VNĐ</div>
                                                <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->discount) }} VNĐ</div>
                                            @else
                                                <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->price) }} VNĐ</div>
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

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
