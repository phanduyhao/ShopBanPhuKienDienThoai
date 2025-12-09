@extends('layouts.layout')
@section('content')

<style>
    .profile-sidebar {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px 20px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .profile-sidebar:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(0,0,0,0.12);
    }
    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #f1f1f1;
        transition: 0.3s;
    }
    .profile-avatar:hover {
        transform: scale(1.05);
        border-color: #0d6efd;
    }
    .nav-profile .nav-link {
        padding: 12px 16px;
        font-size: 15px;
        border-radius: 10px;
        font-weight: 500;
        transition: .25s;
        color: #555;
    }
    .nav-profile .nav-link:hover,
    .nav-profile .nav-link.active {
        background: #0d6efd;
        color: #fff !important;
    }

    .profile-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    }

    .input-field {
        padding: 12px 14px !important;
        border-radius: 12px !important;
    }

</style>

<section class="py-5" style="background:antiquewhite;">
    <div class="container">
        <div class="row g-4">

            <!-- SIDEBAR -->
            <div class="col-lg-3 col-md-4">
                <div class="profile-sidebar text-center">

                    <img src="{{ Auth::user()->avatar }}"
                         class="profile-avatar mb-3 shadow-sm"
                         alt="avatar">

                    <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                    <small class="text-muted">{{ Auth::user()->email }}</small>

                    <hr class="my-4">

                    <ul class="nav flex-column nav-profile">
                        <li class="nav-item">
                            <a href="{{ route('profile.index') }}" class="nav-link">
                                <i class="bi bi-person-circle me-2"></i>Thông tin cá nhân
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('showChangePass') }}" class="nav-link active">
                                <i class="bi bi-key me-2"></i>Thay đổi mật khẩu
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-lg-9 col-md-8">
                <div class="profile-card">

                    <h4 class="fw-bold mb-4">Thay đổi mật khẩu</h4>

                    @include('admin.error')

                    <form action="{{ route('changePass') }}"
                          method="POST"
                          id="form-change-password"
                          class="row g-4">
                        @csrf

                        <div class="col-12">
                            <label class="fw-semibold">Mật khẩu cũ</label>
                            <input type="password"
                                   name="old_password"
                                   class="form-control input-field"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-semibold">Mật khẩu mới</label>
                            <input type="password"
                                   name="new_password"
                                   class="form-control input-field"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-semibold">Xác nhận mật khẩu mới</label>
                            <input type="password"
                                   name="new_password_confirmation"
                                   class="form-control input-field"
                                   required>
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit"
                                    class="btn btn-primary px-5 py-2"
                                    style="border-radius:12px;font-size:16px;">
                                Lưu lại
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
