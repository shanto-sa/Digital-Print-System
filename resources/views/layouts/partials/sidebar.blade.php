<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images/uploads/logo.png') }}" alt="" width="50">
            </span>
            <span class="app-brand-text  menu-text fw-bolder ms-2">আরাফাত প্রিন্টিং</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="{{ request()->routeIs('dashboard') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>

                <div data-i18n="Analytics">ড্যাশবোর্ড</div>
            </a>
        </li>

        <li class="{{ request()->routeIs('map_search') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('map_search') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>

                <div data-i18n="ম্যাপ">ম্যাপ সার্চ</div>
            </a>
        </li>



        @canany(['dag-view', 'dag-create'])
            <li class="{{ request()->routeIs('dags*') ? 'menu-item active open' : 'menu-item' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">

                    <i class='menu-icon tf-icons bx bxs-map-alt'></i>
                    <div data-i18n="Dags">ম্যাপ</div>
                </a>
                <ul class="menu-sub">

                    @can('dag-view')
                        <li class="{{ request()->routeIs('dags.index') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('dags.index') }}" class="menu-link">
                                <div data-i18n="All">সকল </div>
                            </a>
                        </li>
                    @endcan
                    @can('dag-create')
                        <li class="{{ request()->routeIs('dags.create') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('dags.create') }}" class="menu-link">
                                <div data-i18n="Create">তৈরী করুন </div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany


        @canany(['location-view', 'location-create'])
            <li class="{{ request()->routeIs('locations*') ? 'menu-item active open' : 'menu-item' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">

                    <i class='menu-icon tf-icons bx bxs-map'></i>
                    <div data-i18n="Locations">বিভাগ</div>
                </a>
                <ul class="menu-sub">

                    @can('location-view')
                        <li class="{{ request()->routeIs('locations.index') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('locations.index') }}" class="menu-link">
                                <div data-i18n="All">সকল </div>
                            </a>
                        </li>
                    @endcan
                    @can('location-create')
                        <li class="{{ request()->routeIs('locations.create') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('locations.create') }}" class="menu-link">
                                <div data-i18n="Create">তৈরী করুন </div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany


        @canany(['mouza-view', 'mouza-create'])
            <li class="{{ request()->routeIs('mouzas*') ? 'menu-item active open' : 'menu-item' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">

                    <i class='menu-icon tf-icons bx bxs-map-pin'></i>
                    <div data-i18n="Mouzas">থানা</div>
                </a>
                <ul class="menu-sub">

                    @can('mouza-view')
                        <li class="{{ request()->routeIs('mouzas.index') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('mouzas.index') }}" class="menu-link">
                                <div data-i18n="All">সকল </div>
                            </a>
                        </li>
                    @endcan
                    @can('mouza-create')
                        <li class="{{ request()->routeIs('mouzas.create') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('mouzas.create') }}" class="menu-link">
                                <div data-i18n="Create">তৈরী করুন </div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany


        @canany(['mouzanew-view', 'mouzanew-create'])
            <li class="{{ request()->routeIs('mouzasnew*') ? 'menu-item active open' : 'menu-item' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">

                    <i class='menu-icon tf-icons bx bxs-map-pin'></i>
                    <div data-i18n="Mouzasnew">মৌজা</div>
                </a>
                <ul class="menu-sub">
                    @can('mouzanew-view')
                        <li class="{{ request()->routeIs('mouzasnew.index') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('mouzasnew.index') }}" class="menu-link">
                                <div data-i18n="All">সকল </div>
                            </a>
                        </li>
                    @endcan
                    @can('mouzanew-create')
                        <li class="{{ request()->routeIs('mouzasnew.create') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('mouzasnew.create') }}" class="menu-link">
                                <div data-i18n="Create">তৈরী করুন </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        <li class="{{ request()->routeIs('report.basic') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('report.basic') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>

                <div data-i18n="রিপোর্ট ">রিপোর্ট </div>
            </a>
        </li>



        @canany(['general-settings-view', 'system-settings-view'])

            <li
                class="{{ request()->routeIs('general_settings.edit') || request()->routeIs('system_settings.edit') ? 'menu-item active open' : 'menu-item' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class=' menu-icon tf-icons bx bxs-user-account'></i>
                    <div data-i18n="Settings">সেটিংস</div>
                </a>
                <ul class="menu-sub">





                    @canany(['role-view', 'user-view'])
                        <li class="{{ request()->routeIs('users*') ? 'menu-item active open' : 'menu-item' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class=' menu-icon tf-icons bx bxs-user-account'></i>
                                <div data-i18n="Users">ব্যবহারকারী</div>
                            </a>
                            <ul class="menu-sub">

                                @can('user-view')
                                    <li class="{{ request()->routeIs('users.index') ? 'menu-item active' : 'menu-item' }}">
                                        <a href="{{ route('users.index') }}" class="menu-link">
                                            <div data-i18n="All">সকল</div>
                                        </a>
                                    </li>
                                @endcan
                                @can('user-create')
                                    <li class="{{ request()->routeIs('users.create') ? 'menu-item active' : 'menu-item' }}">
                                        <a href="{{ route('users.create') }}" class="menu-link">
                                            <div data-i18n="Create">তৈরী করুন </div>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>

                        @canany(['role-view', 'role-create'])
                            <li class="{{ request()->routeIs('roles*') ? 'menu-item active open' : 'menu-item' }}">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">

                                    <i class='menu-icon tf-icons bx bxs-user-check'></i>
                                    <div data-i18n="Roles">রোলস</div>
                                </a>
                                <ul class="menu-sub">

                                    @can('role-view')
                                        <li class="{{ request()->routeIs('roles.index') ? 'menu-item active' : 'menu-item' }}">
                                            <a href="{{ route('roles.index') }}" class="menu-link">
                                                <div data-i18n="All">সকল </div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('role-create')
                                        <li class="{{ request()->routeIs('roles.create') ? 'menu-item active' : 'menu-item' }}">
                                            <a href="{{ route('roles.create') }}" class="menu-link">
                                                <div data-i18n="Create">তৈরী করুন </div>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany
                    @endcanany


                    @can('general-settings-view')
                        <li class="{{ request()->routeIs('general_settings.edit') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('general_settings.edit') }}" class="menu-link">
                                <div data-i18n="General Settings">জেনারেল সেটিংস</div>
                            </a>
                        </li>
                    @endcan
                    @can('system-settings-view')
                        <li class="{{ request()->routeIs('system_settings.edit') ? 'menu-item active' : 'menu-item' }}">
                            <a href="{{ route('system_settings.edit') }}" class="menu-link">
                                <div data-i18n="System Settings">সিস্টেম সেটিংস</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany
    </ul>
</aside>
