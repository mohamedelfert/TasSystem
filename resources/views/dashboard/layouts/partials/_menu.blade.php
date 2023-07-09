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

            <li class=" nav-item @if(Request::is('dashboard/countries')) active  @endif">
                <a href="{{ route('dashboard.countries.index') }}">
                    <i class="feather icon-globe"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Countries')}}</span>
                </a>
            </li>

            <li class=" nav-item @if(Request::is('dashboard/branches')) active  @endif">
                <a href="{{ route('dashboard.branches.index') }}">
                    <i class="feather icon-server"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('Branches')}}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
