<div class="left-side-menu" >

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('dashboard/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>خروج</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">

                <li class="menu-title">القائمة</li>

                <li class="">
                    <a href="">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>
                            الاقسام
                        </span>
                    </a>
                </li>


                <li>
                    <a href="#accounts" data-bs-toggle="collapse">
                        <i class="mdi mdi-paper-cut-vertical"></i>
                        <span>
                           المنشورات
                        </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="accounts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('posts.create') }}"> أضافة منشور </a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}">جميع المنشورات </a>
                            </li>

                        </ul>
                    </div>
                </li>



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
