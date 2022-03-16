<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- plugins:css -->
            <link rel="stylesheet" href="../../vendors/feather/feather.css">
            <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
            <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
            <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
            <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
            <!-- endinject -->
            <!-- Plugin css for this page -->
            <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
            <link rel="stylesheet" href="../../js/select.dataTables.min.css">
            <!-- End plugin css for this page -->
            <!-- inject:css -->
            <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
            <!-- endinject -->
            <link rel="shortcut icon" href="../../images/favicon.png" />
            <!-- Icon google -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Admin Page - @yield('title')</title>
    </head>
    <body>
        @section('navbar')
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="../../images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="../../images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">{{Auth::User()->HoTen}}</span></h1>
                        <h3 class="welcome-sub-text"> </h3>
                         @if ( Session::has('success') )
	<div class="alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>

	</div>
@endif
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">

                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="search-form" action="{{ route('search-product') }}" method="get">
                            <i class="icon-search"></i>
                            <input type="search" name="search" value="{{ old('serch') }}" class="form-control" placeholder="Search Here" title="Search here">
                            <input type="submit" name="ok" value="search" />
                        </form>
                    </li>
                    {{-- {!! Form::open(array('url' => '/search', 'class' => 'navbar-form navbar-left', 'method' => 'get')) !!}
                    <div class="form-group">
                        {!! Form::text('search', '', array('class' => 'form-control', 'placeholder' => 'Nhập từ khóa...')) !!}
                    </div>
                    {!! Form::submit('Tìm kiếm', array('class' => 'btn btn-default')) !!}
                    {!! Form::close() !!} --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-alert m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                    <p class="fw-light small-text mb-0"> Just now </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-settings m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                    <p class="fw-light small-text mb-0"> Private message </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{asset('admin/images')}}/{{Auth::User()->HinhAnh}}" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-xs rounded-circle" src="{{asset('admin/images')}}/{{Auth::User()->HinhAnh}}" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">{{Auth::User()->HoTen}}</p>
                                <p class="fw-light text-muted mb-0">{{Auth::User()->Email}}</p>
                            </div>
                            <a class="dropdown-item" href="{{route('profile')}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item" href="{{route('change_password')}}"><i class="dropdown-item-icon mdi mdi-lock text-primary me-2"></i> Change Password</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                            <a class="dropdown-item" href="{{route('xuli-logout')}}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            </nav>
        @show


            <div class="container-fluid page-body-wrapper">
            @section('slidebar')
            <!-- partial:partials/_settings-panel.html -->
                <div class="theme-setting-wrapper">
                    <div id="settings-trigger"><i class="ti-settings"></i></div>
                    <div id="theme-settings" class="settings-panel">
                        <i class="settings-close ti-close"></i>
                        <p class="settings-heading">SIDEBAR SKINS</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                            <div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                        <div class="sidebar-bg-options" id="sidebar-dark-theme">
                            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
                        <p class="settings-heading mt-2">HEADER SKINS</p>
                        <div class="color-tiles mx-0 px-4">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                        </div>
                    </div>
                </div>
                <div id="right-sidebar" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="setting-content">
                        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                            <div class="add-items d-flex px-3 mb-0">
                                <form class="form w-100">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                        <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                    </div>
                                </form>
                            </div>
                            <div class="list-wrapper px-3">
                                <ul class="d-flex flex-column-reverse todo-list">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Team review meeting at 3.00 PM
                        </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Prepare for presentation
                        </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Resolve all the low priority tickets due today
                        </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check">
                                            <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Schedule meeting for next week
                        </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check">
                                            <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Project review
                        </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                            <div class="events pt-4 px-3">
                                <div class="wrapper d-flex mb-2">
                                    <i class="ti-control-record text-primary me-2"></i>
                                    <span>Feb 11 2018</span>
                                </div>
                                <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                                <p class="text-gray mb-0">The total number of sessions</p>
                            </div>
                            <div class="events pt-4 px-3">
                                <div class="wrapper d-flex mb-2">
                                    <i class="ti-control-record text-primary me-2"></i>
                                    <span>Feb 7 2018</span>
                                </div>
                                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                                <p class="text-gray mb-0 ">Call Sarah Graves</p>
                            </div>
                        </div>
                        <!-- To do section tab ends -->
                        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                            </div>
                            <ul class="chat-list">
                                <li class="list active">
                                    <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Thomas Douglas</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">19 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                    <div class="info">
                                        <div class="wrapper d-flex">
                                            <p>Catherine</p>
                                        </div>
                                        <p>Away</p>
                                    </div>
                                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                    <small class="text-muted my-auto">23 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Daniel Russell</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">14 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                    <div class="info">
                                        <p>James Richardson</p>
                                        <p>Away</p>
                                    </div>
                                    <small class="text-muted my-auto">2 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Madeline Kennedy</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">5 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Sarah Graves</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">47 min</small>
                                </li>
                            </ul>
                        </div>
                        <!-- chat tab ends -->
                    </div>
                </div>
                <!-- partial -->
                <!-- partial:partials/_sidebar.html -->

                    <nav class="sidebar sidebar-offcanvas" id="sidebar">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}">
                                    <i class="mdi mdi-grid-large menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item nav-category">Forms and Datas</li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                                    <i class="menu-icon mdi mdi-laptop"></i>
                                    <span class="menu-title">Products</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-elements">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('create-product')}}">Add Product</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('list-product')}}">List Product</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-promote" aria-expanded="false" aria-controls="form-promote">
                                    <i class="menu-icon mdi mdi-fire"></i>
                                    <span class="menu-title">Promote</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-promote">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{route('promote.create')}}">Add Promote</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('promote.index')}}">List Promote</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                                    <i class="menu-icon mdi mdi-account-multiple"></i>
                                    <span class="menu-title">Account</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="charts">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('list-admin')}}">Admins</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('list-user')}}">Users</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                                    <i class="menu-icon mdi mdi-table"></i>
                                    <span class="menu-title">Bill</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="tables">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDon')}}">Bill</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDonChoXacNhan')}}">Chờ Xác Nhận</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDonChoVanChuyen')}}">Chờ Vận Chuyển</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDonDangVanChuyen')}}">Đang Vận Chuyển</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDonDaGiao')}}">Đã Giao</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('list-HoaDonHuy')}}">Bill Hủy</a></li>

                                    </ul>
                                </div>
                            </li>
