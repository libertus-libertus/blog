<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Landing Page Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.slide') }}">Hero Section</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">About Page</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('about.page') }}">About</a></li>
                                <li><a href="{{ route('about.multi.image') }}">Add Multi Image</a></li>
                                <li><a href="{{ route('all.multi.image') }}">All Multi Image</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('portfolio.page') }}">Portfolio</a></li>
                    </ul>
                </li>

                <li class="menu-title">Master Data</li>
                <li><a href="{{ route('blog.category.page') }}">Category</a></li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
