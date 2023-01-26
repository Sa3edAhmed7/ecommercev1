<div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                
                <ul class="navbar-nav navbar-right">

                    @if (Auth::user()->role == "SADM")
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown" 
                        class="nav-link nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
                        <span class="badge headerBadge1" style="padding: 0px 5px;" id="notifications_count">
                            {{auth()->user()->unreadNotifications->count()}}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            Notifications
                            
                            <div class="float-right">
                                <a href="{{ route('admin.notification')}}">Mark All As Read</a>
                            </div>
                            
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons" id="unreadNotifications">
                            @foreach(auth()->user()->unreadNotifications as $notification)
                            <a class="dropdown-item dropdown-item-unread"> <span
                                    class="dropdown-item-icon"> <img alt=""
                                    src="{{asset('assets/images/profile')}}/{{ $notification->data['photo'] }}" class="user-img-radious-style" width="30px"> <span
                                    class="d-sm-none d-lg-inline-block"></span>
                                </span> <span class="dropdown-item-desc"><strong> {{ $notification->data['title'] }} <br> {{ $notification->data['user'] }} </strong><span class="time"><strong>{{ $notification->created_at->format('d/m/Y h:m:s') }}</strong>
                                </span>
                                </span>
                            </a>
                            @endforeach
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="{{route('admin.notifications')}}">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    </li>
                @endif

                    <li class="dropdown">

                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt=""
                                src="{{asset('assets/images/profile')}}/{{ Auth::user()->profile_photo_path }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>


                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{Auth::user()->name}}</div>
                            @can('Profile')
                            <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                            </a>
                            @endcan
                            @if (Auth::user()->role == "SADM")
                            <a href="{{route('admin.notifications')}}" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a>
                            @endif
                            @can('Settings')

                            <div class="p-15 border-none">

                                <div class="p-2 border-none">
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                                </div>


                                <div class="p-2 border-none">
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                                </div>

                                <div class="p-2 border-none">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                                </div>

                                <div class="p-2 border-none">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                                </div>

                                <div class="p-2 border-none">
                                    <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                        <i class="fas fa-undo"></i> Restore Default
                                    </a>
                                </div>

                            </div>
                            @endcan
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>

                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{route('index')}}"> <img alt="image" src="{{asset('assets')}}/admin/img/logo.png"
                                class="header-logo" /> <span class="logo-name">Ecommerce</span>
                        </a>
                    </div>

                    <ul class="sidebar-menu">
                    @can('Dashboard')
                    <li class="dropdown {{ request()->is('admin*dashboard') ? 'active' : ''}}">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                    @endcan
                    @can('Profile')
                    <li class="menu-header">Profile</li>
                    <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user"></i><span>Profile</span></a>
                            <ul class="dropdown-menu">
                            @can('Profile')
                                <li class="{{ request()->is('admin*profile') ? 'active' : ''}}"><a href="{{ route('admin.profile') }}">Profile</a></li>
                                @endcan
                                @can('Change Password')
                                <li class="{{ request()->is('admin*changepassword') ? 'active' : ''}}"><a href="{{ route('admin.changepassword') }}">Change Password</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('Settings')
                        <li class="menu-header">Settings</li>
                                    <li class="dropdown {{ request()->is('admin*settings') ? 'active' : ''}}">
                            <a href="{{ route('admin.settings') }}"><i
                                    data-feather="settings"></i><span>Settings Web</span></a>
                        </li>
                        @endcan

                        @can('Settings')
                            <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="sliders"></i><span>Settings</span></a>
                            <ul class="dropdown-menu">
                                @can('Attributes')
                                <li class="dropdown {{ request()->is('admin*attributes') ? 'active' : ''}}"><a  href="{{ route('admin.attributes') }}">Attributes</a></li>
                                @endcan
                                @can('Manage Home Slider')
                                <li class="dropdown {{ request()->is('admin*homeslider') ? 'active' : ''}}"><a  href="{{ route('admin.homeslider') }}">Manage Home Slider</a></li>
                                @endcan
                                @can('Manage Home Categories')
                                <li class="dropdown {{ request()->is('admin*homecategories') ? 'active' : ''}}"><a  href="{{ route('admin.homecategories') }}">Manage Home Categories</a></li>
                                @endcan
                                @can('Sale Setting')
                                <li class="dropdown {{ request()->is('admin*sale') ? 'active' : ''}}"><a href="{{ route('admin.sale') }}">Sale Setting</a></li>
                                @endcan
                                @can('All Coupons')
                                <li class="dropdown {{ request()->is('admin*coupons') ? 'active' : ''}}"><a href="{{ route('admin.coupons') }}">All Coupons</a></li>
                                @endcan
                                @can('About Payment')
                                <li class="dropdown {{ request()->is('admin*aboutpayment') ? 'active' : ''}}"><a  href="{{ route('admin.aboutpayment') }}">About Payment</a></li>
                                @endcan
                                @can('Links App')
                                <li class="dropdown {{ request()->is('admin*linkapp') ? 'active' : ''}}"><a href="{{ route('admin.linkapp') }}">Links App</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('Main')
                        <li class="menu-header">Main</li>
                        @can('Categories')
                        <li class="dropdown {{ request()->is('admin*categories') ? 'active' : ''}}">
                            <a href="{{ route('admin.categories') }}"><i
                                    data-feather="briefcase"></i><span>Categories</span></a>
                        </li>
                        @endcan
                        @can('Products')
                        <li class="dropdown {{ request()->is('admin*products') ? 'active' : ''}}">
                            <a href="{{ route('admin.products') }}"><i data-feather="box"></i><span>Products</span></a>
                        </li>
                        @endcan
                        @can('Orders')
                        <li class="dropdown {{ request()->is('admin*orders') ? 'active' : ''}}">
                            <a href="{{ route('admin.orders') }}"><i data-feather="shopping-bag"></i><span>Orders</span></a>
                        </li>
                        @endcan
                        @can('Messages')
                        <li class="dropdown {{ request()->is('admin*contact') ? 'active' : ''}}">
                            <a href="{{ route('admin.contact') }}"><i data-feather="mail"></i><span>Messages</span></a>
                        </li>
                        @endcan
                        @can('Users')
                        <li class="menu-header">Pages</li>
                        <li class="dropdown {{ request()->is('admin*users') ? 'active' : ''}}">
                            <a href="{{ route('admin.users') }}"><i data-feather="users"></i><span>Users</span></a>
                        </li>
                        @endcan
                        @can('role-list')
                        <li class="dropdown {{ request()->is('admin*roles') ? 'active' : ''}}">
                            <a href="{{ route('admin.roles') }}"><i data-feather="user-check"></i><span>Roles</span></a>
                        </li>
                        @endcan
                        @can('Pages')
                        <li class="dropdown {{ request()->is('admin*pages') ? 'active' : ''}}">
                            <a href="{{ route('admin.pages') }}"><i data-feather="layout"></i><span>Pages</span></a>
                        </li>
                        @endcan
                        @endcan
                    </ul>
                </aside>
            </div>
