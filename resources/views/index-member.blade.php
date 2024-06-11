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
                                        <span class="menu-title">List Member</span>
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
                                        <th style="text-align: center; vertical-align:middle">Roles</th>
                                        <th style="text-align: center; vertical-align:middle">Name Company</th>
                                        <th style="text-align: center; vertical-align:middle">Created_at</th>
                                        <th style="text-align: center; vertical-align:middle">Status</th>
                                        <th style="text-align: center; vertical-align:middle">Action</th>
                                    </tr>
                                <tbody>
                                    @if ($members->isEmpty())
                                        <p style="text-align: center">Nothing Member.</p>
                                    @else
                                        @foreach ($members as $member)
                                            <tr>
                                                <td style="text-align: center; vertical-align:middle">{{ $loop->iteration }}
                                                </td>
                                                <td style="text-align: center; vertical-align:middle">{{ $member->name }}
                                                </td>
                                                <td style="text-align: center; vertical-align:middle">{{ $member->roles }}
                                                </td>
                                                <td style="text-align: center; vertical-align:middle">
                                                    {{ $member->name_company }}
                                                </td>
                                                <td style="text-align: center; vertical-align:middle">
                                                    {{ $member->created_at }}
                                                </td>
                                                <td style="text-align: center; vertical-align:middle">
                                                    @if ($member->status == 1)
                                                        <span
                                                            class="badge badge-light-success fw-bold text-span">Verified</span>
                                                    @elseif($member->status == 0)
                                                        <span class="badge badge-light-warning fw-bold text-span">Waiting
                                                            Verification</span>
                                                    @endif
                                                </td>

                                                <td style="width:14%" class="td-button">
                                                    <div class="button-container">
                                                        @if ($member->status == 0)
                                                            <button type="button" class="btn btn-primary btn-sm m-button"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $member->id }}">
                                                                Edit
                                                            </button>
                                                        @endif
                                                        <form action="{{ route('delete-member', $member) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm m-button">Delete</button>
                                                        </form>
                                                    </div>
                        </div>
                        <div class="modal" id="editModal{{ $member->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Update
                                            Status Member</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <form action="{{ route('update-member', $member) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @method('patch')
                                                    @csrf
                                                    <div style="text-align: left">
                                                        <label for="site" class="form-label">Status member</label>
                                                    </div>
                                                    <select class="form-select mt-1 mb-1"
                                                        aria-label="Default select example" name="status">
                                                        @if ($member->status == '0')
                                                            <option value="1" selected>Active</option>
                                                            <option value="0" disabled>Waiting Verification</option>
                                                        @else
                                                            <option value="1" disabled>Active</option>
                                                            <option value="0" selected>Waiting Verification</option>
                                                        @endif
                                                    </select>
                                            </div>
                                        </div>
                                        <div style=text-align:end class="mt-5">
                                            <button style="border: solid gray 1px" type="button"
                                                class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
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
                        @endif
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
