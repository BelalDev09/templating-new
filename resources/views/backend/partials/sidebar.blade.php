{{-- SIDEBAR --}}
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('Backend/assets/images/logo-sm.png') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('Backend/assets/images/logo-dark.png') }}" height="17">
            </span>
        </a>
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('Backend/assets/images/logo-sm.png') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('Backend/assets/images/logo-light.png') }}" height="17">
            </span>
        </a>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>

            <ul class="navbar-nav" id="navbar-nav">

                {{-- MENU --}}
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                {{-- ECOMMERCE --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarEcommerce" data-bs-toggle="collapse" role="button"
                        aria-expanded="false">
                        <i class="ri-shopping-cart-2-line"></i>
                        <span data-key="t-ecommerce">Ecommerce</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarEcommerce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ asset('Backend/assets/pages/apps-ecommerce-products.html') }}"
                                    class="nav-link">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ asset('Backend/assets/pages/apps-ecommerce-orders.html') }}"
                                    class="nav-link">
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ asset('Backend/assets/pages/apps-ecommerce-customers.html') }}"
                                    class="nav-link">
                                    Customers
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- PAGES --}}
                <li class="menu-title">
                    <span data-key="t-pages">Pages</span>
                </li>

                {{-- AUTH --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="false">
                        <i class="ri-account-circle-line"></i>
                        <span data-key="t-authentication">Landing Page</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('backend.cms.index') }}" class="nav-link">home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cms.hero.store') }}" class="nav-link">Hero</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cms.how-it-works.store') }}" class="nav-link">how it work</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Descations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Merket</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Experiancces</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">why chose us</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="ri-logout-box-line align-middle me-1"></i> Logout
                                        </button>
                                    </form>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                {{-- PROFILE --}}
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="ri-user-line"></i>
                        <span>Profile</span>
                    </a>
                </li>
                {{-- PROFILE --}}
                {{-- <li class="nav-item">
            <a href="{{ route('profile.index') }}" class="nav-link">
                <i class="ri-user-line"></i>
                <span>Profile show</span>
            </a>
        </li> --}}

                {{-- COMPONENTS --}}
                <li class="menu-title">
                    <span data-key="t-components">Components</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="false">
                        <i class="ri-layout-grid-line"></i>
                        <span>Tables</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ asset('Backend/assets/pages/tables-datatables.html') }}"
                                    class="nav-link">
                                    Datatables
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

    </div>

    <div class="sidebar-background"></div>
</div>