<<<<<<< HEAD

=======
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#rate" aria-expanded="false" aria-controls="rate">
                                    <i class="menu-icon mdi mdi-star-circle"></i>
                                    <span class="menu-title">Rate</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="rate">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('rate.index')}}">List Rate</a></li>
                                    </ul>
                                </div>
                            </li>
>>>>>>> bab4f84436015a47ca2bbf55ce4d66a57dfc0531
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-type" aria-expanded="false" aria-controls="form-type">
                                    <i class="menu-icon mdi mdi-view-list"></i>
                                    <span class="menu-title">Type</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-type">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('type.create')}}">Add Type</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('type.index')}}">List Type</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-manufacturer" aria-expanded="false" aria-controls="form-manufacturer">
                                    <i class="menu-icon mdi mdi-home-modern"></i>
                                    <span class="menu-title">Manufacturer</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-manufacturer">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('manufacturer.create')}}">Add Manufacturer</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('manufacturer.index')}}">List Manufacturer</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-color" aria-expanded="false" aria-controls="form-color">
                                    <i class="menu-icon mdi mdi-palette"></i>
                                    <span class="menu-title">Color</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-color">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('color.create')}}">Add Color</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('color.index')}}">List Color</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-ram" aria-expanded="false" aria-controls="form-ram">
                                    <i class="menu-icon mdi mdi-memory"></i>
                                    <span class="menu-title">Ram</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-ram">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('ram.create')}}">Add Ram</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('ram.index')}}">List Ram</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-ssd" aria-expanded="false" aria-controls="form-ssd">
                                    <i class="menu-icon mdi mdi-harddisk"></i>
                                    <span class="menu-title">SSD</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-ssd">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('oCung.create')}}">Add SSD</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('oCung.index')}}">List SSD</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-monitor" aria-expanded="false" aria-controls="form-monitor">
                                    <i class="menu-icon mdi mdi-monitor"></i>
                                    <span class="menu-title">Monitor</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-monitor">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('monitor.create')}}">Add Monitor</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('monitor.index')}}">List Monitor</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-card" aria-expanded="false" aria-controls="form-card">
                                    <i class="menu-icon mdi mdi-relative-scale"></i>
                                    <span class="menu-title">Graphics Card</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-card">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('carddohoa.create')}}">Add Graphics Card</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('carddohoa.index')}}">List Graphics Card</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#form-cpu" aria-expanded="false" aria-controls="form-cpu">
                                    <i class="menu-icon mdi mdi-select-all"></i>
                                    <span class="menu-title">CPU</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="form-cpu">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item "><a class="nav-link" href="{{route('cpu.create')}}">Add CPU</a></li>
                                        <li class="nav-item "><a class="nav-link" href="{{route('cpu.index')}}">List CPU</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item nav-category">pages</li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                                    <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                    <span class="menu-title">User Pages</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="auth">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="{{route('login')}}"> Login </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item nav-category">help</li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                                    <i class="menu-icon mdi mdi-file-document"></i>
                                    <span class="menu-title">Documentation</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
            @show
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('content')
                        <!-- partial:partials/_footer.html -->
                        <footer class="footer">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">423-Nguyễn Huy  432-Trần Hiếu Khoa  433-Võ Đăng Khoa</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Đồ án lập trình WEB PHP nâng cao</span>
                            </div>
                        </footer>
        <!-- partial -->
                    </div>
                </div>
            </div>




        @section('script')
             <!-- plugins:js -->
            <script src="../../vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="../../vendors/chart.js/Chart.min.js"></script>
            <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="../../vendors/progressbar.js/progressbar.min.js"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="../../js/off-canvas.js"></script>
            <script src="../../js/hoverable-collapse.js"></script>
            <script src="../../js/template.js"></script>
            <script src="../../js/settings.js"></script>
            <script src="../../js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
            <script src="../../js/dashboard.js"></script>
            <script src="../../js/Chart.roundedBarCharts.js"></script>
            <!-- End custom js for this page-->
        @show


    </body>
</html>
