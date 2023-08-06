<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Login {{env('APP_NAME')}}</title>
        <link rel="apple-touch-icon" href="{{asset('assets/dashboard/resources/app-assets/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dashboard/resources/app-assets/images/ico/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/vendors/css/vendors.min.css')}}">
        <!-- END: Vendor CSS-->
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/themes/semi-dark-layout.css')}}">
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/app-assets/css/pages/authentication.css')}}">
        <!-- END: Page CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources/assets/css/style.css')}}">
        <!-- END: Custom CSS-->
    </head>
    <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
        <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-language nav-item">
                <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon @if(appDirection() == 'rtl') flag-icon-sa @else flag-icon-us @endif">
                    </i>
                    <span class="selected-language">
                            @if(appDirection() == 'rtl')
                            عربي
                        @else
                            English
                        @endif
                        </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">
                        <i class="flag-icon flag-icon-us"></i> English
                    </a>
                    <a class="dropdown-item" href="{{ url('lang/ar') }}" data-language="ar">
                        <i class="flag-icon flag-icon-sa"></i> عربي
                    </a>
                </div>
            </li>
        </ul>

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-xl-8 col-11 d-flex justify-content-center">
                            <div class="card bg-authentication rounded-0 mb-0">
                                <div class="row m-0">
                                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                        <img src=" {{asset('assets/dashboard/resources/app-assets/images/pages/login.png')}}" alt="branding logo">
                                    </div>
                                    <div class="col-lg-6 col-12 p-0">
                                        <div class="card rounded-0 mb-0 px-2">
                                            <div class="card-header pb-1">
                                                <div class="card-title">
                                                    <h3 style="font-family: 'Cairo', sans-serif" class="text-center">{{__('main.teacher_login')}}</h3>
                                                </div>
                                            </div>
                                            <p class="px-2">{{__('main.login_welcome_msg')}}</p>
                                            <div class="card-content">
                                                <div class="card-body pt-1">

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <form method="POST" action="{{ route('teacherLogin') }}" aria-label="{{ __('main.login') }}">
                                                        @csrf

                                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="user-name" placeholder="{{__('main.email')}}" required>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                            <label for="user-name">{{__('main.email')}}</label>
                                                        </fieldset>

                                                        <fieldset class="form-label-group position-relative has-icon-left">
                                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="{{__('main.password')}}" required>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-lock"></i>
                                                            </div>
                                                            <label for="user-password">{{__('main.password')}}</label>
                                                        </fieldset>

                                                        <div class="form-group d-flex justify-content-between align-items-center">
                                                            <div class="text-left">
                                                                <fieldset class="checkbox">
                                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="">{{__('main.remember_me')}}</span>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            {{--                                                    <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">{{__('Forgot Password?')}}</a></div>--}}
                                                        </div>
                                                        <button type="submit" class="btn btn-primary float-right btn-inline">{{__('main.login')}}</button>
                                                        <a href="/" class="btn btn-secondary float-left btn-inline"> {{__('main.home')}} <i class="fa fa-arrow-left"></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="login-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script src=" {{asset('assets/dashboard/resources/app-assets/vendors/js/vendors.min.js')}}"></script>
        <script src=" {{asset('assets/dashboard/resources/app-assets/js/core/app-menu.js')}}"></script>
        <script src=" {{asset('assets/dashboard/resources/app-assets/js/core/app.js')}}"></script>
        <script src=" {{asset('assets/dashboard/resources/app-assets/js/scripts/components.js')}}"></script>
    </body>
</html>
