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
                                        <span class="menu-title">Customer Orders</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No</th>
                                        <th style="text-align: center; vertical-align:middle">Name</th>
                                        <th style="text-align: center; vertical-align:middle">Email</th>
                                        <th style="text-align: center; vertical-align:middle">No. Whatsapp</th>
                                        <th style="text-align: center; vertical-align:middle">Status</th>
                                        <th style="text-align: center; vertical-align:middle">Action</th>
                                    </tr>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle">{{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">{{ $message->name }}</td>
                                            <td style="text-align: center; vertical-align:middle">{{ $message->email }}</td>
                                            <td style="text-align: center; vertical-align:middle">
                                                {{ $message->number_phone }}
                                            <td style="text-align: center; vertical-align:middle">
                                                @if ($message->product->status == 1)
                                                    <span class="badge badge-light-danger fw-bold text-span">Waiting
                                                        Confirmation</span>
                                                @else
                                                    <span class="badge badge-light-success fw-bold text-span">Accept</span>
                                                @endif
                                            </td>
                                            <td style="width:15%" class="td-button">
                                                <div class="button-container">
                                                    <button type="button" class="btn btn-primary btn-sm m-button"
                                                        data-toggle="modal" data-target="#editModal{{ $message->id }}">
                                                        Show
                                                    </button>
                                                    <form action="{{ route('delete-order', $message) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm m-button">Delete</button>
                                                    </form>
                                                </div>
                                                <div class="modal" id="editModal{{ $message->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Details Order</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <form action="" method="post"
                                                                            enctype="multipart/form-data">
                                                                            @method('patch')
                                                                            @csrf
                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Name</label>
                                                                            </div>
                                                                            <input name="name"
                                                                                class="form-control mt-1 mb-3"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->name }}" readonly>
                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Email</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="email"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->email }}" readonly>
                                                                            <div style="text-align: left">
                                                                                <label for="plat" class="form-label">No.
                                                                                    Whatsapp</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="number_phone"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->number_phone }}"
                                                                                readonly>
                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Address</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="address"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->address }}" readonly>

                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Product</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="product_rent"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->product_rent }}">
                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Number
                                                                                    Police</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="plat_rent"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->plat_rent }}"
                                                                                readonly>
                                                                            <div style="text-align: left">
                                                                                <label for="site"
                                                                                    class="form-label">Long
                                                                                    Rent Day</label>
                                                                            </div>
                                                                            <input class="form-control mt-1 mb-3"
                                                                                type="text" name="time_rent"
                                                                                aria-label="default input example"
                                                                                value="{{ $message->time_rent }} day"
                                                                                readonly>
                                                                            <div class="mt-7" style="text-align:end">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
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
