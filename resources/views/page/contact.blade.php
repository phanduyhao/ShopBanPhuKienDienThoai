@extends('layouts.layout')
@section('content')
    <style>
        .contact-list li:hover {
            transform: translateY(-3px);
            transition: 0.3s;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        /* Khối item */
        .contact-item {
            background: linear-gradient(135deg, #f0f7ff, #ffffff);
            border-left: 5px solid #0d6efd;
            transition: 0.3s ease;
        }

        /* Hover nổi */
        .contact-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #e8f2ff, #ffffff);
        }

        /* Icon tiêu đề */
        .icon-box {
            font-size: 28px;
        }

        /* Link */
        .contact-link a {
            font-size: 16px;
            font-weight: 600;
            color: #0d6efd;
            text-decoration: none;
            transition: 0.2s;
        }

        /* Hover vào tên */
        .contact-link a:hover {
            color: #084298;
            text-decoration: underline;
        }
    </style>

    <!-- Bản đồ -->
    <div class="map mb-5">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4483.832478332703!2d105.7014477!3d18.6638313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cdcdbd51c4b7%3A0x3c4e5c8bc8607ef!2zODcgUGhvbmcgxJDhu4tuaCBD4bqjbmcsIELhur9uIFRo4buneSwgVmluaCwgTmdo4buHIEFuIDQ2MDAwMA!5e1!3m2!1svi!2s!4v1763911642163!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </div>

    <!-- Liên hệ -->
    <section class="contact spad py-5">
        <div class="container">
            <div class="row g-4 align-items-center">

                <div class="col-lg-6">
                    <div class="contact__text">
                        <div class="section-title mb-4">
                            <span>Thông Tin</span>
                            <h2>Liên Hệ Với Chúng Tôi</h2>
                            <p>Hỗ trợ nhanh chóng – tư vấn nhiệt tình – phục vụ tận tâm!</p>
                        </div>

                        <ul class="list-unstyled contact-list">
                            <li class="mb-4 p-3 bg-light rounded shadow-sm">
                                <h4 class="mb-2"><i class="fa fa-phone text-primary"></i> Số điện thoại</h4>
                                <p class="mb-1">
                                    📞 <a href="tel:0942263111" class="text-dark font-weight-bold">0942 263 111</a>
                                </p>
                                <p>
                                    📞 <a href="tel:0855840100" class="text-dark font-weight-bold">0855 840 100</a>
                                </p>
                            </li>

                            <li class="contact-item mb-4 p-4 rounded shadow-sm">
                                <h4 class="mb-3 d-flex align-items-center">
                                    <span class="icon-box me-2">📘</span>
                                    <span class="fw-bold text-primary">Facebook Liên Hệ</span>
                                </h4>

                                <p class="mb-2 contact-link">
                                    👉 <a href="https://www.facebook.com/cong.nguyen.167189" target="_blank">Nguyễn Công</a>
                                </p>

                                <p class="mb-0 contact-link">
                                    👉 <a href="https://www.facebook.com/haostbv.duy/" target="_blank">Phan Hào</a>
                                </p>
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="/temp/images/shop.png" class="img-fluid rounded shadow-lg" alt="Liên hệ">
                </div>

            </div>
        </div>
    </section>
@endsection
