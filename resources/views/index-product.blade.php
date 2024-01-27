@extends('layouts.master')

@section('content')
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Hero-->
        <div id="kt_app_hero" class="app-hero py-6">
            <!--begin::Hero container-->
            <div id="kt_app_hero_container" class="app-container container-xxl d-flex">
                <!--begin::Hero wrapper=-->
                <div class="d-flex flex-stack flex-wrap flex-lg-nowrap flex-row-fluid gap-4 gap-lg-10 mb-10">
                    <!--begin::Heading-->
                    <div class="d-flex align-items-center me-3">
                        <img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
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
                                        <span class="menu-title">Car's</span>
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
                                        Currently Available
                                        <!--begin::Description-->
                                        <span class="page-desc text-muted fs-7 fw-semibold"></span>
                                        <!--end::Description-->
                                    </h1>

                                </div>

                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    @if (Auth::check())
                                        <!-- Button trigger modal -->
                                        <button type="button" style="border: solid gray 1px; font-weight:bold"
                                            class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            + Add Product
                                        </button>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add your product
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                @if ($userCompanies->isEmpty())
                                                    <div class="alert alert-danger"
                                                        style="margin: 15px 30px; text-align:center">
                                                        Your not have company. Please create a company first!
                                                    </div>
                                                @else
                                                    <form action="{{ route('store-product') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <label for="company_id" class="form-label">Company:</label>
                                                            <select name="company_id" class="form-select"
                                                                aria-label="Default select example" required>
                                                                @foreach ($userCompanies as $company)
                                                                    <option value="{{ $company->id }}">{{ $company->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>


                                                            <label for="name" class="form-label">Name Product</label>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" aria-describedby="name" required>
                                                            <label for="years_output" class="form-label">Years Output
                                                                Product</label>
                                                            <input type="number" name="years_output" id="years_output"
                                                                class="form-control" aria-describedby="passwordHelpBlock"
                                                                required>
                                                            <label for="color" class="form-label">Color</label>
                                                            <input type="text" id="color" name="color"
                                                                class="form-control" aria-describedby="text" required>
                                                            <label for="description" class="form-label">Description
                                                                Product</label>
                                                            <input type="text" name="description" id="description"
                                                                class="form-control" aria-describedby="passwordHelpBlock"
                                                                required>
                                                            <label for="location" class="form-label">Location</label>
                                                            <input type="text" name="location" id="location"
                                                                class="form-control" aria-describedby="passwordHelpBlock"
                                                                required>
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="number" id="price" name="price"
                                                                class="form-control" aria-describedby="passwordHelpBlock"
                                                                required>
                                                            <label for="image" class="form-label">Upload Image</label>
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($products as $product)
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/' . $product->image) }}" height="375"
                                            class="card-img-top" alt="Product Image">
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $product->name }} - {{ $product->years_output }}</h2>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <p>Location : {{ $product->location }}</p>
                                            <h4>Price: Rp.{{ number_format($product->price, 2, ',', '.') }}</h4>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto mb-5">
                                            <a href="/" class="btn btn-primary btn-sm">Booking now</a>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-body-secondary">Created at
                                                {{ $product->created_at }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="kt_app_footer"
                    class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-gray-400 fw-semibold me-1">2023&copy;</span>
                        <a href="https://keenthemes.com" target="_blank"
                            class="text-gray-400 text-hover-primary">Keenthemes</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-400 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
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
