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
                    <a href="javascript:void(0)" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <span class="font-weight-bold"><b><u>USER PANEL</u></b></span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.user.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.report.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.block.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Block Users</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a href="javascript:void(0)" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <span class="font-weight-bold"><b><u>WEBSITE</u></b></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('a.settings.index',['homepage'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Homepage</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.sliders.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Sliders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.blog.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Blogs</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('a.thumbnails.index')}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Thumbnails</span>
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
                    <a href="{{route('a.setting.index',['terms-and-conditions'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Terms & Conditions</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['safety'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Safety</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['about-us'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">About us</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['contact-us'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Contact us</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['press'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Press</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('a.setting.index',['career'])}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Career</span>
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