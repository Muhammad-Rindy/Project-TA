@extends('layouts.master')
@section('content')
    @if (session('success'))
        <div id="live">
            <div class="check-alert">
                <i class="far fa-check-circle color-alert"></i> &nbsp; &nbsp;
                <span>Well Done! {{ session('success') }}</span>
            </div>
        </div>
    @elseif ($errors->any())
        @foreach ($errors->all() as $error)
            <div id="live">
                <div class="danger-alert">
                    <i class="far fa-times-circle shine-alert"></i>
                    &nbsp; &nbsp;
                    <span>Wrong! {{ $error }}</span>
                </div>
            </div>
        @endforeach
    @endif
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Hero-->
        <div id="kt_app_hero" class="app-hero py-6">
            <!--begin::Hero container-->
            <div id="kt_app_hero_container" class="app-container container-xxl d-flex">
                <!--begin::Hero wrapper=-->

                <!--end::Hero wrapper=-->
            </div>
            <!--end::Hero container-->
        </div>
        <!--end::Hero-->
        <!--begin::Wrapper container-->
        <div class="app-container container-xxl">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar d-flex flex-column py-6">
                            <!--begin::Content menu-->
                            <div
                                class="app-content-menu menu menu-rounded bg-gray-200 menu-state-bg flex-wrap fs-5 fw-bold mt-n15 pt-5 pb-0 mb-7 gap-1">
                                <!--begin::Menu item-->
                                <div class="menu-item m-0 p-0">
                                    <a class="menu-link py-3 px-4 active" href="../../demo45/dist/index.html">
                                        <span class="menu-title">My Profile</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('update-profile') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" name="name"
                                    id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                    id="email" aria-describedby="emailHelp" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password">
                            </div>
                            <div class="d-grid gap-2 col-4 mx-auto mt-10">
                                <button type="submit" class="btn btn-primary btn-sm">Change profile details</button>
                            </div>
                        </form>
                    </div>
                    <div id="kt_app_footer"
                        class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-gray-400 fw-semibold me-1">2023&copy;</span>
                            <a href="/" target="_blank" class="text-gray-400 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-400 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
