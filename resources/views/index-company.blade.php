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
                            <div
                                class="app-toolbar-wrapper d-flex align-items-center flex-stack flex-wrap gap-2 py-4 w-100">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center gap-2">
                                    <!--begin::Title-->


                                </div>

                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    @if ($companies->count() === 0)
                                        <!-- Button trigger modal -->
                                        <button type="button" style="border: solid gray 1px; font-weight:bold"
                                            class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            New Company
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
                                                        <label for="name" class="form-label">Name Company</label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control" aria-describedby="name" required>
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control" aria-describedby="address" required>
                                                        <label for="description" class="form-label">Description
                                                            Company</label>
                                                        <input type="text" name="description" id="description"
                                                            class="form-control" aria-describedby="description" required>
                                                        <label for="email" class="form-label">Email Company</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" aria-describedby="email" required>
                                                        <label for="number_phone" class="form-label">Number Phone
                                                            Company</label>
                                                        <input type="text" name="number_phone" id="number_phone"
                                                            class="form-control" aria-describedby="passwordHelpBlock"
                                                            required>
                                                        <label for="image" class="form-label">Upload Image Your
                                                            Company</label>
                                                        <input type="file" name="image" id="image"
                                                            class="form-control" aria-describedby="passwordHelpBlock"
                                                            required>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
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
                                @if ($companies)
                                    @if ($companies->count() === null)
                                        <p>Nothing</p>
                                    @else
                                        <img src="{{ asset('storage/' . $companies->image) }}" class="card-img-top mt-2"
                                            alt="Product Image">
                                        <div class="card-body">
                                            <h2 class="card-title" style="text-align: center">{{ $companies->name }}</h2>
                                            <hr>
                                            <p class="card-text" style="text-align: justify">{{ $companies->description }}
                                            </p>
                                            <br>
                                            <h4>Untuk Info Lebih Lanjut, Silahkan Hubungi Kami :</h4>
                                            <br>
                                            <h5 class="card-title">Email : <span
                                                    style="font-style:italic">{{ $companies->email }}</span></h5>
                                            <h5 class="card-title">Call Center : <span
                                                    style="font-style: italic">{{ $companies->number_phone }}</span></h5>

                                            <hr>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                    ago</small></p>
                                            <h5 class="card-title" style="font-style:initial">📍 {{ $companies->address }}
                                            </h5>
                                        </div>
                                    @endif
                                @else
                                    <h4 style="text-align: center" class="m-3">No Data</h4>
                                @endif
                            </div>
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
