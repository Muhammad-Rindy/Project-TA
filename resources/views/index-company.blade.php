@extends('layouts.master')

@section('content')
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
                    @if (session('success'))
                        <div id="live">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Well Done! </strong>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @elseif ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div id="live">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Wrong! {{ $error }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div id="kt_app_content" class="app-content">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar d-flex flex-column py-6">
                            <!--begin::Content menu-->
                            <div
                                class="app-content-menu menu menu-rounded bg-gray-200 menu-state-bg flex-wrap fs-5 fw-bold mt-n15 pt-5 pb-0 mb-7 gap-1">
                                <!--begin::Menu item-->
                                <div class="menu-item m-0 p-0">
                                    <a class="menu-link py-3 px-4 active" href="../../demo45/dist/index.html">
                                        <span class="menu-title">Detail's Company</span>
                                    </a>
                                </div>
                            </div>
                            @if (Auth::user()->status == '0')
                                <div style="margin-bottom: -25px; text-align:center" class="alert alert-danger">
                                    Your account has not been verified, the Admin will contact you within 1 x 24 hours.
                                </div>
                            @else
                                <div
                                    class="app-toolbar-wrapper d-flex align-items-center flex-stack flex-wrap gap-2 py-4 w-100">

                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center gap-2">
                                        <!--begin::Title-->


                                    </div>

                                    <!--end::Page title-->
                                    <!--begin::Actions-->

                                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        @if (empty($companies))
                                            <!-- Button trigger modal -->
                                            <button type="button" style="border: solid gray 1px; font-weight:bold"
                                                class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                + Complete data company
                                            </button>
                                        @endif

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Your
                                                            Company
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('store-company') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <label for="description" class="form-label">Description
                                                                Company</label>
                                                            <input type="text" name="description" id="description"
                                                                class="form-control" aria-describedby="description"
                                                                required>
                                                            <div style=text-align:end class="mt-5">
                                                                <button style="border: solid gray 1px" type="button"
                                                                    class="btn btn-outline-secondary btn-sm"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Save</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class="row row-cols-1 g-4">
                            <div class="card mb-3">
                                <img src="{{ asset('storage/' . $user->image_company) }}" class="card-img-top mt-2"
                                    alt="Product Image">
                                <div class="card-body">
                                    <h2 class="card-title" style="text-align: center">{{ $user->name_company }}</h2>
                                    <hr>
                                    <br>
                                    <h5 class="card-title">Email : <span
                                            style="font-style:italic">{{ $user->email }}</span></h5>
                                    <h5 class="card-title">Call Center : <span style="font-style: italic"><a
                                                href="https://wa.me/{{ $user->number_phone }}"
                                                class="btn btn-success btn-sm mb-3" target="_blank">Chat
                                                via WhatsApp</a></span></h5>

                                    <hr>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                    <h5 class="card-title" style="font-style:initial">📍 Location <a
                                            href="{{ $user->address }}" target="_blank">(Klik
                                            Maps)</a>
                                    </h5>
                                </div>
                                @if (empty($companies))
                                @else
                                    <div class="card-body" style="margin-top: -40px">
                                        <h4 class="card-text" style="text-align: justify">{{ $companies->description }}
                                        </h4>
                                    </div>
                                    <br>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
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
