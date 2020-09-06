@extends("main.site")
@section("content")
    <!-- home cover slider start -->
    <section class="m-carousel" data-component="Carousel">
        <svg width="0" height="0">
            <defs>
                <clipPath id="m-carousel__clip-path" clipPathUnits="objectBoundingBox">
                    <path d="M0,0 L0,0.9174311926605505 Q0.5,1.0825688073394495 1,0.9174311926605505 L1,0 Z"
                          stroke-width="0"/>
                </clipPath>
                <clipPath id="m-carousel__clip-path--mobile" clipPathUnits="objectBoundingBox">
                    <path d="M0,0 L0,0.9764705882352941 Q0.5,1.0235294117647058 1,0.9764705882352941 L1,0 Z"
                          stroke-width="0"/>
                </clipPath>
            </defs>
        </svg>
        <div class="m-slider" data-component='{ "type": "Slider" , "pagination": false, "navigation": true }'>
            <div class="m-slider__swiper swiper-container">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div id="banner-{{$slider->id}}" data-ga-id="1757,All" data-ga-name="banner"
                             data-ga-creative="samsung-galaxy-s20-kampanyasi" data-ga-position="{{$slider->id}}"
                             data-ga-event-label="Banner-/anasayfa" data-background="{{Storage::url($slider->image)}}"
                             class="swiper-slide swiper-lazy background-position-center">
                            <div class="m-grid">
                                <div class="m-grid">
                                    <div class="m-carousel__desc m-carousel__desc--text-shadow"><h3
                                                data-animation="slideInLeft"><span>{{$slider->title()}}</span></h3>
                                        <h3 data-animation="slideInLeft">{!!$slider->content()!!}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="container m-slider__container">


                <a class="a-btn-icon m-slider__prev a-btn-icon--circle" href="javascript:;" title="">
                    <img src="{{asset("/site/image/left.png")}}" class="img-fluid">
                </a>


                <a class="a-btn-icon m-slider__next a-btn-icon--circle" href="javascript:;" title="">
                    <img src="{{asset("/site/image/right.png")}}" class="img-fluid">
                </a>
            </div>
        </div>


        <div class="a-bullets" data-component='{ "count" : "4",  "type" : "Bullets" }'>
            <svg style="height: 100%;">
                <defs>
                    <clipPath id="bullets-clip-path-1">
                        <rect class="a-bullets__clip" x="0" y="0" width="0" height="0"/>
                    </clipPath>
                    <linearGradient id="bullets-stroke-gradient">
                        <stop offset="0%" stop-color="#ffc900"/>
                        <stop offset="100%" stop-color="#eeb116"/>
                    </linearGradient>
                </defs>
                <path class="a-bullets__bg" d=""/>
                <g clip-path="url(#bullets-clip-path-1)">
                    <path class="a-bullets__item" d="" stroke="url(#bullets-stroke-gradient)"/>
                </g>
            </svg>
            <ul class="m-flex"></ul>
        </div>
    </section>
    <!-- home card start -->
    <section id="home_card">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="home_card_img icon{{$service->id}}">
                                <img src="{{Storage::url($service->image)}}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$service->title()}}</h5>
                                <p class="card-text">{!!substr($service->content(),0,100)!!}...</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- home calculate start -->
    <section id="home_calculate">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="home_calculate_img">
                        <img src="{{asset("/site/image/kule.png")}}" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-5">
                    @includeIf('partials.session-message')
                    <div class="calculate_block">
                        <h2>{{ translate('calculate') }}</h2>
                        @include("site.calculate.calculate")
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home day offer start -->
    <section id="day_offer">
        <div class="container">
            <h2>{{ translate('offer_day') }}</h2>
            <div class="row">
                @foreach($informations as $information)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{Storage::url($information->image)}}" class="card-img-top innovation_image">
                            <div class="card-body">
                                <h6 class="card-title">{{$information->title()}}</h6>
                                <p class="card-text">{!!substr($information->content(),0,100)!!}</p>
                                <div class="text-center">
                                    <a href="{{route('getSiteInformationSingle',[$information->id])}}">{{ translate('read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- home order count start -->
    <section id="order_count">
        <div class="count_overlay">
            <div class="container">
                <div class="row">
                    @php
                        $i=1;
                    @endphp
                    @foreach($annotations as $annotation)
                        <div class="col-md-4">
                            <div class="order_count_block">
                                <h1>{{$i}}.</h1>
                                <div class="order_count_text">
                                    <h5>{{$annotation->title()}}</h5>
                                    <p>{!!$annotation->content()!!}</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- home pricing start -->
    <section id="pricing">
        <div class="container">
            <h2>{{ translate('pricing_delivery') }}</h2>

            <section id="dg-container" class="dg-container">
                <div class="dg-wrapper">
                    <a href="javascript:void(0)" class="block">
                        <div class="pricing_top">
                            <img src="{{asset("/site/image/usa.png")}}" class="img-fluid">
                            <h4>{{ translate('usa') }}</h4>
                        </div>
                        <div class="pricing_bottom">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/usa.png")}}" class="img-fluid">
                                <h4>{{ translate('usa') }}</h4>
                            </div>
                            <div class="pricing_last ">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="block">
                        <div class="pricing_top">
                            <img src="{{asset("/site/image/russian.png")}}" class="img-fluid">
                            <h4>{{ translate('russian') }}</h4>
                        </div>
                        <div class="pricing_bottom" id="fff">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/russian.png")}}" class="img-fluid">
                                <h4>{{ translate('russian') }}</h4>
                            </div>
                            <div class="pricing_last">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="block">
                        <div class="pricing_top">
                            <img src="{{asset("/site/image/turkish.png")}}" class="img-fluid">
                            <h4>{{ translate('turkey') }}</h4>
                        </div>
                        <div class="pricing_bottom">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/turkish.png")}}" class="img-fluid">
                                <h4>{{ translate('turkey') }}</h4>
                            </div>
                            <div class="pricing_last">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </a>

                </div>
            </section>
        </div>
        </div>
    </section>
    <!-- home mobile string -->
    <section id="m-pricing">
        <div class="container">
            <div class="row">
                <ul class="slider" id="fullscreen-slider">
                    <li>
                        <div class="pricing_bottom">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/usa.png")}}" class="img-fluid">
                                <h4>{{ translate('usa') }}</h4>
                            </div>
                            <div class="pricing_last ">
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pricing_bottom">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/russian.png")}}" class="img-fluid">
                                <h4>{{ translate('russian') }}</h4>
                            </div>
                            <div class="pricing_last ">
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pricing_bottom">
                            <div class="pricing_first">
                                <img src="{{asset("/site/image/turkish.png")}}" class="img-fluid">
                                <h4>{{ translate('turkey') }}</h4>
                            </div>
                            <div class="pricing_last ">
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    <tr>
                                        <td>0 kg - 0.25 kg</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                        <td>1.5 USD</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- home contact us start -->
    <section id="contact">
        <div class="container">
            <h2>{{ translate('contact') }}</h2>
            <div class="row">
                @if(count($contacts))
                    @foreach($contacts as $contact)
                        <div class="col-sm-6 media-576">
                            <div class="row contact_rows">
                                <div class="col-md-6 col-4">
                                    <div class="contact_text contact_head">
                                        <p>{{ translate('mobile_number') }}:</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-8">
                                    <div class="contact_text">
                                        <p>{{$contact->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-4">
                                    <div class="contact_text contact_head">
                                        <p>{{ translate('whatsapp_number') }}:</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-8">
                                    <div class="contact_text">
                                        <p>{{$contact->wp}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-4">
                                    <div class="contact_text contact_head">
                                        <p>{{ translate('address') }}:</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-8">
                                    <div class="contact_text">
                                        <p>{!!$contact->address_az!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-sm-6">
                    <div class="contact_map">
                        <img src="{{asset("/site/image/map.png")}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home partners start -->
    @if(is_null($shops))
        <section id="partners">
            <div class="container">
                <div id="mixedSlider">
                    <div class="MS-content">
                        @foreach($shops as $shop)
                            <div class="item">
                                <div class="imgTitle">
                                    <div class="partners_image">
                                        <img src="{{Storage::url($shop->image)}}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="MS-controls">
                        <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                        <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection


@section("css")
    <link rel="stylesheet" type="text/css" href="{{asset("/site/css/app.desktop.min.css")}}">
@endsection
@section("js")
    <script src="{{asset("/site/js/rivets.bundled.min.js")}}"></script>
    <script src="{{asset("/site/js/app.desktop.min.js")}}"></script>
    <script src="{{asset("/site/js/multislider.js")}}"></script>
    <script src="{{asset("/site/js/rl-carousel.js")}}"></script>
    <script type="text/javascript" src="{{asset("/site/pricing/js/jquery.gallery.js")}}"></script>
    <script type="text/javascript" src="{{asset("/site/js/slider-pricing.js")}}"></script>
    <script type="text/javascript" src="{{asset("/site/js/prism.js")}}"></script>
    <script src="{{asset("/site/ajax/home.js")}}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".calculate_btn").click(function (e) {
                e.preventDefault();
                let width = $("#width").val();
                let height = $("#height").val();
                let depth = $("#depth").val();
                let weight = $("#weight").val();
                let country_id = $("#country_id").val();

                $.ajax({
                    type: 'POST',
                    url: '{{route("postCalculate")}}',
                    data: {
                        width: width,
                        height: height,
                        depth: depth,
                        weight: weight,
                        country_id: country_id
                    },
                    success: function (data) {
                        $("#result").html(data.price + " USD");
                    }
                });

            });
        })
    </script>
@endsection
