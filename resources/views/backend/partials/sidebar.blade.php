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

        {{-- APPS --}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarApps">
                <i class="ri-apps-2-line"></i>
                <span data-key="t-apps">Apps</span>
            </a>

            <div class="collapse menu-dropdown" id="sidebarApps">
                <ul class="nav nav-sm flex-column">

                    <li class="nav-item">
                        <a href="{{ asset('Backend/assets/pages/apps-chat.html') }}" class="nav-link">
                            Chat
                        </a>
                    </li>

                    {{-- EMAIL --}}
                    <li class="nav-item">
                        <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false">
                            Email
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarEmail">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ asset('Backend/assets/pages/apps-mailbox.html') }}" class="nav-link">
                                        Mailbox
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ asset('Backend/assets/pages/apps-email-basic.html') }}"
                                        class="nav-link">
                                        Email Template
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ asset('Backend/assets/pages/apps-todo.html') }}" class="nav-link">
                            To Do
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ asset('Backend/assets/pages/apps-api-key.html') }}" class="nav-link">
                            API Key
                        </a>
                    </li>

                </ul>
            </div>
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
                        <a href="{{ asset('Backend/assets/pages/apps-ecommerce-products.html') }}" class="nav-link">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('Backend/assets/pages/apps-ecommerce-orders.html') }}" class="nav-link">
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('Backend/assets/pages/apps-ecommerce-customers.html') }}" class="nav-link">
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
                <span data-key="t-authentication">Authentication</span>
            </a>

            <div class="collapse menu-dropdown" id="sidebarAuth">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
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
                        <a href="{{ asset('Backend/assets/pages/tables-datatables.html') }}" class="nav-link">
                            Datatables
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>
