<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="analytics.html">
                        <img src="https://designreset.com/cork/laravel/build/assets/logo.87d1e3bb.svg"
                            class="navbar-logo logo-dark" alt="logo">
                        <img src="https://designreset.com/cork/laravel/build/assets/logo2.25baa396.svg"
                            class="navbar-logo logo-light" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{ route('user.list') }}" class="nav-link"> GThai </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    <img src="../../build/assets/profile-30.cc6a2fe6.png" alt="avatar">
                </div>
                <div class="profile-content">
                    <h6 class="">Nguyễn Gia Thái</h6>
                    <p class="">Admin</p>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu active ">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-bs-parent="#accordionExample">
                    <li class="active">
                        <a href="{{ route('user.list') }}"> Người dùng </a>
                    </li>
                    <li>
                        <a href="{{ route('role.list') }}"> Vai trò </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('property.list') }}"> Bất động sản </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ route('banner.list') }}"> Banner </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('postCategory.list') }}"> Danh mục bài viết </a>
                    </li>
                    <li>
                        <a href="{{ route('propertyCategory.list') }}"> Danh mục bất động sản </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('post.list') }}"> Bài viết </a>
                    </li>
                    <li>
                        <a href="{{ route('comment.list') }}"> Bình luận </a>
                    </li> --}}
                </ul>
            </li>

        </ul>

    </nav>

</div> <!--  END SIDEBAR  -->

<div id="content" class="main-content ">
