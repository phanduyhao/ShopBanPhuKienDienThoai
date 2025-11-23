@extends('layouts.layout')
@section('content')
    <style>
        .border-hover {
            border: 2px solid transparent;
            transition: 0.3s;
        }

        .border-hover:hover {
            border-color: #2d6cdf;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
        }

        .feature-box:hover,
        .service-box:hover {
            background: #ffffff;
        }

        /* Fade-in animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp .6s ease forwards;
        }

        .fade-in-left {
            opacity: 0;
            transform: translateX(-30px);
            animation: fadeInLeft .7s ease forwards;
        }

        .fade-in-right {
            opacity: 0;
            transform: translateX(30px);
            animation: fadeInRight .7s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes fadeInLeft {
            to {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes fadeInRight {
            to {
                opacity: 1;
                transform: none;
            }
        }

        /* Image hover zoom */
        .zoom-image {
            transition: 0.4s ease;
        }

        .zoom-image:hover {
            transform: scale(1.05);
        }

        /* Icon circle */
        .icon-round {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        /* Highlight box hover */
        .highlight-box {
            transition: 0.3s;
        }

        .highlight-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }

        /* Image wrapper */
        .image-wrapper {
            border-radius: 18px;
            overflow: hidden;
        }
    </style>
<style>
    /* Icon Badge */
    .icon-badge {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        transition: 0.3s;
    }
    .icon-text {
        font-size: 36px;
    }

    /* Beautiful gradients */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df, #224abe);
    }
    .bg-gradient-success {
        background: linear-gradient(135deg, #1cc88a, #13855c);
    }
    .bg-gradient-warning {
        background: linear-gradient(135deg, #f6c23e, #dd9c14);
    }

    /* Card Hover Effect */
    .feature-box {
        transition: 0.3s ease;
        border-radius: 16px;
    }
    .feature-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.15);
    }

    /* Icon hover zoom */
    .feature-box:hover .icon-badge {
        transform: scale(1.12);
    }

    /* Hover border color */
    .border-hover {
        border: 2px solid transparent;
        transition: 0.3s;
    }
    .border-hover:hover {
        border-color: #4e73df20;
    }

    /* Fade-in animation */
    .fade-in-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s forwards;
    }
    @keyframes fadeInUp {
        to { opacity:1; transform:none; }
    }
