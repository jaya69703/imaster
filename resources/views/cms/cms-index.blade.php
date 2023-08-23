
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title . (' - ') . $menu }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('main') }}/src/assets/img/favicon.ico"/>
    <!-- ENABLE LOADERS -->
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('main') }}/layouts/vertical-dark-menu/loader.js"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('main') }}/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/dark/elements/alert.css">

    <link href="{{ asset('main') }}/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link href="{{ asset('main') }}/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('main') }}/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">


    <link href="{{ asset('main') }}/src/assets/css/light/components/media_object.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('main') }}/src/assets/css/dark/components/media_object.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/src/glightbox/glightbox.min.css">
    <link href="{{ asset('main') }}/src/assets/css/light/elements/infobox.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/elements/infobox.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('main') }}/vendor/fas/css/all.min.css">

    @yield('custom-css')

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>

</head>
<body class="layout-boxed" page="starter-pack">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="nav-link theme-toggle p-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            </a>

            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>

            <ul class="navbar-item flex-row ms-lg-auto ms-0">

                @auth
                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('storage/images/profile/'. Auth::user()->image) }}" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="{{ asset('storage/images/profile/'. Auth::user()->image) }}" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p>{{ Auth::user()->position->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ route('home.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#" onclick="logout(event)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>
                @endauth
                @guest
                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('storage/images/profile/default.png') }}" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="{{ asset('storage/images/profile/default.png') }}" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <h5>Guest Account</h5>
                                    <p>Preview Version</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Login</span>
                            </a>
                        </div>
                    </div>

                </li>
                @endguest
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="{{ url()->current() }}">
                                <img src="{{ asset('storage/images/default') }}/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="{{ url()->current() }}" class="nav-link"> {{ $title }} </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled menu-categories" id="accordionExample">

                    @guest
                    <li class="menu {{ Str::is('home/artikel*', request()->path()) ? 'active' : '' }}">
                        <a href="{{ url('/home/artikel') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-newspaper" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
                                <span>Article Area</span>
                            </div>
                        </a>
                    </li>
                    @endguest
                    @auth
                    <li class="menu {{ Str::is('home/artikel*', request()->path()) ? 'active' : '' }}">
                        <a href="{{ url('/home/artikel') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-newspaper" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
                                <span>Article Area</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>DASHBOARD USER</span></div>
                    </li>

                    <li class="menu {{ request()->is('home/profile') ? 'active' : '' }}">
                        <a href="{{ url('/home/profile') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-school-circle-check" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
                                <span>Profile User</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>DASHBOARD ADMIN</span></div>
                    </li>


                    <li class="menu {{ Str::is('admin/usermanage*', request()->path()) || Str::is('admin/position*', request()->path()) || Str::is('admin/overtimes*', request()->path()) ? 'active' : '' }}">
                        <a href="#home" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                                <span>Human Resource</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="home" data-bs-parent="#accordionExample">
                            <li class="{{ Str::is('admin/usermanage*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/usermanage') }}"> User Manager </a>
                            </li>
                            <li class="{{ Str::is('admin/position*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/position') }}"> Position Manager </a>
                            </li>
                            <li class="{{ Str::is('admin/overtimes*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/overtimes') }}"> Overtimes Manager </a>
                            </li>

                            <li class="dropdown-toggle">
                                <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false" class="">
                                    Level 2c <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                                <ul class="collapse list-unstyled sub-submenu" id="level-three" data-bs-parent="#pages">
                                    <li>
                                        <a href="javascript:void(0);"> Level 3a </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Level 3b </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Level 3c </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endauth


                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url()->current() }}">{{ $menu }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $submenu }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <!-- CONTENT AREA -->
                    @yield('content')

                    <!-- CONTENT AREA -->

                </div>

            </div>

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year"><?php echo date('Y')?></span> <a target="_blank" href="https://designreset.com/cork-admin/">Ifeta Dev</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>

        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('main') }}/src/plugins/src/global/vendors.min.js"></script>
    <script src="{{ asset('main') }}/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('main') }}/layouts/vertical-dark-menu/app.js"></script>


    <script src="{{ asset('main') }}/src/assets/js/custom.js"></script>
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />

    <script src="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.js"></script>

    <script src="{{ asset('main') }}/src/plugins/src/highlight/highlight.pack.js"></script>

    <script src="{{ asset('main') }}/src/plugins/src/glightbox/glightbox.min.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/glightbox/custom-glightbox.min.js"></script>
    @yield('custom-js')
    <script>
        function logout(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, log out',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Logout cancelled',
                        'error'
                    );
                }
            });
        }
    </script>
    <script>

        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are going to delete this item.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Deletion cancelled',
                        'error'
                    );
                }
            });
        }
    </script>
    <script>
    $(document).ready(function() {
        // Menutup modal saat tombol "Discard" diklik
        $('.modal-footer .btn[data-bs-dismiss="modal"]').on('click', function() {
            $(this).closest('.modal').modal('hide');
        });
    });

    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>

        // Mendapatkan elemen-elemen yang dibutuhkan
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const resetButton = document.getElementById('reset-button');

        // Simpan URL gambar awal sebagai nilai default
        const defaultImageSrc = imagePreview.src;

        // Fungsi untuk menampilkan pratinjau gambar
        function showImagePreview(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Event listener ketika gambar diubah di input file
        imageInput.addEventListener('change', function () {
            const selectedFile = this.files[0];
            showImagePreview(selectedFile);
        });

        // Event listener untuk tombol reset
        resetButton.addEventListener('click', function () {
            // Kembalikan gambar ke gambar awal
            imagePreview.src = defaultImageSrc;
            // Reset nilai input file
            imageInput.value = '';
        });
    </script>

    <script>
        // var e;

        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50, 100],
            "pageLength": 10
        });

        multiCheck(c3);
    </script>
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are going to delete this item.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Deletion cancelled',
                        'error'
                    );
                }
            });
        }
    </script>


<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
