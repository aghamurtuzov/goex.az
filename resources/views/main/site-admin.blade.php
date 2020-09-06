@php
    $locale = app() ->getLocale();
@endphp

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Site Admin</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset("/admin/assets/global_assets/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/css/bootstrap_limitless.min.css")}}" rel="stylesheet" type="text/css">
    <style>
        .sidebar-expand-md {
            margin-left: 0 !important;
        }

        .page-content {
            padding: 0 !important;
        }

        .swal2-icon.swal2-warning {
            color: #ff7043;
            border-color: #ff7043;
            font-size: 18px !important;
            line-height: 5rem;
            -ms-flex-pack: center;
            justify-content: center;
        }
    </style>
    <link href="{{asset("/admin/assets/css/layout.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/css/components.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/css/colors.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/css/alert.css")}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset("/admin/assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("/admin/assets/css/sweetalert.css")}}">
    <link href="{{asset("/admin/assets/global_assets/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">


    <script>
        let url_status = '{{ route("postModuleStatus") }}';
        let url_delete = '{{ route("postModuleDelete") }}';
    </script>

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light">

    <!-- Header with logos -->
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="" class="d-inline-block">
                <img src="{{asset("/admin/assets/global_assets/images/logo.png")}}" alt="">
            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="" class="d-inline-block">
                <img src="{{asset("/admin/assets/global_assets/images/logo.png")}}" alt="">
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="" class="d-inline-block">
                <img src="{{asset("/admin/assets/global_assets/images/logo.png")}}" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbar-mobile">

        <span class="navbar-text ml-md-3 mr-md-auto">

			</span>

        <ul class="navbar-nav">
            <a href="{{route('home')}}" style="padding: 6px;">
                <button class="btn btn-warning"><i class="icon-enter5 mr-2"></i>Sistem</button>
            </a>
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset("/admin/assets/")}}global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
                    English
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item english active"><img
                                src="{{asset("/admin/assets/global_assets/images/lang/gb.png")}}" class="img-flag"
                                alt="">
                        English</a>
                    <a href="#" class="dropdown-item ukrainian"><img
                                src="{{asset("/admin/assets/global_assets/images/lang/ua.png")}}" class="img-flag"
                                alt="">
                        Українська</a>
                    <a href="#" class="dropdown-item deutsch"><img
                                src="{{asset("/admin/assets/global_assets/images/lang/de.png")}}" class="img-flag"
                                alt="">
                        Deutsch</a>
                    <a href="#" class="dropdown-item espana"><img
                                src="{{asset("/admin/assets/global_assets/images/lang/es.png")}}" class="img-flag"
                                alt="">
                        España</a>
                    <a href="#" class="dropdown-item russian"><img
                                src="{{asset("/admin/assets/global_assets/images/lang/ru.png")}}" class="img-flag"
                                alt="">
                        Русский</a>
                </div>
            </li>

        </ul>
    </div>
    <!-- /navbar content -->

</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">


            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <li class="nav-item">
                        <a href="{{route("getShop")}}" class="nav-link"><i class="icon-cart5"></i>
                            <span>Mağaza</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getSlider")}}" class="nav-link"><i class="icon-images3"></i>
                            <span>Slayd</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getServices")}}" class="nav-link"><i class="icon-wrench3"></i>
                            <span>Xidmətlər</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getFaq")}}" class="nav-link"><i class="icon-copy"></i> <span>Faq</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getAboutEdit")}}" class="nav-link"><i class="icon-info22"></i>
                            <span>Haqqımızda</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route("getInformation")}}" class="nav-link"><i class="icon-info3"></i>
                            <span>Məlumat</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route("getConditionEdit")}}" class="nav-link"><i class="icon-airplane3"></i> <span>Daşınma Şərtləri</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getForbiddenProduct")}}" class="nav-link"><i class="icon-warning22"></i>
                            <span>Qadağan olunan mallar</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getAnnotation")}}" class="nav-link"><i class="icon-bubble-lines4"></i> <span>Annotasiya</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getContactEdit")}}" class="nav-link"><i class="icon-phone-incoming"></i>
                            <span>Bizimlə Əlaqə</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getAddress")}}" class="nav-link"><i class="icon-location3"></i>
                            <span>Ünvanlar</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route("getDictionary")}}" class="nav-link"><i class="icon-location4"></i>
                            <span>Sorakca</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("getTranslation")}}" class="nav-link"><i class="icon-location4"></i>
                            <span>Tercumeler</span></a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route("getTranslationGroup")}}" class="nav-link"><i class="icon-location4"></i>--}}
{{--                            <span>Tercume qrupu</span></a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">


        @yield("content")

    </div>
    <!-- /main content -->


</div>
<!-- /page content -->


<!-- Core JS files -->
<script src="{{asset("/admin/assets/global_assets/js/main/jquery.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/main/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/loaders/blockui.min.js")}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{asset("/admin/assets/global_assets/js/plugins/visualization/d3/d3.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/styling/switchery.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/daterangepicker.js")}}"></script>

<script src="{{asset("/admin/assets/js/app.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/dashboard.js")}}"></script>
<!-- /theme JS files -->
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/daterangepicker.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/picker_date.js")}}"></script>


<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/anytime.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/picker_date_rtl.js")}}"></script>

<script src="{{asset('/admin/assets/global_assets/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/admin/assets/global_assets/js/demo_pages/editor_ckeditor.js')}}"></script>


<script src="{{asset("/admin/assets/js/validate/jquery.validate.min.js")}}"></script>
<script src="{{asset("/admin/assets/js/validate/messages_".$locale.".js")}}"></script>
<script src="{{asset("/admin/assets/js/status.js")}}"></script>
<script src="{{asset("/admin/assets/js/sweetalert.min.js")}}"></script>

<!-- Core JS files -->
<!-- <script src="{{asset("/admin/assets/global_assets/js/main/jquery.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/main/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/loaders/blockui.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/slinky.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/ripple.min.js")}}"></script> -->
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/selects/select2.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/styling/uniform.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/extensions/jquery_ui/core.min.js")}}"></script>
<script
        src="{{asset("/admin/assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/tags/tagsinput.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/tags/tokenfield.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/inputs/touchspin.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/inputs/maxlength.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/inputs/formatter.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/inputs/inputmask.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/visualization/d3/d3.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/styling/switchery.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/daterangepicker.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/dashboard.js")}}"></script>

<script src="{{asset("/admin/assets/js/app.js")}}"></script>


<script src="{{asset("/admin/assets/global_assets/js/demo_pages/form_floating_labels.js")}}"></script>
<!-- /My Links -->
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/form_select2.js")}}"></script>
<script src="{{asset("/admin/assets/js/status.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/daterangepicker.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/picker_date.js")}}"></script>


<script src="{{asset("/admin/assets/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/plugins/pickers/anytime.min.js")}}"></script>
<script src="{{asset("/admin/assets/global_assets/js/demo_pages/picker_date_rtl.js")}}"></script>
<script src="{{asset("/admin/assets/js/validate/jquery.validate.min.js")}}"></script>
<script src="{{asset("/admin/assets/js/validate/messages_".$locale.".js")}}"></script>

<script>
    $("#form").validate();
</script>

@yield("js")
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/ckeditor/config.js')}}"></script>
<script src="{{asset('/ckeditor/build-config.js')}}"></script>

</body>
</html>