</style>

    {{-- HERO SECTION --}}
    <section class="about-hero py-5" style="background: linear-gradient(135deg, #eef2f7, #ffffff);">
        <div class="container text-center">
            <h2 class="font-weight-bold mb-3 display-5 text-dark fade-in-up font-weight-bold">
                Giới Thiệu Về Nguyễn Công Computer — Uy Tín Tại Vinh Nghệ An
            </h2>

            <p class="lead text-secondary fade-in-up font-weight-bold" style="animation-delay: .2s;">
                Chuyên Laptop – PC – Màn hình – Card màn hình – Linh kiện – Máy mới/cũ – Giá rẻ đến cao cấp.
                Cung cấp dịch vụ sửa chữa – vệ sinh – bảo hành tận tâm.
            </p>
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="about py-5">
        <div class="container">
            <div class="row align-items-center gy-5">

                {{-- IMAGE --}}
                <div class="col-lg-6 fade-in-left">
                    <div>

                        <p class="text-danger font-weight-bold ">
                            Chúng tôi tự hào là một trong những địa chỉ đáng tin cậy tại Nghệ An trong lĩnh vực kinh doanh
                            Laptop – PC – Màn hình – Card đồ họa – Linh kiện máy tính.
                        </p>
                        <p class="text-danger font-weight-bold">
                            Với nhiều năm kinh nghiệm, chúng tôi luôn đặt sự hài lòng của khách hàng lên hàng đầu,
                            mang đến sản phẩm chất lượng – bảo hành rõ ràng – hỗ trợ kỹ thuật tận tâm.
                        </p>
                    </div>
                    <div class="image-wrapper shadow-lg rounded overflow-hidden">
                        <img src="/temp/assets/img/about/about-us.jpg" class="img-fluid zoom-image" alt="About Us">
                    </div>

                </div>

                {{-- CONTENT --}}
                <div class="col-lg-6 fade-in-right">
                    <div class="p-4 rounded-lg bg-white shadow-sm border highlight-box">

                        <h3 class="font-weight-bold mb-3 text-danger font-weight-bold">
                            Cửa hàng Laptop & PC – Uy tín, giá tốt, dịch vụ tận tâm
                        </h3>

                        <ul class="list-unstyled mt-3">
                            <li class="mb-3 d-flex align-items-center">
                                <span class="icon-round bg-primary text-white mr-3">💻</span>
                                <strong>Laptop văn phòng – gaming – đồ họa </strong>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="icon-round bg-success text-white mr-3">🖥️</span>
                                <strong>PC lắp ráp – PC văn phòng – PC gaming </strong>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="icon-round bg-danger text-white mr-3">📺</span>
                                <strong>Màn hình Dell, LG, Samsung… </strong>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="icon-round bg-warning text-white mr-3">🔧</span>
                                <strong>Sửa chữa – vệ sinh – nâng cấp</strong>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <span class="icon-round bg-info text-white mr-3">🎮</span>
                                <strong> Card màn hình mới/cũ – bảo hành uy tín </strong>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="py-5" style="background: #f5f7fd;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class=" font-weight-bold text-primary">Vì Sao Khách Hàng Tin Tưởng Chúng Tôi</h2>
            </div>

           <div class="row g-4">
    @php
        $features = [
            [
                'icon' => '🔥',
                'color' => 'bg-gradient-primary',
                'title' => 'Giá Tốt – Rõ Ràng',
                'desc' => 'Giá niêm yết minh bạch, nhiều lựa chọn phù hợp mọi nhu cầu.',
            ],
            [
                'icon' => '💎',
                'color' => 'bg-gradient-success',
                'title' => 'Sản Phẩm Chất Lượng',
                'desc' => 'Máy mới – máy cũ kiểm tra kỹ, đúng mô tả, bảo hành rõ ràng.',
            ],
            [
                'icon' => '❤️',
                'color' => 'bg-gradient-warning',
                'title' => 'Dịch Vụ Tận Tâm',
                'desc' => 'Tư vấn đúng nhu cầu – hỗ trợ lâu dài – chăm sóc tận tình.',
            ],
        ];
    @endphp

    @foreach ($features as $f)
        <div class="col-lg-4 col-md-6">
            <div class="p-4 bg-white shadow feature-box rounded text-center h-100 border-hover fade-in-up">

                <div class="icon-badge {{ $f['color'] }} shadow-sm mx-auto mb-3">
                    <span class="icon-text">{{ $f['icon'] }}</span>
                </div>

                <h4 class="text-dark font-weight-bold">{{ $f['title'] }}</h4>
                <p class="text-muted font-weight-bold">{{ $f['desc'] }}</p>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </section>

    {{-- SERVICES --}}
    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="font-weight-bold text-primary">Dịch Vụ Kỹ Thuật Chuyên Nghiệp</h2>
                <p class="text-secondary font-weight-bold">Đội ngũ kỹ thuật viên kinh nghiệm – xử lý nhanh – chuẩn – uy tín.</p>
            </div>

            <div class="row g-4">

                @php
                    $services = [
                        [
                            'icon' => '🔧',
                            'title' => 'Sửa chữa Laptop – PC',
                            'desc' => 'Sửa nguồn, main, bàn phím, màn hình…',
                        ],
                        [
                            'icon' => '🧹',
                            'title' => 'Vệ sinh – Bảo dưỡng',
                            'desc' => 'Thay keo tản nhiệt – tối ưu hiệu năng.',
                        ],
                        [
                            'icon' => '⚡',
                            'title' => 'Nâng cấp phần cứng',
                            'desc' => 'Nâng SSD, RAM, VGA, CPU theo yêu cầu.',
                        ],
                        [
                            'icon' => '📦',
                            'title' => 'Bảo hành – Hậu mãi',
                            'desc' => 'Bảo hành rõ ràng – nhanh – uy tín.',
                        ],
                    ];
                @endphp

                @foreach ($services as $s)
                    <div class="col-lg-3 col-sm-6">
                        <div class="service-box p-4 shadow-sm rounded text-center border-hover h-100">
                            <h3 style="font-size: 35px;">{{ $s['icon'] }}</h3>
                            <h5 class="font-weight-bold text-dark font-weight-bold">{{ $s['title'] }}</h5>
                            <p class="text-muted font-weight-bold">{{ $s['desc'] }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    {{-- CONTACT --}}
    <section class="py-5" style="background: #f5f7fd;">
        <div class="container text-center">
            <h3 class="font-weight-bold text-primary mb-3">Liên Hệ Với Chúng Tôi</h3>

            <h5 class="mb-2">📍 <strong>Địa chỉ:</strong> 87 Phong Đình Cảng, TP Vinh, Nghệ An</h5>

            <h5 class="mb-2">📞 <strong>Hotline 1:</strong>
                <a href="tel:0855840100" class="text-decoration-none text-dark font-weight-bold">0855 840 100</a>
            </h5>
            <h5 class="mb-2">📞 <strong>Hotline 2:</strong>
                <a href="tel:0942263111" class="text-decoration-none text-dark font-weight-bold">0942 263 111</a>
            </h5>

            <h5 class="text-danger font-weight-bold mt-2">🕒 Làm việc: 8h030 – 21h00 (T2 – CN)</h5>
        </div>
    </section>
@endsection
