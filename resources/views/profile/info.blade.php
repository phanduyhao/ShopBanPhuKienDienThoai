@extends('layouts.layout')
@section('content')

<style>
    .profile-sidebar {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
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
        border-color: #0d6efd;
        transform: scale(1.05);
    }

    .nav-profile .nav-link {
        padding: 12px 16px;
        font-size: 15px;
        border-radius: 10px;
        color: #555;
        font-weight: 500;
        transition: 0.25s;
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
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    .input-field {
        border-radius: 12px !important;
        padding: 12px 14px !important;
    }

    .profile-upload-btn {
        border-radius: 10px;
        padding: 6px 14px;
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

                    <h5 class="fw-bold mb-1">{{ Auth::user()->name }}</h5>
                    <small class="text-muted">{{ Auth::user()->email }}</small>

                    <hr class="my-4">

                    <ul class="nav flex-column nav-profile">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.index') }}">
                                <i class="bi bi-person-circle me-2"></i>Thông tin cá nhân
                            </a>
                        </li>

                        <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('showChangePass') }}">
                                <i class="bi bi-key me-2"></i>Thay đổi mật khẩu
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <!-- MAIN PROFILE FORM -->
            <div class="col-lg-9 col-md-8">
                <div class="profile-card">

                    <h4 class="fw-bold mb-4">Thông tin cá nhân</h4>

                    @include('admin.error')

                    <form method="POST"
                          action="{{ route('profile.update', Auth::user()->id) }}"
                          enctype="multipart/form-data"
                          id="form-update-profile">
                        @csrf

                        <div class="row g-4">

                            <!-- AVATAR -->
                            <div class="col-md-4 text-center">
                                <label for="avatar-upload" class="cursor-pointer">
                                    <img id="avatar-preview"
                                        src="{{ Auth::user()->avatar }}"
                                        class="img-fluid rounded-4 shadow-sm"
                                        style="width:220px;height:220px;object-fit:cover;cursor:pointer;">
                                </label>

                                <input type="file" id="avatar-upload"
                                       name="avatar"
                                       class="d-none"
                                       accept="image/*"
                                       onchange="previewAvatar(event)">

                                <button type="button"
                                        onclick="document.getElementById('avatar-upload').click()"
                                        class="btn btn-secondary mt-3 profile-upload-btn">
                                    <i class="bi bi-upload me-1"></i> Upload ảnh
                                </button>
                            </div>

                            <!-- FORM FIELDS -->
                            <div class="col-md-8 row g-4">

                                <div class="col-md-6">
                                    <label class="fw-semibold">Tên</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control input-field"
                                           required
                                           value="{{ Auth::user()->name }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control input-field"
                                           required
                                           value="{{ Auth::user()->email }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold">Số điện thoại</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control input-field"
                                           value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold">Giới tính</label>
                                    <div class="d-flex gap-4 mt-2">

                                        <div class="form-check mr-2">
                                            <input type="radio"
                                                   name="sex"
                                                   id="sex-nam"
                                                   class="form-check-input"
                                                   value="nam"
                                                   @checked(Auth::user()->sex=='nam')>
                                            <label class="form-check-label" for="sex-nam">Nam</label>
                                        </div>

                                        <div class="form-check mr-2">
                                            <input type="radio"
                                                   name="sex"
                                                   id="sex-nu"
                                                   class="form-check-input"
                                                   value="nu"
                                                   @checked(Auth::user()->sex=='nu')>
                                            <label class="form-check-label" for="sex-nu">Nữ</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio"
                                                   name="sex"
                                                   id="sex-khac"
                                                   class="form-check-input"
                                                   value="khac"
                                                   @checked(Auth::user()->sex=='khac')>
                                            <label class="form-check-label" for="sex-khac">Khác</label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button class="btn btn-primary px-4 py-2"
                                    style="border-radius:12px;font-size:16px;">
                                Cập nhật
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
function previewAvatar(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('avatar-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

@endsection
