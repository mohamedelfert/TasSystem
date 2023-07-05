<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{__(env('APP_NAME'))}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @if(Request::is('dashboard/home')) active open  @endif">
                <a href="{{ route('dashboard.home') }}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('Home')}}</span>
                </a>
            </li>

            <li class=" nav-item ">
                <a href="#"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Starter kit">{{__('Orders')}}</span></a>
                <ul class="menu-content">

                    <li class=" nav-item @if(Request::is('dashboard/clients')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Clients')}}</span>
                        </a>
                    </li>
                    <li class=" nav-item @if(Request::is('dashboard/orders')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Orders')}}</span>
                        </a>
                    </li>
                    <li class=" nav-item @if(Request::is('dashboard/promocodes')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-folder"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Promocodes')}}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item @if(Request::is('dashboard/countries')) active  @endif">
                <a href="{{ route('dashboard.countries.index') }}">
                    <i class="feather icon-folder"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Countries')}}</span>
                </a>
            </li>


            <li class=" nav-item ">
                <a href="#"><i class="feather icon-cogs"></i><span class="menu-title" data-i18n="Starter kit">{{__('General setups')}}</span></a>
                <ul class="menu-content">
                    <li class=" nav-item @if(Request::is('dashboard/pages')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-layers"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Pages')}}</span>
                        </a>
                    </li>

                    <li class=" nav-item @if(Request::is('dashboard/contact-us')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-phone-call"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Contact us Sections')}}</span>
                        </a>
                    </li>

                    <li class=" nav-item @if(Request::is('dashboard/system-options')) active open  @endif">
                        <a href="#">
                            <i class="feather icon-phone-call"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('System options')}}</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
