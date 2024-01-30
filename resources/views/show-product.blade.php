@extends('layouts.master')

@section('content')
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Hero-->
        <div id="kt_app_hero" class="app-hero" style="margin-top: 50px">
            <!--begin::Hero container-->
            <div id="kt_app_hero_container" class="app-container container-xxl d-flex">
                <!--begin::Hero wrapper=-->
                <div class="d-flex flex-stack flex-wrap flex-lg-nowrap flex-row-fluid gap-4 gap-lg-10 mb-10">
                    <!--begin::Heading-->
                    <div class="d-flex align-items-center me-3">
                        <img alt="Logo" src="{{ asset('assets/media/svg/misc/layer.svg') }}" class="h-60px me-5" />
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                            CodeLab - Devs Team
                            <!--begin::Description-->
                            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Power Elite
                                Seller</span>
                            <!--end::Description-->
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Items-->
                    <div class="d-flex gap-4 gap-lg-13">
                        <!--begin::Item-->
                        <div class="d-flex flex-column">
                            <!--begin::Number-->
                            <span class="text-white fw-bold fs-3 mb-1">$23,467.92</span>
                            <!--end::Number-->
                            <!--begin::Section-->
                            <div class="text-white opacity-50 fw-bold">Avg. Monthly Sales</div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column">
                            <!--begin::Number-->
                            <span class="text-white fw-bold fs-3 mb-1">$1,748.03</span>
                            <!--end::Number-->
                            <!--begin::Section-->
                            <div class="text-white opacity-50 fw-bold">Today Spending</div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column">
                            <!--begin::Number-->
                            <span class="text-white fw-bold fs-3 mb-1">3.8%</span>
                            <!--end::Number-->
                            <!--begin::Section-->
                            <div class="text-white opacity-50 fw-bold">Overall Share</div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column">
                            <!--begin::Number-->
                            <span class="text-white fw-bold fs-3 mb-1">-7.4%</span>
                            <!--end::Number-->
                            <!--begin::Section-->
                            <div class="text-white opacity-50 fw-bold">7 Days</div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
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
                                        <span class="menu-title">Transportation</span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="app-toolbar-wrapper d-flex align-items-center flex-stack flex-wrap gap-2 py-4 w-100">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center gap-2 me-3">
                                    <!--begin::Title-->
                                    <h1
                                        class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 m-0">
                                        Details product
                                    </h1>
                                </div>
                                <!--begin::Actions-->
                            </div>
                        </div>
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">
                            <div style="padding: 15px 20px 0px 20px">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="card-title">{{ $product->merk }} {{ $product->model }} -
                                            {{ $product->years_output }}</h2>
                                    </div>
                                    <div class="col" style="text-align: end">
                                        @if ($product->status == 1)
                                            <span class="badge badge-light-success fw-bold text-span">Available</span>
                                        @else
                                            <span class="badge badge-light-warning fw-bold text-span">Not
                                                Available</span>
                                        @endif
                                    </div>
                                </div>
                                <p class="card-text" style="text-align: justify">{{ $product->description }}
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped table-hover table-bordered">
                                            <tr>
                                                <th style="width:50%">Price</th>
                                                <td>Rp. {{ number_format($product->price, 2, ',', '.') }} / day</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Model</th>
                                                <td>{{ $product->model }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Merk</th>
                                                <td>{{ $product->merk }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Color</th>
                                                <td>{{ $product->color }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Years</th>
                                                <td>{{ $product->years_output }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Type</th>
                                                <td>{{ $product->type }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table class="table table-striped table-hover table-bordered">
                                            <tr>
                                                <th style="width:50%">Transmition</th>
                                                <td>{{ $product->transmition }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Speed</th>
                                                <td>{{ $product->speed }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Fuel</th>
                                                <td>{{ $product->fuel }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Email</th>
                                                <td>{{ $product->company->email }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Owner</th>
                                                <td>{{ $product->company->name }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Location</th>
                                                <td>{{ $product->location }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-5 mb-9">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Order</button>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation your data
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store-message') }}" method="post"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="text" id="company_id"
                                                    value="{{ $product->company->id }}" name="company_id"
                                                    class="form-control" aria-describedby="name" style="display: none"
                                                    readonly>
                                                <input type="text" id="product_id" value="{{ $product->id }}"
                                                    name="product_id" class="form-control" aria-describedby="name"
                                                    style="display: none" readonly>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    aria-describedby="name" required>
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    aria-describedby="name" required>
                                                <label for="number_phone" class="form-label">No. Whatsapp</label>
                                                <input type="number" id="number_phone" name="number_phone"
                                                    class="form-control" aria-describedby="name" required>
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" id="address" name="address" class="form-control"
                                                    aria-describedby="name">
                                                <label for="time_rent" class="form-label">Long Rent</label>
                                                <input type="number" id="time_rent" name="time_rent"
                                                    class="form-control" aria-describedby="name">
                                                <label for="product_rent" class="form-label">Model</label>
                                                <input type="text" id="product_rent" value="{{ $product->model }}"
                                                    name="product_rent" class="form-control" aria-describedby="name"
                                                    readonly>
                                                <label for="plat_rent" class="form-label">Number Police</label>
                                                <input type="text" id="plat_rent" value="{{ $product->plat }}"
                                                    name="plat_rent" class="form-control" aria-describedby="name"
                                                    readonly>
                                                <div style=text-align:end class="mt-5">
                                                    <button style="border: solid gray 1px" type="button"
                                                        class="btn btn-outline-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Save
                                                        changes</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if ($product->company)
                                <small class="text-body-secondary">{{ $product->company->name }}</small>
                                <br>
                            @endif
                            <small class="text-body-secondary">Created at
                                {{ $product->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_footer"
                class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-gray-400 fw-semibold me-1">2023&copy;</span>
                    <a href="" target="_blank" class="text-gray-400 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-400 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link px-2">Purchase</a>
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
