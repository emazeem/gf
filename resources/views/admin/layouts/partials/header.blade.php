<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="{{url('')}}" target="_blank">
                <b class="logo-icon">
                    GFV
                </b>
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <ul class="navbar-nav float-start me-auto">

            </ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                       id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{url('admin/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
{{--                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>My Profile</a>--}}
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" href="{{ route('logout') }}"><i class="ti-arrow-right m-r-5 m-l-5"></i>Logout </a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<a href=""  class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
    <i class="mdi mdi-view-dashboard"></i>
    <span class="hide-menu">Logout</span>
</a>
