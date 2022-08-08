<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{url('admin/assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40"/>
                        </div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="#" class="" id="Userdd">
                                <h5 class="m-b-0 user-name font-medium">
                                    {{auth()->user()->name}}
                                </h5>
                                <span class="op-5 user-email">
                                    {{auth()->user()->email}}
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.dashboard')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.faq.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">FAQ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.faq.category.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">FAQ Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.testimonial.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Testimonials</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['privacy-policy'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Privacy Policy</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<style>
    .float-right{
        float: right;
    }
</style>