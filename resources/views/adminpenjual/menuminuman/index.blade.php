<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack --> @include('layouts.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header--> @include('layouts.header')
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap gap-2">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bold m-0 fs-3"> Daftar Minuman </h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-gray-600">
                                    <a href="/" class="text-gray-600 text-hover-primary"> Beranda</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-gray-600"> Daftar minuman</li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center">
                            <!--begin::Button-->
                            <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_card"> Tambah daftar minuman</a>
                            <!--end::Button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9">
                            @foreach ($data as $data)
                                <!--begin::Col-->
                                <div class="col-sm-6 col-xl-4">
                                    <!--begin::Card-->
                                    <div class="card h-100 px-9 pt-6 pb-8">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex p-0 mb-3">
                                            <div class="image-food symbol">
                                                <img class="p-3 bg-abu symbol"
                                                    src="{{ asset('images/drinkimg/' . $data->foto_minuman) }}"
                                                    alt="">
                                            </div>
                                            <div class="desc-food w-100">
                                                <div class="fs-1 fw-bold mb-2 ms-3">{{ $data->nama_minuman }}</div>
                                                <label
                                                    class="fs-4 ms-3 fw-semibold text-hover-primary text-gray-600 m-0">Rp.{{ number_format($data->harga, 0, ',', '.') }}</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center fw-semibold">
                                            {{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
                                            @if ($data->status == "tersedia")
											<div class="badge badge-light-success px-3 py-2 me-2">{{$data->status}}</div>
                                            @else
											<div class="badge badge-light-danger px-3 py-2 me-2">{{$data->status}}</div>
                                            @endif
                                            {{-- <span class="text-gray-400 fs-7">Impressions</span> --}}
                                            <div class="action">
                                                <a href="#" class="badge badge-primary cur-p"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modaledit{{ $data->id }}">Edit</a>
                                                <a href="#" class="badge badge-danger cur-p delete"
                                                    data-id="{{ $data->id }}"
                                                    data-name="{{ $data->nama_minuman }}">Hapus</a>
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                        <!--begin::Card footer-->
                                        <!--end::Card footer-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                                <!--start::Modal Edit-->
                                <div class="modal fade" id="modaledit{{ $data->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2>Edit Menu Minuman</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="17.3137"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_new_card_form" class="form needs-validation"
                                                    method="POST" action="/daftar-minumanedit/{{ $data->id }}"
                                                    novalidate="novalidate" enctype="multipart/form-data"> @csrf
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-0 fv-row">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Foto Minuman</span>
                                                            {{-- <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                            title="Masukkan nama kategori seperti contoh dibawah ini"></i> --}}
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-empty w-fc image-input-outline image-input-placeholder mb-4"
                                                            data-kt-image-input="true">
                                                            <!--begin::Image preview wrapper-->
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                style="background-image: url({{ asset('images/drinkimg/' . $data->foto_minuman) }})">
                                                            </div>
                                                            <!--end::Image preview wrapper-->
                                                            <!--begin::Edit button-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Masukkan Foto Minuman Disini">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input id="img_input" type="file"
                                                                    name="foto_minuman" accept=".png, .jpg, .jpeg" />
                                                                <div class="invalid-feedback"> Harap isi bidang ini
                                                                </div>
                                                                <input type="hidden" name="foto_makanan_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->
                                                            <!--begin::Cancel button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel button-->
                                                            <!--begin::Remove button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove button-->
                                                        </div>
                                                        <!--end::Image input-->
                                                        <!--begin::Label-->
                                                        <label
                                                            class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Nama Minuman</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                data-bs-toggle="tooltip"
                                                                title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <div class="input-group mb-5">
                                                            <input type="text"
                                                                class="form-control form-control-solid"
                                                                placeholder="Es syntax" name="nama_minuman"
                                                                value="{{ $data->nama_minuman }}" required />
                                                            <div class="invalid-feedback"> Harap isi bidang ini </div>
                                                        </div>
                                                        <!--begin::Label-->
                                                        <label
                                                            class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Harga</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                data-bs-toggle="tooltip"
                                                                title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <div class="input-group mb-5">
                                                            <span class="input-group-text border-0">Rp.</span>
                                                            <input type="text" id="harga_makanan"
                                                                class="form-control form-control-solid harga_makanan"
                                                                placeholder="10.000" name="harga"
                                                                value="{{ $data->harga }}" required />
                                                            <div class="invalid-feedback"> Harap isi bidang ini </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" id="kt_modal_new_card_cancel"
                                                            class="btn btn-light me-3"> Batal </button>
                                                        <button type="submit" id="kt_modal_new_card_submit"
                                                            class="btn btn-primary">
                                                            <span class="indicator-label"> Kirim </span>
                                                            <span class="indicator-progress"> Please wait... <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal Edit-->
                            @endforeach
                            <!--begin::Col-->
                            <div class="col-sm-6 col-xl-4">
                                <!--begin::Card-->
                                <div class="card h-100 px-9 pt-6 pb-8">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex p-0 mb-3">
                                        <div class="image-food symbol">
                                            <img class="p-3 bg-abu symbol"
                                                src="{{ asset('templateuser/assets/images/food/pic1.png') }}"
                                                alt="">
                                        </div>
                                        <div class="desc-food w-100">
                                            <div class="fs-1 fw-bold mb-2 ms-3">Kopi GodDay</div>
                                            <label
                                                class="fs-4 ms-3 fw-semibold text-hover-primary text-gray-600 m-0">Rp.3.000</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center fw-semibold">
                                        {{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
                                        <div class="badge badge-light-danger px-3 py-2 me-2">Tidak tersedia</div>
                                        {{-- <span class="text-gray-400 fs-7">Impressions</span> --}}
                                        <div class="action">
                                            <span class="badge badge-primary">Edit</span>
                                            <span class="badge badge-danger">Hapus</span>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <!--end::Card footer-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Pagination-->
                        <!--end::Pagination-->
                        <!--begin::Modals-->
                        <!--begin::Modal - Offer A Deal-->
                        <!--end::Modal - Offer A Deal-->
                        <!--end::Modals-->
                    </div>
                </div>
                <!--end::Container-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class=" container-xxl  d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2023&copy;</span>
                            <a href="https://keenthemes.com/" target="_blank"
                                class="text-gray-800 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://devs.keenthemes.com/" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank"
                                    class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none border-0 rounded-0">
            <!--begin::Header-->
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bold text-dark">Activity Logs</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_activities_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body position-relative" id="kt_activities_body">
                <!--begin::Content-->
                <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
                    data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                    data-kt-scroll-offset="5px">
                    <!--begin::Timeline items-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                fill="currentColor" />
                                            <path
                                                d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2">There are 2 new tasks for you in “AirPlus Mobile
                                        App” project:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="../../../assets/media/avatars/300-14.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Record-->
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                        <!--begin::Title-->
                                        <a href="../../../apps/projects/project.html"
                                            class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Meeting
                                            with customer</a>
                                        <!--end::Title-->
                                        <!--begin::Label-->
                                        <div class="min-w-175px pe-2">
                                            <span class="badge badge-light text-muted">Application Design</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Users-->
                                        <div
                                            class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="../../../assets/media/avatars/300-2.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="../../../assets/media/avatars/300-14.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <div
                                                    class="symbol-label fs-8 fw-semibold bg-primary text-inverse-primary">
                                                    A</div>
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Progress-->
                                        <div class="min-w-125px pe-2">
                                            <span class="badge badge-light-primary">In Progress</span>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Action-->
                                        <a href="../../../apps/projects/project.html"
                                            class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Record-->
                                    <!--begin::Record-->
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
                                        <!--begin::Title-->
                                        <a href="../../../apps/projects/project.html"
                                            class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Project
                                            Delivery Preparation</a>
                                        <!--end::Title-->
                                        <!--begin::Label-->
                                        <div class="min-w-175px">
                                            <span class="badge badge-light text-muted">CRM System Development</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Users-->
                                        <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="../../../assets/media/avatars/300-20.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <div
                                                    class="symbol-label fs-8 fw-semibold bg-success text-inverse-primary">
                                                    B</div>
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Progress-->
                                        <div class="min-w-125px">
                                            <span class="badge badge-light-success">Completed</span>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Action-->
                                        <a href="../../../apps/projects/project.html"
                                            class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Record-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                fill="currentColor" />
                                            <path
                                                d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n2">
                                <!--begin::Timeline heading-->
                                <div class="overflow-auto pe-3">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2">Invitation for crafting engaging designs that
                                        speak human workshop</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
                                            <img src="../../../assets/media/avatars/300-1.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="mb-5 pe-3">
                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3
                                        New Incoming Project Files:</a>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
                                            <img src="../../../assets/media/avatars/300-23.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3"
                                                src="../../../assets/media/svg/files/pdf.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-semibold">
                                                <!--begin::Desc-->
                                                <a href="../../../apps/projects/project.html"
                                                    class="fs-6 text-hover-primary fw-bold">Finance KPI App
                                                    Guidelines</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">1.9mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--begin::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="/metronic8/demo20/../demo20/apps/projects/project.html"
                                                class="w-30px me-3" src="../../../assets/media/svg/files/doc.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-semibold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT
                                                    Testing Results</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">18kb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center">
                                            <!--begin::Icon-->
                                            <img alt="/metronic8/demo20/../demo20/apps/projects/project.html"
                                                class="w-30px me-3" src="../../../assets/media/svg/files/css.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-semibold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bold">Finance
                                                    Reports</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">20mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                fill="currentColor" />
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2"> Task <a href="#"
                                            class="text-primary fw-bold me-1">#45890</a> merged with <a href="#"
                                            class="text-primary fw-bold me-1">#45890</a> in “Ads Pro Admin Dashboard
                                        project: </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="../../../assets/media/avatars/300-14.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
                                            <img src="../../../assets/media/avatars/300-2.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="../../../assets/media/stock/600x400/img-29.jpg" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="../../../assets/media/stock/600x400/img-31.jpg" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-150px"
                                                    src="../../../assets/media/stock/600x400/img-40.jpg" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#"
                                                    class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2"> New case <a href="#"
                                            class="text-primary fw-bold me-1">#67890</a> is assigned to you in
                                        Multi-platform Database Design project </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="overflow-auto pb-5">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <a href="#" class="text-primary fw-bold me-1">Alice Tan</a>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2">You have received a new order:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
                                            <img src="../../../assets/media/avatars/300-4.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">Database Backup Process Completed!
                                                </h4>
                                                <div class="fs-6 text-gray-700 pe-7">Login into Admin Dashboard to make
                                                    sure the data integrity is OK</div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-primary px-6 align-self-center text-nowrap"> Proceed
                                            </a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2"> New order <a href="#"
                                            class="text-primary fw-bold me-1">#67890</a> is placed for Workshow
                                        Planning & Budget Estimation </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <a href="#" class="text-primary fw-bold me-1">Jimmy Bold</a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                    </div>
                    <!--end::Timeline items-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-5 text-center" id="kt_activities_footer">
                <a href="../../../pages/user-profile/activity.html" class="btn btn-bg-body text-primary"> View All
                    Activities
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                            <path
                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </div>
            <!--end::Footer-->
        </div>
    </div>
    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->
    <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
        <!--begin::Messenger-->
        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                            Cox</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-semibold text-muted">Active</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <div class="me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="bi bi-three-dots fs-3"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase"> Contacts </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search"> Add Contact </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends"> Invite Contacts <i
                                        class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a contact email to send an invitation"></i>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon"> Create Group </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon"> Invite Members </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon"> Settings </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                    title="Coming soon"> Settings </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                    </div>
                    <!--end::Menu-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text"> How likely are you to recommend our company to your
                                friends and family ? </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                    <a href="#"
                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                data-kt-element="message-text"> Hey there, we’re just writing to let you know that
                                you’ve been subscribed to a repository on GitHub. </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text"> Ok, Understood! </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                data-kt-element="message-text"> You’ll receive notifications for all issues, pull
                                requests! </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text"> You can unwatch this repository immediately by clicking
                                here: <a href="https://keenthemes.com/">Keenthemes.com</a>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                data-kt-element="message-text"> Most purchased Business courses during this sale!
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10 ">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text"> Company BBQ to celebrate the last quater achievements
                                and goals. Food and drinks provided </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(template for out)-->
                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                    <a href="#"
                                        class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                data-kt-element="message-text"></div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for out)-->
                    <!--begin::Message(template for in)-->
                    <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol  symbol-35px symbol-circle ">
                                    <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text"> Right before vacation season we have the next Big Deal
                                for you. </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for in)-->
                </div>
                <!--end::Messages-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <!--begin::Input-->
                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                    placeholder="Type a message"></textarea>
                <!--end::Input-->
                <!--begin:Toolbar-->
                <div class="d-flex flex-stack">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <!--begin::Send-->
                    <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                    <!--end::Send-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>
    <!--end::Chat drawer-->
    <!--begin::Chat drawer-->
    <div id="kt_shopping_cart" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="cart"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_shopping_cart_toggle" data-kt-drawer-close="#kt_drawer_shopping_cart_close">
        <!--begin::Messenger-->
        <div class="card card-flush w-100 rounded-0">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Title-->
                <h3 class="card-title text-gray-900 fw-bold">Shopping Cart</h3>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_shopping_cart_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body hover-scroll-overlay-y h-400px pt-5">
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">Iblender</a>
                            <span class="text-gray-400 fw-semibold d-block">The best kitchen gadget in 2022</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 350</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">5</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-1.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">SmartCleaner</a>
                            <span class="text-gray-400 fw-semibold d-block">Smart tool for cooking</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 650</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">4</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-3.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">CameraMaxr</a>
                            <span class="text-gray-400 fw-semibold d-block">Professional camera for edge</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 150</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">3</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-8.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                            <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 1450</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">7</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-26.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">MotionWire</a>
                            <span class="text-gray-400 fw-semibold d-block">Perfect animation tool</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 650</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">7</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-21.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">Samsung</a>
                            <span class="text-gray-400 fw-semibold d-block">Profile info,Timeline etc</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 720</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">6</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-34.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column me-3">
                        <!--begin::Section-->
                        <div class="mb-3">
                            <a href="../../../apps/ecommerce/sales/details.html"
                                class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                            <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 fs-5">$ 430</span>
                            <span class="text-muted mx-2">for</span>
                            <span class="fw-bold text-gray-800 fs-5 me-3">8</span>
                            <a href="#"
                                class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                            height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                            fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Pic-->
                    <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                        <img src="../../../assets/media/stock/600x400/img-27.jpg" alt="" />
                    </div>
                    <!--end::Pic-->
                </div>
                <!--end::Item-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer">
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <span class="fw-bold text-gray-600">Total</span>
                    <span class="text-gray-800 fw-bolder fs-5">$ 1840.00</span>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <span class="fw-bold text-gray-600">Sub total</span>
                    <span class="text-primary fw-bolder fs-5">$ 246.35</span>
                </div>
                <!--end::Item-->
                <!--end::Action-->
                <div class="d-flex justify-content-end mt-9">
                    <a href="#" class="btn btn-primary d-flex justify-content-end">Pleace Order</a>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>
    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--end::Main-->
    <!--begin::Engage-->
    <!--end::Engage-->
    <!--begin::Engage modals-->
    <!--begin::Modal - Sitemap-->
    <div class="modal fade bg-dark bg-opacity-75" id="kt_app_engage_prebuilts_modal" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-5 p-lg-10" id="kt_engage_prebuilts_modal_dialog">
            <!--begin::Modal content-->
            <div class="modal-content rounded-4">
                <!--begin::Modal header-->
                <div class="modal-header flex-stack border-0 px-10 pt-5 pb-0" id="kt_engage_prebuilts_header">
                    <!--begin::View menu-->
                    <div id="kt_app_engage_prebuilts_view_menu" class="position-relative z-index-1">
                        <!--begin::Toggle-->
                        <button type="button" data-kt-element="selected" class="btn btn-flex px-0 rotate-"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, -1px">
                            <!--begin::Title-->
                            <span class="fs-6 fw-bold text-gray-600 me-2" data-kt-element="title"> Image View
                            </span>
                            <!--end::Title-->
                            <!--begin::Arrow-->
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-4 svg-icon-gray-600 rotate-180-">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Arrow-->
                        </button>
                        <!--end::Toggle-->
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-active-bg menu-state-primary menu-gray-600 menu-rounded w-150px py-3 px-3"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item">
                                <!--begin::Menu link-->
                                <a href="#" class="menu-link px-4 py-2 active" data-kt-mode="image"> Image
                                    View </a>
                                <!--end::Menu link-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item">
                                <!--begin::Menu link-->
                                <a href="#" class="menu-link px-4 py-2" data-kt-mode="text"> Text View </a>
                                <!--end::Menu link-->
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::View menu-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary me-n2 position-relative z-index-1"
                        data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen034.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20"
                                    height="20" rx="5" fill="currentColor" />
                                <rect x="7" y="15.3137" width="12" height="2"
                                    rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                <rect x="8.41422" y="7" width="12" height="2"
                                    rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-0 pb-5 px-15 mt-n5" id="kt_app_engage_prebuilts_body">
                    <div class="container-fluid">
                        <style>
                            .app-prebuilts-thumbnail {
                                border: 1px solid var(--kt-body-bg);
                                filter: drop-shadow(0px 0px 50px rgba(49, 52, 122, 0.12));
                            }
                        </style>
                        <!--begin::Image view-->
                        <div class="d-block" id="kt_app_engage_prebuilts_view_image">
                            <!--begin::Tabs wrapper-->
                            <div class="d-flex flex-center" id="kt_app_engage_prebuilts_view_image_tabs">
                                <!--begin::Tabs-->
                                <ul class="nav nav-tabs border-0 mb-5">
                                    <!--begin::Tab item-->
                                    <li class="nav-item px-2">
                                        <!--begin::Tab link-->
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-gray-800 fs-5 fw-bold
						"
                                            data-bs-toggle="tab" href="#kt_app_engage_prebuilts_tab_demos"> Layouts
                                        </a>
                                        <!--end::Tab link-->
                                    </li>
                                    <!--end::Tab item-->
                                    <!--begin::Tab item-->
                                    <li class="nav-item px-2">
                                        <!--begin::Tab link-->
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-gray-800 fs-5 fw-bold
						active"
                                            data-bs-toggle="tab" href="#kt_app_engage_prebuilts_tab_dashboards">
                                            Dashboards </a>
                                        <!--end::Tab link-->
                                    </li>
                                    <!--end::Tab item-->
                                    <!--begin::Tab item-->
                                    <li class="nav-item px-2">
                                        <!--begin::Tab link-->
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-gray-800 fs-5 fw-bold
						"
                                            data-bs-toggle="tab" href="#kt_app_engage_prebuilts_tab_pages"> Pages
                                        </a>
                                        <!--end::Tab link-->
                                    </li>
                                    <!--end::Tab item-->
                                    <!--begin::Tab item-->
                                    <li class="nav-item px-2">
                                        <!--begin::Tab link-->
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-gray-800 fs-5 fw-bold
						"
                                            data-bs-toggle="tab" href="#kt_app_engage_prebuilts_tab_apps"> Apps </a>
                                        <!--end::Tab link-->
                                    </li>
                                    <!--end::Tab item-->
                                </ul>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Tabs wrapper-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <div class="pt-5 tab-pane fade " id="kt_app_engage_prebuilts_tab_demos"
                                    role="tabpanel">
                                    <!--begin::Scroll wrapper-->
                                    <div class="hover-scroll-y pe-12 me-n12" data-kt-scroll="true"
                                        data-kt-scroll-height="auto"
                                        data-kt-scroll-wrappers="#kt_app_engage_prebuilts_modal, #kt_app_engage_prebuilts_modal_dialog, #kt_app_engage_prebuilts_body"
                                        data-kt-scroll-dependencies="#kt_app_engage_prebuilts_header, #kt_app_engage_prebuilts_view_image_tabs"
                                        data-kt-scroll-offset="215px">
                                        <!--begin::Row-->
                                        <div class="row gy-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo1/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Metronic Original </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo1.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo2/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        SaaS App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo2.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo30/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Sales Tracking App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo30.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo39/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Billing SaaS </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo39.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo31/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Marketing Automation </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo31.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo27/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Databox Dashboard </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo27.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo6/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Time Reporting </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo6.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo3/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        New Trend </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo3.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo23/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Member Dashboard </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo23.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo38/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Email Marketing </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo38.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo36/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Digital Marketing </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo36.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo10/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Project Grid </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo10.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo35/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Traffic Analytics </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo35.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo8/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Analytics App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo8.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo25/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        User Guiding App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo25.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../index.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        CRM Software </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo20.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo7/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        CRM Dashboard </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo7.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo43/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Healthcare Dashboard </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo43.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo32/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Delivery Management </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo32.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo42/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Calendar Workspace </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo42.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo44/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Recruit Automation </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo44.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo33/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Social Campaings </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo33.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo37/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Cloud Suite </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo37.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo11/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Finance Planner </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo11.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo16/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Podcast App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo16.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo26/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Planable App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo26.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo22/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Media Publisher </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo22.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo19/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Reports Panel </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo19.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo40/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        HR App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo40.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo29/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Project Workspace </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo29.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo24/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Helpdesk App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo24.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo4/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Jobs Site </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo4.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo41/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Business Intelligence </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo41.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo18/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Goal Tracking </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo18.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo21/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Monochrome App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo21.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo34/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Finance Analytics </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo34.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo15/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Crypto Planner </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo15.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo14/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Project Workplace </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo14.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo9/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Sales Manager </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo9.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo5/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Support Forum </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo5.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo13/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Classic Dashboard </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo13.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo12/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Data Analyzer </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo12.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo48/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Cloud ERP </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo48.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo28/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        eCommerce App </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo28.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo17/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Events Scheduler </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo17.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="https://preview.keenthemes.com/metronic8/demo49/index.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        KPI Tracking </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/demos/demo49.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Scroll wrapper-->
                                </div>
                                <div class="pt-5 tab-pane fade show active"
                                    id="kt_app_engage_prebuilts_tab_dashboards" role="tabpanel">
                                    <!--begin::Scroll wrapper-->
                                    <div class="hover-scroll-y pe-12 me-n12" data-kt-scroll="true"
                                        data-kt-scroll-height="auto"
                                        data-kt-scroll-wrappers="#kt_app_engage_prebuilts_modal, #kt_app_engage_prebuilts_modal_dialog, #kt_app_engage_prebuilts_body"
                                        data-kt-scroll-dependencies="#kt_app_engage_prebuilts_header, #kt_app_engage_prebuilts_view_image_tabs"
                                        data-kt-scroll-offset="215px">
                                        <!--begin::Row-->
                                        <div class="row gy-10">
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../index.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Multipurpose </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/multipurpose-demo20.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/marketing.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Marketing </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/marketing.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/social.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Social </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/social.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/ecommerce.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Ecommerce </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/ecommerce.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/store-analytics.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Store-analytics </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/store-analytics.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/logistics.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Logistics </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/logistics.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/delivery.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Delivery </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/delivery.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/online-courses.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Online-courses </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/online-courses.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/school.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        School </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/school.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/crypto.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Crypto </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/crypto.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/finance-performance.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Finance-performance </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/finance-performance.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/website-analytics.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Website-analytics </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/website-analytics.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/bidding.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Bidding </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/bidding.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/podcast.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Podcast </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/podcast.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/projects.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Projects </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/projects.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/call-center.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Call-center </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/call-center.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4">
                                                <!--begin::Preview-->
                                                <a href="../../../dashboards/pos.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        POS </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/dashboards/pos.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Scroll wrapper-->
                                </div>
                                <div class="pt-5 tab-pane fade " id="kt_app_engage_prebuilts_tab_apps"
                                    role="tabpanel">
                                    <!--begin::Scroll wrapper-->
                                    <div class="hover-scroll-y pe-12 me-n12" data-kt-scroll="true"
                                        data-kt-scroll-height="auto"
                                        data-kt-scroll-wrappers="#kt_app_engage_prebuilts_modal, #kt_app_engage_prebuilts_modal_dialog, #kt_app_engage_prebuilts_body"
                                        data-kt-scroll-dependencies="#kt_app_engage_prebuilts_header, #kt_app_engage_prebuilts_view_image_tabs"
                                        data-kt-scroll-offset="215px">
                                        <!--begin::Row-->
                                        <div class="row gy-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/projects/list/list.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Projects </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/projects.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/ecommerce/catalog/products/products.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Ecommerce </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/ecommerce.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/customers/list/list.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Customers </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/customers.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/subscriptions/list/list.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Subscriptions </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/subscriptions.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/user-management/users/list/list.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        User Management </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/user-management.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/invoices/create/main.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Invoices </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/invoices.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/support-center/overview/main.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Support Center </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/support-center.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/chat/private.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Chat </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/chat.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/calendar/calendar.html" data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Calendar </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/calendar.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/file-manager/list/folders.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        File Manager </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/file-manager.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/inbox/listing/listing.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Inbox </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/inbox.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-4">
                                                <!--begin::Preview-->
                                                <a href="../../../apps/contacts/getting-started.html"
                                                    data-kt-href="true"
                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                    <!--begin::Title-->
                                                    <h3
                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                        Contacts </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Thumbnail-->
                                                    <span
                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/apps/contacts.png"
                                                            class="lozad w-100 rounded" />
                                                    </span>
                                                    <!--end::Thumbnail-->
                                                </a>
                                                <!--end::Preview-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Scroll wrapper-->
                                </div>
                                <div class="tab-pane fade" id="kt_app_engage_prebuilts_tab_pages">
                                    <!--begin::Tabs wrapper-->
                                    <div class="d-flex flex-center mb-5">
                                        <div class="border-bottom">
                                            <!--begin::Tabs-->
                                            <ul
                                                class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-6 fw-bold m-0 p-0 gap-4">
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						active"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_authentication">
                                                        Authentication </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_general"> General
                                                    </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_account"> Account
                                                    </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_modals"> Modals </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_wizards"> Wizards
                                                    </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_search"> Search </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_widgets"> Widgets
                                                    </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item p-0 m-0">
                                                    <!--begin::Tab link-->
                                                    <a class="nav-link text-muted text-active-primary pt-0 pb-4
						"
                                                        data-bs-toggle="tab"
                                                        href="#kt_app_engage_prebuilts_tab_pages_email-templates">
                                                        Email Templates </a>
                                                    <!--end::Tab link-->
                                                </li>
                                                <!--end::Tab item-->
                                            </ul>
                                            <!--end::Tabs-->
                                        </div>
                                    </div>
                                    <!--end::Tabs wrapper-->
                                    <!--begin::Scroll wrapper-->
                                    <div class="hover-scroll-y pe-12 me-n12" data-kt-scroll="true"
                                        data-kt-scroll-height="auto"
                                        data-kt-scroll-wrappers="#kt_app_engage_prebuilts_modal, #kt_app_engage_prebuilts_modal_dialog, #kt_app_engage_prebuilts_body, #kt_app_engage_prebuilts_view_image"
                                        data-kt-scroll-dependencies="#kt_app_engage_prebuilts_header, #kt_app_engage_prebuilts_view_text_heading"
                                        data-kt-scroll-offset="250px">
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active"
                                                id="kt_app_engage_prebuilts_tab_pages_authentication"
                                                role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/layouts/corporate/sign-in.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Corporate </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-corporate.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/layouts/creative/sign-in.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Creative </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-creative.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/layouts/fancy/sign-in.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Fancy </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-fancy.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/layouts/overlay/sign-in.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Overlay </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-overlay.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/extended/multi-steps-sign-up.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Multi-step </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-multistep.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/extended/two-factor-auth.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                2 Factor Auth </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-2factor.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/password-confirmation.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Password Changed </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-passwordchanged.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/verify-email.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Verify Email </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-verifyemail.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/welcome.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Welcome </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-welcome.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/coming-soon.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Coming Soon </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-comingsoon.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/account-deactivated.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Account Deactivated </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-accountdeactivated.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/error-404.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                404 Page </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-404.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/general/error-500.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                505 Page </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/auth-500.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_general" role="tabpanel">
                                                <div class="mb-5">
                                                    <!--begin::Collapse toggle-->
                                                    <a class="btn btn-flex btn-color-dark flex-stack p-0 mb-5 toggle collapsible active"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_app_engage_prebuilts_tab_pages_general_user-profile">
                                                        <span class="fw-bolder fs-2"> User Profile </span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span
                                                            class="svg-icon toggle-off text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="10.8891" y="17.8033" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 10.8891 17.8033)"
                                                                    fill="currentColor" />
                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon toggle-on text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="6.0104" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--end::Collapse toggle-->
                                                    <!--begin::Collapse content-->
                                                    <div class="show"
                                                        id="kt_app_engage_prebuilts_tab_pages_general_user-profile">
                                                        <!--begin::Row-->
                                                        <div class="row g-10 pt-2 pb-5">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/overview.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Profile Overview </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-overview.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/projects.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        User Projects </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-overview.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/campaigns.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        User Campaigns </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-campaigns.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/documents.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        User Documents </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-documents.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/followers.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        User Followers </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-followers.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/user-profile/activity.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        User Activity </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/profile-activity.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Collapse content-->
                                                </div>
                                                <div class="mb-5">
                                                    <!--begin::Collapse toggle-->
                                                    <a class="btn btn-flex btn-color-dark flex-stack p-0 mb-5 toggle collapsible collapsed"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_app_engage_prebuilts_tab_pages_general_corporate">
                                                        <span class="fw-bolder fs-2"> Corporate </span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span
                                                            class="svg-icon toggle-off text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="10.8891" y="17.8033" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 10.8891 17.8033)"
                                                                    fill="currentColor" />
                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon toggle-on text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="6.0104" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--end::Collapse toggle-->
                                                    <!--begin::Collapse content-->
                                                    <div class="collapse"
                                                        id="kt_app_engage_prebuilts_tab_pages_general_corporate">
                                                        <!--begin::Row-->
                                                        <div class="row g-10 pt-2 pb-5">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/about.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        About Us </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/corporate-aboutus.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/contact.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Contact Us </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/corporate-contactus.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/licenses.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        License </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/corporate-license.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/team.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Our Team </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/corporate-ourteam.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/sitemap.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Sitemap </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/corporate-sitemap.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Collapse content-->
                                                </div>
                                                <div class="mb-5">
                                                    <!--begin::Collapse toggle-->
                                                    <a class="btn btn-flex btn-color-dark flex-stack p-0 mb-5 toggle collapsible collapsed"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_app_engage_prebuilts_tab_pages_general_social">
                                                        <span class="fw-bolder fs-2"> Social </span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span
                                                            class="svg-icon toggle-off text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="10.8891" y="17.8033" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 10.8891 17.8033)"
                                                                    fill="currentColor" />
                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon toggle-on text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="6.0104" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--end::Collapse toggle-->
                                                    <!--begin::Collapse content-->
                                                    <div class="collapse"
                                                        id="kt_app_engage_prebuilts_tab_pages_general_social">
                                                        <!--begin::Row-->
                                                        <div class="row g-10 pt-2 pb-5">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/social/feeds.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Activity </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/social-activity.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/social/activity.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Feeds </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/social-feeds.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/social/followers.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Followers </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/social-followers.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/social/settings.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Settings </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/social-settings.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Collapse content-->
                                                </div>
                                                <div class="mb-5">
                                                    <!--begin::Collapse toggle-->
                                                    <a class="btn btn-flex btn-color-dark flex-stack p-0 mb-5 toggle collapsible collapsed"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_app_engage_prebuilts_tab_pages_general_others">
                                                        <span class="fw-bolder fs-2"> Others </span>
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                        <span
                                                            class="svg-icon toggle-off text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="10.8891" y="17.8033" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 10.8891 17.8033)"
                                                                    fill="currentColor" />
                                                                <rect x="6.01041" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                        <span class="svg-icon toggle-on text-primary svg-icon-2 ms-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="5"
                                                                    fill="currentColor" />
                                                                <rect x="6.0104" y="10.9247" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--end::Collapse toggle-->
                                                    <!--begin::Collapse content-->
                                                    <div class="collapse"
                                                        id="kt_app_engage_prebuilts_tab_pages_general_others">
                                                        <!--begin::Row-->
                                                        <div class="row g-10 pt-2 pb-5">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/faq/classic.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        FAQ Classic </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/faq-classic.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/faq/extended.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        FAQ Extended </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/faq-extended.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/blog/home.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Blog Home </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/blog-home.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-4">
                                                                <!--begin::Preview-->
                                                                <a href="../../../pages/blog/post.html"
                                                                    data-kt-href="true"
                                                                    class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                                    <!--begin::Title-->
                                                                    <h3
                                                                        class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                        Blog Post </h3>
                                                                    <!--end::Title-->
                                                                    <!--begin::Thumbnail-->
                                                                    <span
                                                                        class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                        <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                            data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/blog-post.png"
                                                                            class="lozad w-100 rounded" />
                                                                    </span>
                                                                    <!--end::Thumbnail-->
                                                                </a>
                                                                <!--end::Preview-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Collapse content-->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_account" role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/overview.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Overview </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-overview.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/settings.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Settings </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-settings.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/billing.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Billing </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-billing.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/security.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Security </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-security.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/referrals.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Referrals </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-referrals.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/logs.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Logs </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-logs.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/api-keys.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                API Keys </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-apikeys.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/statements.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Statements </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-statements.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../account/billing.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Billing </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/account-billing.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_modals" role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../general/view-users.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                View Friends </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-viewfriends.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../general/upgrade-plan.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Upgrade Plan </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-upgradeplan.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/top-up-wallet.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Topup Wallet </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-topupwallet.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../general/share-earn.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Share & Earn </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-shareandearn.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../general/select-users.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Select User </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-selectuser.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="bidding.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Place Bid </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-placeyourbid.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/offer-a-deal.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Offer Deal </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-offeradeal.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="new-target.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                New Target </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-newtarget.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="new-card.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                New Card </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-newcard.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="new-address.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                New Address </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-newaddress.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../general/invite-friends.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Invite Friend </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-invitefriend.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/create-project.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Create Project </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-createproject.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/create-campaign.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Create Campaign </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-createcampaign.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/create-account.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Create Business Account </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-createbusinessacc.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/create-app.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Create App </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-createapp.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="create-api-key.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Create Api Key </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-createapikey.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../wizards/two-factor-authentication.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                2 Factor Auth </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/modal-2factorauth.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_wizards" role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../wizards/horizontal.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                2 Factor Auth </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/wizard-2factorauth.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../wizards/horizontal.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Horizontal </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/wizard-horizontal.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../wizards/vertical.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Vertical </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/wizard-vertical.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_search" role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../search/users.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Search Users </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/search-users.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../search/horizontal.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Search Horizontal </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/search-horizontal.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../search/vertical.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Search Vertical </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/search-vertical.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../search/select-location.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Search Location </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/search-location.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_widgets" role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/charts.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Charts </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-charts.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/feeds.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Feeds </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-feeds.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/lists.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Lists </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-lists.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/mixed.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Mixed </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-mixed.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/statistics.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Statistics </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-stats.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../widgets/tables.html" data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Tables </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/widgets-tables.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade "
                                                id="kt_app_engage_prebuilts_tab_pages_email-templates"
                                                role="tabpanel">
                                                <!--begin::Row-->
                                                <div class="row g-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/welcome-message.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Welcome </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-welcome.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/subscription-confirmed.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Subscription Confirmed </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-subscriptionconfirmed.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/reset-password.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Reset Password </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-resetpassword.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/card-declined.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Card Declined </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-creditcarddeclined.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/promo-1.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Promotion 1 </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-promo1.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/promo-2.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Promotion 2 </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-promo2.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-4">
                                                        <!--begin::Preview-->
                                                        <a href="../../../authentication/email/promo-3.html"
                                                            data-kt-href="true"
                                                            class="preview-thumbnail bg-light border d-flex flex-column rounded-3 hover-elevate-up overflow-hidden">
                                                            <!--begin::Title-->
                                                            <h3
                                                                class="ps-12 pt-9 mb-7 text-gray-900 fw-bold letter-spacing fs-4">
                                                                Promotion 3 </h3>
                                                            <!--end::Title-->
                                                            <!--begin::Thumbnail-->
                                                            <span
                                                                class="app-prebuilts-thumbnail rounded ms-12 mb-n6 mb-lg-n15 me-n6 mh-350px overflow-hidden">
                                                                <img src="../../../assets/media/preview/demos/placeholder.jpg"
                                                                    data-src="/metronic8/demo20/assets/media/preview/prebuilts/pages/email-promo3.png"
                                                                    class="lozad w-100 rounded" />
                                                            </span>
                                                            <!--end::Thumbnail-->
                                                        </a>
                                                        <!--end::Preview-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Scroll wrapper-->
                                </div>
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Image view-->
                        <!--begin::Text view-->
                        <div class="pt-2 d-none" id="kt_app_engage_prebuilts_view_text">
                            <!--begin::Heading-->
                            <h1 class="fs-2x text-dark fw-bolder text-center mb-4"
                                id="kt_app_engage_prebuilts_view_text_heading"> Sitemap </h1>
                            <!--end::Heading-->
                            <!--begin::Wrapper-->
                            <div id="kt_app_engage_prebuilts_view_text_heading" class="hover-scroll-y pe-12 me-n12"
                                data-kt-scroll="true" data-kt-scroll-height="auto"
                                data-kt-scroll-wrappers="#kt_app_engage_prebuilts_modal, #kt_app_engage_prebuilts_modal_dialog, #kt_app_engage_prebuilts_body, #kt_app_engage_prebuilts_view_text"
                                data-kt-scroll-dependencies="#kt_app_engage_prebuilts_header, #kt_app_engage_prebuilts_view_text_heading"
                                data-kt-scroll-offset="190px">
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Layouts </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo1/index.html">
                                                    Metronic Original </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo2/index.html">
                                                    SaaS App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo30/index.html">
                                                    Sales Tracking App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo39/index.html">
                                                    Billing SaaS </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo31/index.html">
                                                    Marketing Automation </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo27/index.html">
                                                    Databox Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo6/index.html">
                                                    Time Reporting </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo3/index.html">
                                                    New Trend </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo23/index.html">
                                                    Member Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo38/index.html">
                                                    Email Marketing </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo36/index.html">
                                                    Digital Marketing </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo10/index.html">
                                                    Project Grid </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo35/index.html">
                                                    Traffic Analytics </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo8/index.html">
                                                    Analytics App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo25/index.html">
                                                    User Guiding App </a>
                                                <a class="fw-6 fw-semibold" href="../../../index.html"> CRM Software
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo7/index.html">
                                                    CRM Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo43/index.html">
                                                    Healthcare Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo32/index.html">
                                                    Delivery Management </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo42/index.html">
                                                    Calendar Workspace </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo44/index.html">
                                                    Recruit Automation </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo33/index.html">
                                                    Social Campaings </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo37/index.html">
                                                    Cloud Suite </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo11/index.html">
                                                    Finance Planner </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo16/index.html">
                                                    Podcast App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo26/index.html">
                                                    Planable App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo22/index.html">
                                                    Media Publisher </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo19/index.html">
                                                    Reports Panel </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo40/index.html">
                                                    HR App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo29/index.html">
                                                    Project Workspace </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo24/index.html">
                                                    Helpdesk App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo4/index.html">
                                                    Jobs Site </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo41/index.html">
                                                    Business Intelligence </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo18/index.html">
                                                    Goal Tracking </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo21/index.html">
                                                    Monochrome App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo34/index.html">
                                                    Finance Analytics </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo15/index.html">
                                                    Crypto Planner </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo14/index.html">
                                                    Project Workplace </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo9/index.html">
                                                    Sales Manager </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo5/index.html">
                                                    Support Forum </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo13/index.html">
                                                    Classic Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo12/index.html">
                                                    Data Analyzer </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo48/index.html">
                                                    Cloud ERP </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo28/index.html">
                                                    eCommerce App </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo17/index.html">
                                                    Events Scheduler </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="https://preview.keenthemes.com/metronic8/demo49/index.html">
                                                    KPI Tracking </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Dashboards </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../index.html"> Dashboard
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/marketing.html"> Marketing Dashboard
                                                </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/social.html">
                                                    Social Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/ecommerce.html"> eCommerce Dashboard
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/store-analytics.html"> Store Analytics
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/logistics.html"> Logistics </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/delivery.html"> Delivery </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/online-courses.html"> Online Courses
                                                </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/school.html">
                                                    Hello Tyler </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/crypto.html">
                                                    My Balance: 37,045$ </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/finance-performance.html"> Finance
                                                    Performance </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/website-analytics.html"> Website
                                                    Analytics </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/bidding.html">
                                                    Bidding Dashboard </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/podcast.html">
                                                    Podcast Dashboard </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/projects.html"> Projects Dashboard </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../dashboards/call-center.html"> Call Center </a>
                                                <a class="fw-6 fw-semibold" href="../../../dashboards/pos.html"> POS
                                                    System </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17"></div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Authentication </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/layouts/corporate/sign-in.html">
                                                    Corporate </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/layouts/creative/sign-in.html">
                                                    Creative </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/layouts/fancy/sign-in.html"> Fancy
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/layouts/overlay/sign-in.html">
                                                    Overlay </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/extended/multi-steps-sign-up.html">
                                                    Multi-step </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/extended/two-factor-auth.html"> 2
                                                    Factor Auth </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/password-confirmation.html">
                                                    Password Changed </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/verify-email.html"> Verify
                                                    Email </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/welcome.html"> Welcome </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/coming-soon.html"> Coming
                                                    Soon </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/account-deactivated.html">
                                                    Account Deactivated </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/error-404.html"> 404 Page
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/general/error-500.html"> 505 Page
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Account </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../account/overview.html">
                                                    Overview </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/settings.html">
                                                    Settings </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/billing.html">
                                                    Billing </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../account/security.html">
                                                    Security </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/referrals.html">
                                                    Referrals </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/logs.html"> Logs
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../account/api-keys.html">
                                                    API Keys </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/statements.html">
                                                    Statements </a>
                                                <a class="fw-6 fw-semibold" href="../../../account/billing.html">
                                                    Billing </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Modals </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../general/view-users.html"> View
                                                    Friends </a>
                                                <a class="fw-6 fw-semibold" href="../general/upgrade-plan.html">
                                                    Upgrade Plan </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/top-up-wallet.html">
                                                    Topup Wallet </a>
                                                <a class="fw-6 fw-semibold" href="../general/share-earn.html"> Share
                                                    & Earn </a>
                                                <a class="fw-6 fw-semibold" href="../general/select-users.html">
                                                    Select User </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="bidding.html"> Place Bid </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/offer-a-deal.html">
                                                    Offer Deal </a>
                                                <a class="fw-6 fw-semibold" href="new-target.html"> New Target </a>
                                                <a class="fw-6 fw-semibold" href="new-card.html"> New Card </a>
                                                <a class="fw-6 fw-semibold" href="new-address.html"> New Address
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../general/invite-friends.html">
                                                    Invite Friend </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/create-project.html">
                                                    Create Project </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/create-campaign.html">
                                                    Create Campaign </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/create-account.html">
                                                    Create Business Account </a>
                                                <a class="fw-6 fw-semibold" href="../wizards/create-app.html">
                                                    Create App </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="create-api-key.html"> Create Api
                                                    Key </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../wizards/two-factor-authentication.html"> 2 Factor Auth
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Wizards </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../wizards/horizontal.html"> 2
                                                    Factor Auth </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../wizards/horizontal.html">
                                                    Horizontal </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../wizards/vertical.html">
                                                    Vertical </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Search </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../search/users.html"> Search
                                                    Users </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../search/horizontal.html">
                                                    Search Horizontal </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../search/vertical.html">
                                                    Search Vertical </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../search/select-location.html"> Search Location </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Widgets </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../widgets/charts.html">
                                                    Charts </a>
                                                <a class="fw-6 fw-semibold" href="../../../widgets/feeds.html">
                                                    Feeds </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../widgets/lists.html">
                                                    Lists </a>
                                                <a class="fw-6 fw-semibold" href="../../../widgets/mixed.html">
                                                    Mixed </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../widgets/statistics.html">
                                                    Statistics </a>
                                                <a class="fw-6 fw-semibold" href="../../../widgets/tables.html">
                                                    Tables </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - Email Templates </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/welcome-message.html"> Welcome
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/subscription-confirmed.html">
                                                    Subscription Confirmed </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/reset-password.html"> Reset
                                                    Password </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/card-declined.html"> Card
                                                    Declined </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/promo-1.html"> Promotion 1
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/promo-2.html"> Promotion 2
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../authentication/email/promo-3.html"> Promotion 3
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - General - User Profile </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/overview.html"> Profile Overview
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/projects.html"> User Projects
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/campaigns.html"> User Campaigns
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/documents.html"> User Documents
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/followers.html"> User Followers
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/user-profile/activity.html"> User Activity
                                                </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - General - Corporate </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/about.html"> About
                                                    Us </a>
                                                <a class="fw-6 fw-semibold" href="../../../pages/contact.html">
                                                    Contact Us </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/licenses.html">
                                                    License </a>
                                                <a class="fw-6 fw-semibold" href="../../../pages/team.html"> Our
                                                    Team </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/sitemap.html">
                                                    Sitemap </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - General - Social </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/social/feeds.html">
                                                    Activity </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/social/activity.html"> Feeds </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/social/followers.html"> Followers </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../pages/social/settings.html"> Settings </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-10 mb-lg-17">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Pages - General - Others </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/faq/classic.html">
                                                    FAQ Classic </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/faq/extended.html">
                                                    FAQ Extended </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/blog/home.html">
                                                    Blog Home </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold" href="../../../pages/blog/post.html">
                                                    Blog Post </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder mb-7"> Apps </h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/projects/list/list.html"> Projects </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/ecommerce/catalog/products/products.html">
                                                    Ecommerce </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/customers/list/list.html"> Customers </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/subscriptions/list/list.html"> Subscriptions
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/user-management/users/list/list.html"> User
                                                    Management </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/invoices/create/main.html"> Invoices </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/support-center/overview/main.html"> Support
                                                    Center </a>
                                                <a class="fw-6 fw-semibold" href="../../../apps/chat/private.html">
                                                    Chat </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/calendar/calendar.html"> Calendar </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-3">
                                            <!--begin::List-->
                                            <div class="d-flex flex-column gap-3 gap-lg-5">
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/file-manager/list/folders.html"> File Manager
                                                </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/inbox/listing/listing.html"> Inbox </a>
                                                <a class="fw-6 fw-semibold"
                                                    href="../../../apps/contacts/getting-started.html"> Contacts </a>
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Text view--->
                    </div>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Sitemap-->
    <!--end::Engage modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2"
                    rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Modals-->
    <!--begin::Modal - Upgrade plan-->
    <div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header justify-content-end border-0 pb-0">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                    fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2"
                                    rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Upgrade a Plan</h1>
                        <div class="text-muted fw-semibold fs-5"> If you need more info, please check <a
                                href="#" class="link-primary fw-bold">Pricing Guidelines</a>. </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Plans-->
                    <div class="d-flex flex-column">
                        <!--begin::Nav group-->
                        <div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
                            <button
                                class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active"
                                data-kt-plan="month"> Monthly </button>
                            <button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3"
                                data-kt-plan="annual"> Annual </button>
                        </div>
                        <!--end::Nav group-->
                        <!--begin::Row-->
                        <div class="row mt-10">
                            <!--begin::Col-->
                            <div class="col-lg-6 mb-10 mb-lg-0">
                                <!--begin::Tabs-->
                                <div class="nav flex-column">
                                    <!--begin::Tab link-->
                                    <label
                                        class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    checked="checked" value="startup" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center fs-2 fw-bold flex-wrap"> Startup
                                                </div>
                                                <div class="fw-semibold opacity-75"> Best for startups </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bold" data-kt-plan-price-month="39"
                                                data-kt-plan-price-annual="399"> 39 </span>
                                            <span class="fs-7 opacity-50">/ <span
                                                    data-kt-element="period">Mon</span>
                                            </span>
                                        </div>
                                        <!--end::Price-->
                                    </label>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <label
                                        class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6  mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="advanced" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">
                                                    Advanced </div>
                                                <div class="fw-semibold opacity-75"> Best for 100+ team size </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bold" data-kt-plan-price-month="339"
                                                data-kt-plan-price-annual="3399"> 339 </span>
                                            <span class="fs-7 opacity-50">/ <span
                                                    data-kt-element="period">Mon</span>
                                            </span>
                                        </div>
                                        <!--end::Price-->
                                    </label>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <label
                                        class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6  mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="enterprise" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">
                                                    Enterprise <span
                                                        class="badge badge-light-success ms-2 py-2 px-3 fs-7">Popular</span>
                                                </div>
                                                <div class="fw-semibold opacity-75"> Best value for 1000+ team </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <span class="mb-2">$</span>
                                            <span class="fs-3x fw-bold" data-kt-plan-price-month="999"
                                                data-kt-plan-price-annual="9999"> 999 </span>
                                            <span class="fs-7 opacity-50">/ <span
                                                    data-kt-element="period">Mon</span>
                                            </span>
                                        </div>
                                        <!--end::Price-->
                                    </label>
                                    <!--end::Tab link-->
                                    <!--begin::Tab link-->
                                    <label
                                        class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6"
                                        data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_custom">
                                        <!--end::Description-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Radio-->
                                            <div
                                                class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                                <input class="form-check-input" type="radio" name="plan"
                                                    value="custom" />
                                            </div>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center fs-2 fw-bold flex-wrap"> Custom
                                                </div>
                                                <div class="fw-semibold opacity-75"> Requet a custom license </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Price-->
                                        <div class="ms-5">
                                            <a href="#" class="btn btn-sm btn-success">Contact Us</a>
                                        </div>
                                        <!--end::Price-->
                                    </label>
                                    <!--end::Tab link-->
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <!--begin::Tab content-->
                                <div class="tab-content rounded h-100 bg-light p-10">
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-semibold"> Optimal for 10+ team size and new
                                                startup </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 10
                                                    Active Users </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 30
                                                    Project Integrations </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Analytics
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Finance Module
                                                </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Accounting
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Network
                                                    Platform </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center ">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Unlimited Cloud
                                                    Space </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade " id="kt_upgrade_plan_advanced">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-semibold"> Optimal for 100+ team size and grown
                                                company </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 10
                                                    Active Users </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 30
                                                    Project Integrations </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Analytics
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Finance
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Accounting
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Network
                                                    Platform </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center ">
                                                <span class="fw-semibold fs-5 text-muted flex-grow-1"> Unlimited Cloud
                                                    Space </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <rect x="7" y="15.3137" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                                        <rect x="8.41422" y="7" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(45 8.41422 7)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade " id="kt_upgrade_plan_enterprise">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-semibold"> Optimal for 1000+ team and enterpise
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 10
                                                    Active Users </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Up to 30
                                                    Project Integrations </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Analytics
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Finance
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Accounting
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Network
                                                    Platform </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center ">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Unlimited
                                                    Cloud Space </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane fade " id="kt_upgrade_plan_custom">
                                        <!--begin::Heading-->
                                        <div class="pb-5">
                                            <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                            <div class="text-muted fw-semibold"> Optimal for corporations </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="pt-1">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Unlimited
                                                    Users </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Unlimited
                                                    Project Integrations </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Analytics
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Finance
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Accounting
                                                    Module </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Network
                                                    Platform </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center ">
                                                <span class="fw-semibold fs-5 text-gray-700 flex-grow-1"> Unlimited
                                                    Cloud Space </span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tab Pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Plans-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-center flex-row-fluid pt-12">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_modal_upgrade_plan_btn">
                            <!--begin::Indicator label-->
                            <span class="indicator-label"> Upgrade Plan</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress"> Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Upgrade plan-->
    <!--begin::Modal - Create Campaign-->
    <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Create Campaign</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                    fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2"
                                    rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center py-2">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"> Campaign Details </h3>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"> Creative Uploads </h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"> Audiences </h3>
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"> Budget Estimates </h3>
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"> Completed </h3>
                            </div>
                            <!--end::Step 5-->
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>
    <!--end::Modal - Create Campaign-->
    <!--begin::Modal - New Card-->
    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Tambah Daftar Minuman</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                    fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2"
                                    rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form needs-validation" method="POST"
                        action="/daftar-minumanpost" novalidate="novalidate" enctype="multipart/form-data"> @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-0 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Foto Minuman</span>
                                {{-- <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan nama kategori seperti contoh dibawah ini"></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty w-fc image-input-outline image-input-placeholder mb-4"
                                data-kt-image-input="true">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->
                                <!--begin::Edit button-->
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    data-bs-dismiss="click" title="Masukkan Foto Minuman Disini">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input id="img_input" type="file" name="foto_minuman"
                                        accept=".png, .jpg, .jpeg" required />
                                    <div class="invalid-feedback"> Harap isi bidang ini </div>
                                    <input type="hidden" name="foto_makanan_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->
                                <!--begin::Cancel button-->
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    data-bs-dismiss="click" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel button-->
                                <!--begin::Remove button-->
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    data-bs-dismiss="click" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Nama Minuman</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
                            </label>
                            <!--end::Label-->
                            <div class="input-group mb-5">
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Es syntax" name="nama_minuman" value="" required />
                                <div class="invalid-feedback"> Harap isi bidang ini </div>
                            </div>
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Harga</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
                            </label>
                            <!--end::Label-->
                            <div class="input-group mb-5">
                                <span class="input-group-text border-0">Rp.</span>
                                <input type="text" id="harga_makanan"
                                    class="form-control form-control-solid harga_makanan" placeholder="10.000"
                                    name="harga" value="" required />
                                <div class="invalid-feedback"> Harap isi bidang ini </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3"> Batal
                            </button>
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                <span class="indicator-label"> Kirim </span>
                                <span class="indicator-progress"> Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Card-->
    <!--begin::Modal - Users Search-->
    <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                    fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2"
                                    rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Content-->
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Search Users</h1>
                        <div class="text-muted fw-semibold fs-5"> Invite Collaborators To Your Project </div>
                    </div>
                    <!--end::Content-->
                    <!--begin::Search-->
                    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                        data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                        <!--begin::Form-->
                        <!--end::Form-->
                        <!--begin::Wrapper-->
                        <div class="py-5">
                            <!--begin::Suggestions-->
                            <div data-kt-search-element="suggestions">
                                <!--begin::Heading-->
                                <h3 class="fw-semibold mb-5">Recently searched:</h3>
                                <!--end::Heading-->
                                <!--begin::Users-->
                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    <!--begin::User-->
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="../../../assets/media/avatars/300-6.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold">
                                            <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                            <span class="badge badge-light">Art Director</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold"> M
                                            </span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold">
                                            <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                            <span class="badge badge-light">Marketing Analytic</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold">
                                            <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                            <span class="badge badge-light">Software Enginer</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="../../../assets/media/avatars/300-5.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold">
                                            <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                            <span class="badge badge-light">Web Developer</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <a href="#"
                                        class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="../../../assets/media/avatars/300-25.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold">
                                            <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                            <span class="badge badge-light">UI/UX Designer</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::User-->
                                </div>
                                <!--end::Users-->
                            </div>
                            <!--end::Suggestions-->
                            <!--begin::Results(add d-none to below element to hide the users list by default)-->
                            <div data-kt-search-element="results" class="d-none">
                                <!--begin::Users-->
                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='0']"
                                                    value="0" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="../../../assets/media/avatars/300-6.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                    Smith</a>
                                                <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='1']"
                                                    value="1" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-danger text-danger fw-semibold"> M
                                                </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody
                                                    Macy</a>
                                                <div class="fw-semibold text-muted">melody@altbox.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected>Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='2']"
                                                    value="2" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="../../../assets/media/avatars/300-1.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max
                                                    Smith</a>
                                                <div class="fw-semibold text-muted">max@kt.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='3']"
                                                    value="3" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="../../../assets/media/avatars/300-5.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean
                                                    Bean</a>
                                                <div class="fw-semibold text-muted">sean@dellito.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='4']"
                                                    value="4" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic"
                                                    src="../../../assets/media/avatars/300-25.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian
                                                    Cox</a>
                                                <div class="fw-semibold text-muted">brian@exchange.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='5']"
                                                    value="5" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                                    C </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela
                                                    Collins</a>
                                                <div class="fw-semibold text-muted">mik@pex.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='6']"
                                                    value="6" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="../../../assets/media/avatars/300-9.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis
                                                    Mitcham</a>
                                                <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='7']"
                                                    value="7" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-danger text-danger fw-semibold"> O
                                                </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia
                                                    Wild</a>
                                                <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='8']"
                                                    value="8" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                    N </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
                                                    Owen</a>
                                                <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected>Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='9']"
                                                    value="9" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic"
                                                    src="../../../assets/media/avatars/300-23.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan
                                                    Wilson</a>
                                                <div class="fw-semibold text-muted">dam@consilting.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='10']"
                                                    value="10" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-danger text-danger fw-semibold"> E
                                                </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                    Bold</a>
                                                <div class="fw-semibold text-muted">emma@intenso.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='11']"
                                                    value="11" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic"
                                                    src="../../../assets/media/avatars/300-12.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana
                                                    Crown</a>
                                                <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected>Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='12']"
                                                    value="12" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-info text-info fw-semibold"> A
                                                </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert
                                                    Doe</a>
                                                <div class="fw-semibold text-muted">robert@benko.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='13']"
                                                    value="13" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic"
                                                    src="../../../assets/media/avatars/300-13.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John
                                                    Miller</a>
                                                <div class="fw-semibold text-muted">miller@mapple.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='14']"
                                                    value="14" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-success text-success fw-semibold">
                                                    L </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy
                                                    Kunic</a>
                                                <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2" selected>Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='15']"
                                                    value="15" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic"
                                                    src="../../../assets/media/avatars/300-21.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan
                                                    Wilder</a>
                                                <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1" selected>Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3">Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    <!--end::Separator-->
                                    <!--begin::User-->
                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" name="users"
                                                    data-kt-check="true" data-kt-check-target="[data-user-id='16']"
                                                    value="16" />
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                    N </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
                                                    Owen</a>
                                                <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Access menu-->
                                        <div class="ms-2 w-100px">
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true">
                                                <option value="1">Guest</option>
                                                <option value="2">Owner</option>
                                                <option value="3" selected>Can Edit</option>
                                            </select>
                                        </div>
                                        <!--end::Access menu-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Users-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-center mt-15">
                                    <button type="reset" id="kt_modal_users_search_reset"
                                        data-bs-dismiss="modal" class="btn btn-active-light me-3"> Cancel </button>
                                    <button type="submit" id="kt_modal_users_search_submit"
                                        class="btn btn-primary"> Add Selected Users </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Results-->
                            <!--begin::Empty-->
                            <div data-kt-search-element="empty" class="text-center d-none">
                                <!--begin::Message-->
                                <div class="fw-semibold py-10">
                                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                    <div class="text-muted fs-6">Try to search by username, full name or email...
                                    </div>
                                </div>
                                <!--end::Message-->
                                <!--begin::Illustration-->
                                <div class="text-center px-5">
                                    <img src="../../../assets/media/illustrations/sketchy-1/1.png" alt=""
                                        class="w-100 h-200px h-sm-325px" />
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Empty-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Users Search-->
    <!--begin::Javascript-->
    @include('layouts.script')
    <script>
        //Sweet alert
        $(".delete").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '/daftar-minumandelete/' + id;
                    // alert(id);
                    Swal.fire(
                        'Dihapus!',
                        'Daftar minuman Anda telah dihapus.',
                        'success'
                    )
                }
            })
        });
        //end Sweet alert
        // input image
        KTImageInput.createInstances();
        var imageInputElement = document.querySelector("#img_input");
        var imageInput = KTImageInput.getInstance(imageInputElement);
        /* Tanpa Rupiah */
        var currency = document.querySelector('.harga_makanan');
        currency.addEventListener('keyup', function(e) {
            currency.value = formatRupiah(this.value);
        });
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <!--begin::Javascript-->
</body>
<!--end::Body-->

</html>
