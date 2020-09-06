@php
    $locale = app()->getLocale();
@endphp
        <!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/site/pricing/css/demo.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/site/pricing/css/style.css")}}"/>
    @yield("css")
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/vendors.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/slider.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/prism.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/slider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/delivery.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/media.css")}}">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script type="text/javascript" src="{{asset("/site/pricing/js/modernizr.custom.53451.js")}}"></script>

</head>
<body>
<!-- header start -->
<header>
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="language_block">
                        <div class="dropdown">

                            <img src="{{asset(getLanguageFlag())}}">
                            <a class="language_btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('home.language')}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item @if(\Session::get('lng')=='az') active @endif"
                                   href="{{route('lng',['lng'=>'az'])}}">
                                    <img src="{{asset('/site/img/az.png')}}" alt=""> AZ</a>
                                <a class="dropdown-item @if(\Session::get('lng')=='tr') active @endif"
                                   href="{{route('lng',['lng'=>'tr'])}}"><img src="{{asset('/site/img/tr.png')}}"
                                                                              alt=""> TR</a>
                                <a class="dropdown-item @if(\Session::get('lng')=='ru') active @endif"
                                   href="{{route('lng',['lng'=>'ru'])}}"><img src="{{asset('/site/img/ru.jpg')}}"
                                                                              alt=""> RU</a>
                                <a class="dropdown-item @if(\Session::get('lng')=='en') active @endif"
                                   href="{{route('lng',['lng'=>'en'])}}"><img src="{{asset('/site/img/en.png')}}"
                                                                              alt=""> EN</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="header_top_right m-none">
                        <div class="row">
                            <div class="col-sm-4 col-4">
                                <div class="phone_text text-md-right">
                                    <img src="{{"/site/image/phone.png"}}">
                                    <span> {{ translate('call') }}: </span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div class="phone">
                                    @foreach($contact as $contact)
                                        <span>{{$contact->phone}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-4 col-4 ">
                                @if(Auth::guard("customers")->user())
                                    <a href="{{route("getSiteAccount")}}" class="text-white">
                                        <div class="sign_in">
                                            <span>{{ translate('account') }}</span>
                                        </div>
                                    </a>
                                @else
                                    <div class="sign_in" data-toggle="modal" data-target="#login">
                                        <span>{{ translate('signin') }}</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand text-white" href="{{route("getSiteHome")}}">
                    <img src="{{asset("/site/image/logo.png")}}" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("getSiteServices")}}">{{ translate('services') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("getSiteShop")}}">{{ translate('shop') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("getSiteCountry")}}">{{ translate('countries') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route("getSiteInformation")}}">{{ translate('information') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("getSiteAbout")}}">{{ translate('about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("getSiteContact")}}">{{ translate('contact') }}</a>
                        </li>
                        <li>
                            <div class="header_top_right m-block">
                                <div class="row">
                                    <div class="col-12">
                                        @if(Auth::guard("customers")->user())
                                            <a href="{{route("getSiteAccount")}}" class="text-white">
                                                <div class="sign_in">
                                                    <span>{{ translate('account') }}</span>
                                                </div>
                                            </a>
                                        @else
                                            <div class="sign_in" data-toggle="modal" data-target="#login">
                                                <span>{{ translate('signin') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>
    </div>
</header>
@yield("content")
<!-- footer start -->
<footer>
    <div class="footer_top">
        <div class="container">
            <div class="footer_nav">
                <div class="row">
                    <div class="col-md-2">
                        <div class="footer_logo text-center">
                            <a class="navbar-brand text-white" href="{{route("getSiteHome")}}">
                                <img src="{{asset("/site/image/logo.png")}}" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="footer_block">
                                    <p><a href="{{route("getSiteServices")}}">{{ translate('services') }}</a></p>
                                    <p><a href="{{route("getSiteCountry")}}">{{ translate('price_table') }}</a></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="footer_block">
                                    <p><a href="{{route("getSiteCarriage")}}">{{ translate('transportation') }}</a></p>
                                    <p><a href="{{route("getSiteForbidden")}}">{{ translate('Prohibited goods') }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="footer_block">
                                    <p><a href="{{route("getSiteAbout")}}">{{ translate('about') }}</a></p>
                                    <p><a href="{{route("getSiteCountry")}}">{{ translate('countries') }}</a></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="footer_block">
                                    <p><a href="{{route("getSiteFaq")}}">{{ translate('faq') }}</a></p>
                                    <p><a href="{{route("getSiteContact")}}">{{ translate('contact') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_socials_block">
                <div class="footer_socials">
                    <ul>
                        <li>
                            <div class="social_radius">
                                <a href="">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="social_radius">
                                <a href="">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="social_radius">
                                <a href="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom"></div>
</footer>
<!-- Modal -->
<div class="modal fade" id="login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modelhead">
                    <div class="login_top">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" id="nav1">
                                <a class="nav-link active " id="home-tab" data-toggle="tab"
                                   href="#home">{{ translate('signin') }}</a>
                            </li>
                            <li class="nav-item" id="nav2">
                                <a class="nav-link " id="profile-tab" data-toggle="tab"
                                   href="#profile">{{translate('register')}}</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="login_bottom">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home">
                            <div class="block-form pt-5">
                                <form action="{{route("postSiteLogin")}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ translate('email') }}:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ translate('password') }}:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="checkbox" name="remember" value="0" style="appearance: auto;">
                                            <span>{{ translate('rememberme') }}?</span>
                                        </div>
                                    </div>
                                    <div class="form-group row forgot">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <a href="{{route("showLinkRequestForm")}}"><span>{{ translate('forgotpassword') }} ?</span></a>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <button type="submit"
                                                class="form-control sign_btn">{{ translate('signin') }}</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="block-form pt-5">
                                <form action="{{route("postSiteRegister")}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ translate('email') }}:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ translate('password') }}:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ translate('confirmpassword') }}:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <button type="submit"
                                                class="form-control sign_btn">{{ translate('signin') }}</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="{{asset("/site/js/jquery.js")}}"></script>
<script src="{{asset("/site/js/core-js.min.js")}}"></script>
<script src="{{asset("/site/js/swiper.min.js")}}"></script>
<script src="{{asset("/site/js/headroom.js")}}"></script>
<script src="{{asset("/site/js/totop.js")}}"></script>
<script src="{{asset("/admin/assets/js/validate/jquery.validate.min.js")}}"></script>
<script src="{{asset("/admin/assets/js/validate/messages_".$locale.".js")}}"></script>
<script>
    $("#form").validate();
</script>
<script src="{{asset("/admin/assets/js/status.js")}}"></script>
@yield("js")
<div class="totop"><i class="fa fa-angle-up"></i></div>
<script src="{{asset("/site/ajax/view.js")}}"></script>
<script src="{{asset("/site/js/delivery.js")}}"></script>


</body>
</html>
