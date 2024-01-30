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
                                        <span class="menu-title">My Products</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th style="text-align: center; vertical-align:middle">No</th>
                                    <th style="text-align: center; vertical-align:middle">Model</th>
                                    <th style="text-align: center; vertical-align:middle">Merk</th>
                                    <th style="text-align: center; vertical-align:middle">Number Police</th>
                                    <th style="text-align: center; vertical-align:middle">Transmition</th>
                                    <th style="text-align: center; vertical-align:middle">Color</th>
                                    <th style="text-align: center; vertical-align:middle">Years</th>
                                    <th style="text-align: center; vertical-align:middle">Price</th>
                                    <th style="text-align: center; vertical-align:middle">Status</th>
                                    <th style="text-align: center; vertical-align:middle">Action</th>
                                </tr>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td style="text-align: center; vertical-align:middle">{{ $loop->iteration }}</td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->model }}</td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->merk }}</td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->plat }}
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->transmition }}
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->color }}</td>
                                        <td style="text-align: center; vertical-align:middle">{{ $product->years_output }}
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td style="text-align: center; vertical-align:middle">
                                            @if ($product->status == 1)
                                                <span class="badge badge-light-success fw-bold text-span">Available</span>
                                            @else
                                                <span class="badge badge-light-warning fw-bold text-span">Not
                                                    Available</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <div class="row">
                                                <div class="col p-0 m-0"><button type="button"
                                                        class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $product->id }}">
                                                        Edit
                                                    </button></div>
                                                <div class="col p-0 m-0">
                                                    <form action="{{ route('delete-product', $product) }}"
                                                        style="margin: 0px -5px 0px -17px" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal" id="editModal{{ $product->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Update
                                                                Product</h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <form action="{{ route('update-data', $product) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @method('patch')
                                                                        @csrf
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Model</label>
                                                                        </div>
                                                                        <input name="model" class="form-control mt-1 mb-3"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->model }}">
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Merk</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3" type="text"
                                                                            name="merk"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->merk }}">
                                                                        <div style="text-align: left">
                                                                            <label for="plat" class="form-label">Number
                                                                                Police</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3" type="text"
                                                                            name="plat"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->plat }}">
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Type</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="type"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->type }}">

                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Speed</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="speed"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->speed }}">
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Transmition</label>
                                                                        </div>
                                                                        <select class="form-select mt-1 mb-1"
                                                                            aria-label="Default select example"
                                                                            name="transmition">
                                                                            <option selected>
                                                                                @if ($product->transmition == 'AT / Automatic Gear')
                                                                                    AT / Automatic Gear
                                                                                @else
                                                                                    MT / Manual Gear
                                                                                @endif
                                                                            </option>
                                                                            @if ($product->transmition == 'AT / Automatic Gear')
                                                                                <option value="MT / Manual Gear">MT /
                                                                                    Manual Gear
                                                                                </option>
                                                                            @else
                                                                                <option value="AT / Automatic Gear">AT /
                                                                                    Automatic Gear
                                                                                </option>
                                                                            @endif
                                                                        </select>
                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Color</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="color"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->color }}">
                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Fuel</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="fuel"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->fuel }}">
                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Years</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="number" name="years_output"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->years_output }}">
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Description</label>
                                                                        </div>
                                                                        <input name="description"
                                                                            value="{{ $product->description }}"
                                                                            class="form-control mt-1 mb-3"
                                                                            id="floatingTextarea">
                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Location</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="location"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->location }}">
                                                                        <div style="text-align: left">
                                                                            <label for="name"
                                                                                class="form-label">Price</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="number" name="price"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->price }}">
                                                                        <div style="text-align: left">
                                                                            <label for="site"
                                                                                class="form-label">Status</label>
                                                                        </div>
                                                                        <select class="form-select mt-1 mb-1"
                                                                            aria-label="Default select example"
                                                                            name="status">
                                                                            @if ($product->status == '1')
                                                                                <option value="1" selected>
                                                                                    Available
                                                                                </option>
                                                                            @else
                                                                                <option value="0" selected>
                                                                                    Not Available
                                                                                </option>
                                                                            @endif

                                                                            @if ($product->status == '1')
                                                                                <option value="0"> Not Available
                                                                                </option>
                                                                            @elseif($product->status == '0')
                                                                                <option value="1"> Available
                                                                                </option>
                                                                            @endif
                                                                        </select>
                                                                        <div style="text-align: left">
                                                                            <label for="created_at"
                                                                                class="form-label">Created at</label>
                                                                        </div>
                                                                        <input class="form-control mt-1 mb-3"
                                                                            type="text" name="created_at"
                                                                            aria-label="default input example"
                                                                            value="{{ $product->created_at }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div style=text-align:end class="mt-5">
                                                                <button style="border: solid gray 1px" type="button"
                                                                    class="btn btn-outline-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
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
