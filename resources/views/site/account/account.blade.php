@extends("main.site")
@section("content")

    <section id="account">
        <div class="container">
            @includeIf('partials.session-message')
            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        {{--                        <a class="nav-link first_nav" id="v-pills-home-tab" data-toggle="pill" href="">--}}
                        {{--                            <i class="fa fa-user-circle-o"></i> Hesabım</a>--}}
                        <a class="nav-link first_nav link-tab {{ Session::get('active') == 1 ? 'active' : '' }}"
                           data-id="1"
                           id="v-pills-home-tab" data-toggle="pill" href="#dashboard"><i
                                    class="fa fa-tachometer"></i> {{ translate('dashboard') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 2 ? 'active' : '' }}"
                           id="v-pills-profile-tab"
                           data-id="2" data-toggle="pill" href="#myorder">
                            <i class="fa fa-first-order"></i> {{ translate('my_orders') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 3 ? 'active' : '' }}"
                           id="v-pills-messages-tab"
                           data-id="3" data-toggle="pill" href="#neworder">
                            <i class="fa fa-plus-square-o"></i>{{ translate('new_order') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 4 ? 'active' : '' }}"
                           id="v-pills-settings-tab"
                           data-id="4" data-toggle="pill" href="#price">
                            <i class="fa fa-calculator"></i>{{ translate('calculate_price') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 12 ? 'active' : '' }}"
                           id="v-pills-settings-tab"
                           data-id="12" data-toggle="pill" href="#statement">
                            <i class="fa fa-address-card"></i>{{ translate('statement') }}</a>
                        <a class="nav-link link-tab {{ Session::get('active') == 13 ? 'active' : '' }}"
                           id="v-pills-settings-tab"
                           data-id="13" data-toggle="pill" href="#new_statement">
                            <i class="fa fa-location-arrow"></i>{{ translate('new_statement') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 5 ? 'active' : '' }}"
                           id="v-pills-settings-tab"
                           data-id="5" data-toggle="pill" href="#payments">
                            <i class="fa fa-money"></i> {{ translate('pays') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 6 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="6" data-toggle="pill" href="#somewhere">
                            <i class="fa fa-map-marker"></i> {{ translate('addresses') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 7 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="7" data-toggle="pill" href="#balance">
                            <i class="fa fa-credit-card-alt"></i> {{ translate('balance') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 9 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="9" data-toggle="pill" href="#my_applies">
                            <i class="fa fa-envelope"></i>{{ translate('my_applies') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 10 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="10" data-toggle="pill" href="#new_apply">
                            <i class="fa fa-plus-square"></i>{{ translate('new_apply') }}</a>

                        <a class="nav-link link-tab {{ Session::get('active') == 11 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="11" data-toggle="pill" href="#my_map">
                            <i class="fa fa-map-marker"></i>{{ translate('map') }}</a>


                        <a class="nav-link link-tab {{ Session::get('active') == 8 ? 'active' : '' }}"
                           id="v-pills-home-tab"
                           data-id="8" data-toggle="pill" href="#private">
                            <i class="fa fa-user-secret"></i>{{ translate('own_information') }}</a>

                        <a class="nav-link logout" href="{{ route('logout') }}" id="logout"><i
                                    class="fa fa-sign-out"></i>
                            {{ translate('logout') }}</a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-7">
                    <div class="tab-content" id="v-pills-tabContent">
                        @if(!empty($result->passport) && !empty($result->passport_fin) && !empty($result->phone) && !empty($result->first_name) && !empty($result->last_name))
                            <div class="tab-pane fade {{ Session::get('active') == 1 ? 'active show' : '' }}"
                                 id="dashboard">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ translate('my_balance') }}</h5>
                                                    <h1 class="card-text">
                                                        @foreach($result->balances as $key => $balance)
                                                            @if(!$key)
                                                                {{ $balance->pivot->amount . ' ' . $balance->slug() }}
                                                            @endif
                                                        @endforeach
                                                    </h1>
                                                    <button id="v-pills-home-tab" data-toggle="pill" href="#balance">
                                                        {{ translate('increase_balance') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ translate('my_orders') }}</h5>
                                                    <h1 class="card-text">{{ count($orders) }} {{ translate('pieces') }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 2 ? 'active show' : '' }}"
                                 id="myorder">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table_head">
                                            <h2>{{ translate('pieces') }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-tabs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="all-order-tab" data-toggle="tab"
                                               href="#all-order" role="tab" aria-controls="all-order"
                                               aria-selected="true">Hamısı</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="basket-tab" data-toggle="tab" href="#basket"
                                               role="tab" aria-controls="basket" aria-selected="false">Səbət</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment"
                                               role="tab" aria-controls="payment" aria-selected="false">Ödənildi</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ordered-tab" data-toggle="tab" href="#ordered"
                                               role="tab" aria-controls="ordered" aria-selected="false">Sifariş
                                                verildi</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="order-del-tab" data-toggle="tab" href="#order-del"
                                               role="tab" aria-controls="order-del" aria-selected="false">Silindi</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="table-responsive-xl w-100">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="all-order" role="tabpanel"
                                             aria-labelledby="all-order-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ translate('link') }}</th>
                                                        <th>{{ translate('product_name') }}</th>
                                                        <th>{{ translate('quantity') }}</th>
                                                        <th>{{ translate('product_size') }}</th>
                                                        <th>{{ translate('color') }}</th>
                                                        <th>{{ translate('product_price') }}</th>
                                                        <th>{{ translate('kargo_price') }}</th>
                                                        <th>{{ translate('total_price') }}</th>
                                                        <th>{{ translate('description') }}</th>
                                                        <th>{{ translate('check') }}</th>
                                                        <th>{{ translate('date') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderLinks as $orderLink)
                                                        <tr>
                                                            <td><a href="{{$orderLink->link}}">Məhsulun linki</a></td>
                                                            <td>{{$orderLink->product_name}}</td>
                                                            <td>{{$orderLink->quantity}}</td>
                                                            <td>{{$orderLink->product_size}}</td>
                                                            <td>{{$orderLink->color}}</td>
                                                            <td>{{$orderLink->product_price}}</td>
                                                            <td>{{$orderLink->kargo_price}}</td>
                                                            <td>{{$orderLink->total_price}}</td>
                                                            <td>{{$orderLink->description}}</td>
                                                            <td>{{$orderLink->check ? 'Bəli' : 'Xeyr'}}</td>
                                                            <td>{{$orderLink->date}}</td>
                                                        </tr>

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order-paginate">
                                                @php $results = $orders  @endphp
                                                @include('partials.pagination')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="basket" role="tabpanel"
                                             aria-labelledby="basket-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ translate('link') }}</th>
                                                        <th>{{ translate('product_name') }}</th>
                                                        <th>{{ translate('quantity') }}</th>
                                                        <th>{{ translate('product_size') }}</th>
                                                        <th>{{ translate('color') }}</th>
                                                        <th>{{ translate('product_price') }}</th>
                                                        <th>{{ translate('kargo_price') }}</th>
                                                        <th>{{ translate('total_price') }}</th>
                                                        <th>{{ translate('description') }}</th>
                                                        <th>{{ translate('check') }}</th>
                                                        <th>{{ translate('date') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderLinks as $orderLink)
                                                        @if($orderLink->situation == 1)
                                                            <tr>
                                                                <td><a href="{{$orderLink->link}}">Məhsulun linki</a>
                                                                </td>
                                                                <td>{{$orderLink->product_name}}</td>
                                                                <td>{{$orderLink->quantity}}</td>
                                                                <td>{{$orderLink->product_size}}</td>
                                                                <td>{{$orderLink->color}}</td>
                                                                <td>{{$orderLink->product_price}}</td>
                                                                <td>{{$orderLink->kargo_price}}</td>
                                                                <td>{{$orderLink->total_price}}</td>
                                                                <td>{{$orderLink->description}}</td>
                                                                <td>{{$orderLink->check ? 'Bəli' : 'Xeyr'}}</td>
                                                                <td>{{$orderLink->date}}</td>
                                                            </tr>
                                                        @endif

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order-paginate">
                                                @php $results = $orders  @endphp
                                                @include('partials.pagination')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="payment" role="tabpanel"
                                             aria-labelledby="payment-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ translate('link') }}</th>
                                                        <th>{{ translate('product_name') }}</th>
                                                        <th>{{ translate('quantity') }}</th>
                                                        <th>{{ translate('product_size') }}</th>
                                                        <th>{{ translate('color') }}</th>
                                                        <th>{{ translate('product_price') }}</th>
                                                        <th>{{ translate('kargo_price') }}</th>
                                                        <th>{{ translate('total_price') }}</th>
                                                        <th>{{ translate('description') }}</th>
                                                        <th>{{ translate('check') }}</th>
                                                        <th>{{ translate('date') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderLinks as $orderLink)
                                                        @if($orderLink->situation == 2)
                                                            <tr>
                                                                <td><a href="{{$orderLink->link}}">Məhsulun linki</a>
                                                                </td>
                                                                <td>{{$orderLink->product_name}}</td>
                                                                <td>{{$orderLink->quantity}}</td>
                                                                <td>{{$orderLink->product_size}}</td>
                                                                <td>{{$orderLink->color}}</td>
                                                                <td>{{$orderLink->product_price}}</td>
                                                                <td>{{$orderLink->kargo_price}}</td>
                                                                <td>{{$orderLink->total_price}}</td>
                                                                <td>{{$orderLink->description}}</td>
                                                                <td>{{$orderLink->check ? 'Bəli' : 'Xeyr'}}</td>
                                                                <td>{{$orderLink->date}}</td>
                                                            </tr>
                                                        @endif

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order-paginate">
                                                @php $results = $orders  @endphp
                                                @include('partials.pagination')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="ordered" role="tabpanel"
                                             aria-labelledby="ordered-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ translate('link') }}</th>
                                                        <th>{{ translate('product_name') }}</th>
                                                        <th>{{ translate('quantity') }}</th>
                                                        <th>{{ translate('product_size') }}</th>
                                                        <th>{{ translate('color') }}</th>
                                                        <th>{{ translate('product_price') }}</th>
                                                        <th>{{ translate('kargo_price') }}</th>
                                                        <th>{{ translate('total_price') }}</th>
                                                        <th>{{ translate('description') }}</th>
                                                        <th>{{ translate('check') }}</th>
                                                        <th>{{ translate('date') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderLinks as $orderLink)
                                                        @if($orderLink->situation == 3)
                                                            <tr>
                                                                <td><a href="{{$orderLink->link}}">Məhsulun linki</a>
                                                                </td>
                                                                <td>{{$orderLink->product_name}}</td>
                                                                <td>{{$orderLink->quantity}}</td>
                                                                <td>{{$orderLink->product_size}}</td>
                                                                <td>{{$orderLink->color}}</td>
                                                                <td>{{$orderLink->product_price}}</td>
                                                                <td>{{$orderLink->kargo_price}}</td>
                                                                <td>{{$orderLink->total_price}}</td>
                                                                <td>{{$orderLink->description}}</td>
                                                                <td>{{$orderLink->check ? 'Bəli' : 'Xeyr'}}</td>
                                                                <td>{{$orderLink->date}}</td>
                                                            </tr>
                                                        @endif

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order-paginate">
                                                @php $results = $orders  @endphp
                                                @include('partials.pagination')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="order-del" role="tabpanel"
                                             aria-labelledby="order-del-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ translate('link') }}</th>
                                                        <th>{{ translate('product_name') }}</th>
                                                        <th>{{ translate('quantity') }}</th>
                                                        <th>{{ translate('product_size') }}</th>
                                                        <th>{{ translate('color') }}</th>
                                                        <th>{{ translate('product_price') }}</th>
                                                        <th>{{ translate('kargo_price') }}</th>
                                                        <th>{{ translate('total_price') }}</th>
                                                        <th>{{ translate('description') }}</th>
                                                        <th>{{ translate('check') }}</th>
                                                        <th>{{ translate('date') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderLinks as $orderLink)
                                                        @if($orderLink->situation == 4)
                                                            <tr>
                                                                <td><a href="{{$orderLink->link}}">Məhsulun linki</a>
                                                                </td>
                                                                <td>{{$orderLink->product_name}}</td>
                                                                <td>{{$orderLink->quantity}}</td>
                                                                <td>{{$orderLink->product_size}}</td>
                                                                <td>{{$orderLink->color}}</td>
                                                                <td>{{$orderLink->product_price}}</td>
                                                                <td>{{$orderLink->kargo_price}}</td>
                                                                <td>{{$orderLink->total_price}}</td>
                                                                <td>{{$orderLink->description}}</td>
                                                                <td>{{$orderLink->check ? 'Bəli' : 'Xeyr'}}</td>
                                                                <td>{{$orderLink->date}}</td>
                                                            </tr>
                                                        @endif

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order-paginate">
                                                @php $results = $orders  @endphp
                                                @include('partials.pagination')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 3 ? 'active show' : '' }}"
                                 id="neworder">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('postOrder')}}" method="post" id="form">
                                            @csrf
                                            <div class="neworder_top">
                                                <p class="btn-switch">
                                                    <input type="radio" id="yes" name="price_status"
                                                           class="btn-switch__radio btn-switch__radio_yes"
                                                           @if(old('price_status')==1) checked @endif value="1"/>
                                                    <input type="radio" id="no" name="price_status"
                                                           class="btn-switch__radio btn-switch__radio_no"
                                                           @if(old('price_status')==0) checked @endif value="0"/>
                                                    <label for="yes"
                                                           class="btn-switch__label btn-switch__label_yes"><span
                                                                class="btn-switch__txt"></span></label> <label for="no"
                                                                                                               class="btn-switch__label btn-switch__label_no"><span
                                                                class="btn-switch__txt"></span></label>
                                                </p>
                                                <p class="neworder_text">
                                                    {{--                                                Sifarişimi öz hesabımdan verəcəm, Goex.az Azərbaycan ünvanına çatdırsın.--}}
                                                    {{ translate('own_account_order_and_go_to_azerbaijan_address') }}
                                                </p>
                                            </div>
                                            <div class="neworder_bottom">
                                                <h2>{{ translate('new_order') }}</h2>
                                                <div class="form_neworder">
                                                    <div class="grup group">
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('link') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="link[]"
                                                                       value="{{old('link')}}"
                                                                       placeholder="{{ translate('link') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('product_name') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control"
                                                                       name="product_name[]"
                                                                       value="{{old('product_name')}}" placeholder="Ad"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('quantity') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" name="quantity[]"
                                                                               class="form-control quantity"
                                                                               value="{{old('quantity')}}"
                                                                               placeholder="130" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('product_size') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="product_size[]"
                                                                               value="{{old('product_size')}}"
                                                                               class="form-control"
                                                                               placeholder="Məhsulun ölçüsü" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('color') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="color[]"
                                                                               value="{{old('color')}}"
                                                                               class="form-control"
                                                                               placeholder="Qara">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('product_price') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" name="product_price[]"
                                                                               value="{{old('product_price')}}"
                                                                               class="form-control value"
                                                                               placeholder="130" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Türkiyə daxili karqo (TL):</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" name="kargo_price"
                                                                               value="{{old('kargo_price')}}"
                                                                               class="form-control kargo_price"
                                                                               placeholder="0">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('total_price') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" name="total_price"
                                                                               value="{{old('total_price')}}"
                                                                               class="form-control total_price"
                                                                               placeholder="0" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>{{ translate('check') }}:</label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="checkbox" name="check[]"
                                                                               class="form-control"
                                                                               placeholder="130" value="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('order_about') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <textarea class="form-control" rows="6" name="description[]"
                                                                  value="{{old('description')}}" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="neworder_btn">
                                                            <button type="submit">{{ translate('do_order') }}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="neworder_btn_">
                                                            <button type="button" id="add" class="add btn-block">
                                                                <i class="fa fa-plus"></i> Daha çox sifariş
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="copy" style="display: none;">
                                <div style="float: right;">
                                    <button class="delete btn btn-danger" type="button"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <br><br>
                                <div class="row neworder_input">
                                    <div class="col-md-2">
                                        <label>{{ translate('link') }}:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="link[]"
                                               value="{{old('link')}}"
                                               placeholder="{{ translate('link') }}" required>
                                    </div>
                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-2">
                                        <label>{{ translate('product_name') }}:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control"
                                               name="product_name[]"
                                               value="{{old('product_name')}}" placeholder="Ad"
                                               required>
                                    </div>
                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('quantity') }}:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" name="quantity[]"
                                                       class="form-control quantity"
                                                       value="{{old('quantity')}}"
                                                       placeholder="130" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('product_size') }}:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="product_size[]"
                                                       value="{{old('product_size')}}"
                                                       class="form-control"
                                                       placeholder="Məhsulun ölçüsü" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('color') }}:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="color[]"
                                                       value="{{old('color')}}"
                                                       class="form-control"
                                                       placeholder="Qara">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('price') }}:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" name="product_price[]"
                                                       value="{{old('product_price')}}"
                                                       class="form-control value"
                                                       placeholder="130" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Türkiyə daxili karqo (TL):</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" name="kargo_price"
                                                       value="{{old('kargo_price')}}"
                                                       class="form-control kargo_price"
                                                       placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('total_price') }}:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" id="total_price" name="total_price"
                                                       value="{{old('total_price')}}"
                                                       class="form-control total_price"
                                                       placeholder="0" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ translate('check') }}:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="checkbox" name="check[]"
                                                       class="form-control"
                                                       placeholder="130" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row neworder_input">
                                    <div class="col-md-2">
                                        <label>{{ translate('order_about') }}:</label>
                                    </div>
                                    <div class="col-md-10">
                                                        <textarea class="form-control" rows="6" name="description[]"
                                                                  required>{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 4 ? 'active show' : '' }}"
                                 id="price">
                                <div class="row">
                                    <div class="col">
                                        <div class="calculate_block">
                                            <h2>{{ translate('calculate_price') }}</h2>
                                            @include("site.calculate.calculate")
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 5 ? 'active show' : '' }}"
                                 id="payments">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table_head">
                                            <h2>{{ translate('my_order_histories') }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive-xl w-100">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{ translate('order_number') }}</th>
                                            <th>{{ translate('amount') }}</th>
                                            <th>{{ translate('status') }}</th>
                                            <th>{{ translate('date') }}</th>
                                            <th>{{ translate('order_status') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($balance_histories as $balance_history)
                                            <tr>
                                                <td>{{ $balance_history->order ? $balance_history->order->follow_code : '-' }}</td>
                                                <td>{{ $balance_history->balance ? $balance_history->price . ' ' . $balance_history->balance->name_az  : '0 AZN' }}</td>
                                                <td>{{ getBalanceHistory($balance_history->status) }}</td>
                                                <td>{{ $balance_history->date }}</td>
                                                @if($balance_history->order)
                                                    <td>
                                                        <label class="text-success">
                                                            <span class="text-success">{{ getOrderHistory($balance_history->order ? $balance_history->order->situation : 1) }}</span>
                                                        </label>
                                                    </td>
                                                @else
                                                    <td>
                                                        <label class="text-success">
                                                            <span class="text-success">-</span>
                                                        </label>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 6 ? 'active show' : '' }}"
                                 id="somewhere">
                                <div id="somewhere_blocks">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($address as $addres)
                                            <div class="card">
                                                <div class="card-header" id="headingOne" data-toggle="collapse"
                                                     data-target="#collapse{{$addres->id}}">
                                                    <h2 class="mb-0">
                                                        <div class="somewhere_top">
                                                            <img src="{{asset("/site/image/turkish.png")}}">
                                                            <h2>{{$addres->countryName->name()}}</h2>
                                                        </div>
                                                    </h2>
                                                </div>
                                                <div id="collapse{{$addres->id}}" class="collapse">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="somewhere_text">
                                                                    {!! $addres->text() !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="somewhere_block">
                                                                    <div class="somewhere_head">
                                                                        <img src="{{asset("/site/image/xerite.png")}}">
                                                                        <h4>{{ $addres->countryName->name() }}</h4>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('first_name') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$result->first_name . ' ' . $result->last_name}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('phone') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->phone ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('index') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->index ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('address') }}
                                                                                                    @if($addres->address_line_2)
                                                                                                        1 @endif:
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->address_line_1 . ' ' . $result->customer_code }}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        @if($addres->address_line_2)
                                                                            <div class="col-md-6">
                                                                                <div class="somewhere_list_block">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="somewherelist">
                                                                                                <ul>
                                                                                                    <li>{{ translate('address') }}
                                                                                                        2:
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <span>{{$addres->address_line_2 . ' ' . $result->customer_code }}</span>
                                                                                                        <div class="somewhere-copy">
                                                                                                            <i class="fa fa-files-o"
                                                                                                               aria-hidden="true"></i>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        @endif
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('street') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->street ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('district') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->district ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('country') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->countryName->name() ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('city') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->city ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('passport_fin') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->passport_fin ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('province') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->province ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="somewhere_list_block">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="somewherelist">
                                                                                            <ul>
                                                                                                <li>{{ translate('receiver') }}
                                                                                                    :
                                                                                                </li>
                                                                                                <li>
                                                                                                    <span>{{$addres->receiver ?? ""}}</span>
                                                                                                    <div class="somewhere-copy">
                                                                                                        <i class="fa fa-files-o"
                                                                                                           aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 7 ? 'active show' : '' }}"
                                 id="balance">
                                <div id="balance_blocks">
                                    <div class="balance_top">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-body-block">
                                                    @foreach($result->balances as $balance)
                                                        <div class="card-body-inner">
                                                            <h5 class="card-title">{{ translate('my_balance') }}
                                                                ({{ $balance->slug() }})</h5>
                                                            <h1 class="card-text">
                                                                {{ $balance->pivot->amount }}
                                                            </h1>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="balance_bottom">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{route("postAddBalance")}}"
                                                      method="post" id="frm">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ translate('amount') }}:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" name="amount" placeholder="1"
                                                                   class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ translate('exchange') }}:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="balance_id" class="form-control" required>
                                                                @foreach($balances as $balance)
                                                                    <option value="{{ $balance->id }}">{{ $balance->name() }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--                                                <div class="row">--}}
                                                    {{--                                                    <div class="col-md-4">--}}
                                                    {{--                                                        <label>Ad:</label>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-8">--}}
                                                    {{--                                                        <input type="text" name="name" placeholder="KANAN ASADOV"--}}
                                                    {{--                                                               class="form-control">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                                <div class="row">--}}
                                                    {{--                                                    <div class="col-md-4">--}}
                                                    {{--                                                        <label>Kart nomresi:</label>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-8">--}}
                                                    {{--                                                        <input type="text" name="card_number" placeholder="4125 4562 8546 8546"--}}
                                                    {{--                                                               class="form-control">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                                <div class="row">--}}
                                                    {{--                                                    <div class="col-md-4">--}}
                                                    {{--                                                        <label>Sona çatma tarixi:</label>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-8">--}}
                                                    {{--                                                        <input type="number" name="date" placeholder="00/00"--}}
                                                    {{--                                                               class="form-control">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                                <div class="row">--}}
                                                    {{--                                                    <div class="col-md-4">--}}
                                                    {{--                                                        <label>CVC:</label>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-8">--}}
                                                    {{--                                                        <input type="number" name="" placeholder="100"--}}
                                                    {{--                                                               class="form-control">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                    <div class="balance_btn">
                                                        <div class="row">
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-8">
                                                                <button>{{ translate('increase_balance') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 9 ? 'active show' : '' }}"
                                 id="my_applies">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table_head">
                                            <h2>{{ translate('my_applies') }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive-xl w-100">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{ translate('category') }}</th>
                                            <th>{{ translate('country') }}</th>
                                            <th>{{ translate('message') }}</th>
                                            <th>{{ translate('attachment') }}</th>
                                            <th>{{ translate('date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($applies))
                                            @foreach($applies as $apply)
                                                <tr>
                                                    <td>{{ config('settings.categories')[$apply->category_id] ??'-' }}</td>
                                                    <td>{{ $apply->countryName ? $apply->countryName->name() : '-' }}</td>
                                                    <td>{{ $apply->message }}</td>
                                                    <td>
                                                        <a href="{{ asset($apply->attachment)}}">{{ translate('file') }}</a>
                                                    </td>
                                                    <td>{{ $apply->date }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>{{ translate('no_text') }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 10 ? 'active show' : '' }}"
                                 id="new_apply">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('postApply')}}" method="post" id="new_apply">
                                            @csrf
                                            <div class="neworder_bottom">
                                                <h2>{{ translate('new_apply') }}</h2>
                                                <div class="form_neworder">
                                                    <div class="grup alan">
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('category') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select name="category_id" class="form-control"
                                                                        required>
                                                                    <option value="">{{ translate('choose_category') }}</option>
                                                                    @foreach(config('settings.categories') as $key => $category)
                                                                        <option value="{{ $key }}"
                                                                                @if($key == request()->input('category_id')) selected @endif>
                                                                            {{ $category }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('country') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select name="country_id" class="form-control" required>
                                                                    <option value="">{{ translate('choose_country') }}</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                                @if($country->id == request()->input('country_id')) selected @endif>
                                                                            {{ $country->name() }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('attachment') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="file"
                                                                       name="attachment"/>
                                                            </div>
                                                        </div>
                                                        <div class="row neworder_input">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('message') }}:</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                        <textarea class="form-control" rows="6" name="message"
                                                                  required>{{old('message')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="neworder_btn">
                                                            <button type="submit">{{ translate('do_apply') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 11 ? 'active show' : '' }}"
                                 id="my_map">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table_head">
                                            <h2>{{ translate('map') }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="nearly-office">{{ translate('nearly_office') }}</p>
                                    </div>
                                </div>
                                <div class="row map__block">
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 12 ? 'active show' : '' }}"
                                 id="statement">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="table_head">
                                            <h2>{{ translate('statement') }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="nearly-office"></p>
                                    </div>
                                </div>
                                <div class="state-tabs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all"
                                               role="tab" aria-controls="all" aria-selected="true">Hamısı</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="after-tab" data-toggle="tab" href="#after"
                                               role="tab" aria-controls="after" aria-selected="false">Öncədən bəyan
                                                et</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="incomplete-tab" data-toggle="tab" href="#incomplete"
                                               role="tab" aria-controls="incomplete"
                                               aria-selected="false">Tamamlanmamış</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="foreign-tab" data-toggle="tab" href="#foreign"
                                               role="tab" aria-controls="foreign" aria-selected="false">Xarici
                                                anbardadır</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="its_way-tab" data-toggle="tab" href="#its_way"
                                               role="tab" aria-controls="its_way" aria-selected="false">Yoldadır</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="local-tab" data-toggle="tab" href="#local"
                                               role="tab" aria-controls="local" aria-selected="false">Yerli
                                                anbardadır</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="handover-tab" data-toggle="tab" href="#handover"
                                               role="tab" aria-controls="handover" aria-selected="false">Təhvil
                                                verildi</a>
                                        </li>
                                    </ul>

                                </div>

                                <div class="table-responsive-xl w-100">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="all" role="tabpanel"
                                             aria-labelledby="all-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->follow_code}}</td>
                                                            <td>{{$order->product_type}}</td>
                                                            <td>{{$order->shop}}</td>
                                                            <td>{{$order->product_price}}</td>
                                                            <td>{{$order->kargo_price}}</td>
                                                            <td>{{$order->quantity}}</td>
                                                            <td>{{$order->weight}}</td>
                                                            <td>{{$order->stock_id}}</td>
                                                            <td><a href="javascript:void(0);">Sənəd</a></td>
                                                            <td>{{$order->tracking_code}}</td>
                                                            <td>{{$order->id}}</td>
                                                            <td>{{$order->receipt_date}}</td>
                                                            <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                        </tr>

                                                    @endforeach


                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="after" role="tabpanel"
                                             aria-labelledby="after-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->is_statement)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="incomplete" role="tabpanel"
                                             aria-labelledby="incomplete-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->situation==5 || $order->situation==6)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="foreign" role="tabpanel"
                                             aria-labelledby="foreign-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->situation==2)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach


                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="its_way" role="tabpanel"
                                             aria-labelledby="its_way-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->situation==3)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach


                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="local" role="tabpanel"
                                             aria-labelledby="local-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->situation==4)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach


                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="handover" role="tabpanel"
                                             aria-labelledby="handover-tab">
                                            <div class="scroll">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>İzləmə kodu</th>
                                                        <th>Məhsulun tipi</th>
                                                        <th>Mağaza</th>
                                                        <th>Məhsulun qiyməti</th>
                                                        <th>Çatdırılma qiyməti</th>
                                                        <th>Miqdar</th>
                                                        <th>Çəki</th>
                                                        <th>Anbar</th>
                                                        <th>Sənəd</th>
                                                        <th>Tracking kod</th>
                                                        <th>Sifariş nömrəsi</th>
                                                        <th>Bəyan tarixi</th>
                                                        <th>Ödəmə</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->situation==7)
                                                            <tr>
                                                                <td>{{$order->follow_code}}</td>
                                                                <td>{{$order->product_type}}</td>
                                                                <td>{{$order->shop}}</td>
                                                                <td>{{$order->product_price}}</td>
                                                                <td>{{$order->kargo_price}}</td>
                                                                <td>{{$order->quantity}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$order->stock_id}}</td>
                                                                <td><a href="javascript:void(0);">Sənəd</a></td>
                                                                <td>{{$order->tracking_code}}</td>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->receipt_date}}</td>
                                                                <td>{{$order->price_status ? 'Ödənilib': 'Ödənilməyib'}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach


                                                    </tbody>
                                                </table>


                                                <div class="order-paginate">
                                                    @php $results = $orders  @endphp
                                                    @include('partials.pagination')
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="tab-pane fade {{ Session::get('active') == 13 ? 'active show' : '' }}"
                                 id="new_statement">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route("postNewStatement")}}" method="post" id="form">
                                            @csrf

                                            <div class="neworder_bottom">
                                                <h2>{{ translate('new_statement') }}</h2>
                                                <div class="form_neworder">
                                                    <div class="row neworder_input">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('tracking_code') }}:</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control"
                                                                   name="tracking_code"
                                                                   value="{{old('tracking_code')}}"
                                                                   placeholder="{{ translate('tracking_code') }}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="row neworder_input">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('company') }}:</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="company"
                                                                   value="{{old('company')}}"
                                                                   placeholder="{{ translate('company') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row neworder_input">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('product') }}:</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="product"
                                                                   value="{{old('product')}}"
                                                                   placeholder="{{ translate('product') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row neworder_input">
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>{{ translate('price') }}:</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="number" class="form-control"
                                                                           name="price"
                                                                           value="{{old('price')}}"
                                                                           placeholder="{{ translate('price') }}"
                                                                           required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Valyuta:</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select name="balance_id" id="balance_id"
                                                                            class="form-control">
                                                                        <option value="1">AZN</option>
                                                                        <option value="2">EURO</option>
                                                                        <option value="3">USD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>{{ translate('quantity') }}:</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="number" class="form-control"
                                                                           name="quantity"
                                                                           value="{{old('quantity')}}"
                                                                           placeholder="{{ translate('quantity') }}"
                                                                           required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row neworder_input">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('text') }}:</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea name="text" id="text" class="form-control"
                                                                      cols="30" rows="5">
                                                                {{old('text')}}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-5"></div>
                                                    <div class="col-md-7">
                                                        <div class="neworder_btn text-center">
                                                            <button type="submit">{{ translate('new_statement') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>

                        @else
                            @php Session::put('active', 8); @endphp

                            <div class="alert alert-warning" role="alert">
                                {{ translate('fill_own_information') }}
                            </div>
                        @endif
                        <div class="tab-pane fade {{ Session::get('active') == 8 ? 'active show' : '' }}" id="private">
                            <div id="private_blocks">
                                <div class="private_top">
                                    <div class="row private_item">
                                        <div class="col-lg-7 col-md-6 private_head">
                                            <h4>{{ translate('own_information') }}</h4>
                                        </div>
                                        <div class="col-lg-5 col-md-6">
                                            <div class="private_code">
                                                <p>{{ translate('customer_code') }} <b>{{$result->customer_code}}</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="private_forms m-auto">
                                        <div class="private_form">
                                            <form action="{{route("postSitePrivate",['id' => $result->id ?? 0])}}"
                                                  method="post" id="frm">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('first_name') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="first_name"
                                                               value="{{ $result->first_name ?? "" }}"
                                                               class="form-control" minlength="3"
                                                               placeholder="{{ translate('first_name') }}"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('last_name') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="last_name"
                                                               value="{{ $result->last_name ?? "" }}"
                                                               class="form-control" minlength="3"
                                                               placeholder="{{ translate('last_name') }}"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('phone') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="phone"
                                                               value="{{ $result->phone ?? "" }}" class="form-control"
                                                               placeholder="{{ translate('phone') }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('birthday_date') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="date" name="date_of_birth"
                                                               value="{{ $result->date_of_birth ?? "" }}"
                                                               class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('gender') }}</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="gender_block">
                                                            <input type="radio" required name="gender"
                                                                   @if($result->gender=="1") checked
                                                                   @endif value="1"><span>{{ translate('male') }}</span>
                                                            <input type="radio" required name="gender"
                                                                   @if($result->gender=="0") checked
                                                                   @endif value="0"><span>{{ translate('female') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('passport_number') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="passport"
                                                                       value="{{ $result->passport ?? "" }}" required
                                                                       class="form-control" minlength="8" maxlength="8"
                                                                       placeholder="{{ translate('passport_number') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="passport_fin"
                                                                       value="{{ $result->passport_fin ?? "" }}"
                                                                       required class="form-control" minlength="7"
                                                                       maxlength="7"
                                                                       placeholder="{{ translate('passport_fin') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('filial') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="filial_id" id="filial_id" class="form-control"
                                                                required>
                                                            <option value="">Filial seç</option>
                                                            @foreach($filials as $filial)
                                                                <option value="{{$filial->id}}"
                                                                        @if($result->filial_id == $filial->id) selected @endif>{{$filial->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <label>{{ translate('address') }}:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="address" id="address"
                                                                  rows="4" placeholder="{{ translate('address') }}"
                                                                  required>
                                                            {{$result->address ?? ""}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-9">
                                                        <div class="private_btn">
                                                            <button type="submit">{{ translate('save') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="private_bottom">
                                    <div class="private_bottom_head">
                                        <h2>{{ translate('new_password') }}</h2>
                                    </div>
                                    <div class="private_bottom_form">
                                        <form action="{{route("postPassword",['id' => $result->id])}}" method="post"
                                              id="password">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <label>{{ translate('new_password') }}:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="{{ translate('new_password') }}" minlength="6"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <label>{{ translate('new_password_repetition') }}:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" name="password_confirmation"
                                                           class="form-control" minlength="6"
                                                           placeholder="{{ translate('new_password_repetition') }}"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <div class="private_btn">
                                                        <button type="submit">{{ translate('save') }}</button>
                                                    </div>
                                                </div>
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
    </section>

@endsection
@section("css")
    <link href="{{asset("/site/css/custom.css")}}" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-weight: 600;
        }

        input[type=checkbox] {
            height: 20px !important;
        }

        .somewherelist ul li:nth-child(2) {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #map {
            height: 100%;
            width: 100%;
        }

    </style>
@endsection

@section("js")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCZWy2YH-P1SUd4wbCz4gteGoX3aXSd1c&libraries=places&language=az"></script>

    <script src="{{asset("/site/ajax/account.js")}}"></script>
    <script>


        function initMap() {

            let address = @json($address);

            const myLatLng = {
                lat: 40.3880362,
                lng: 49.838729
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: myLatLng
            });

            $.each(address, function (index, value) {
                const LatLng = {
                    lat: parseFloat(value.latitude),
                    lng: parseFloat(value.longitude)
                };
                new google.maps.Marker({
                    position: LatLng,
                    map,
                    title: "Hello World!"
                });
            });
        }

        $('#nearly-office').on('click', function (e) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });


        function showPosition(position) {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;

        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        $('.somewhere-copy').on('click', function (e) {
            e.preventDefault();
            var copyText = $(this).parent().find('span');
            var textArea = document.createElement("textarea");
            textArea.value = copyText.text();
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("Copy");
            textArea.remove();
        });

        $(document).ready(function () {
            initMap();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.link-tab').not('.logout').on('click', function (e) {
                e.preventDefault();
                let id = $(this).attr('data-id');

                $.ajax({
                    type: 'POST',
                    url: '{{route("postAccountTabActive")}}',
                    data: {
                        id: id,
                    },
                });
            });

            $(".calculate_btn").click(function (e) {

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
                        $("#result").html(data.price + " AZN");
                    }
                });
                e.preventDefault();
            });

        });

        $("#frm").validate();
        $("#password").validate();
        $("#new_apply").validate();

        $(function () {
            $(".add").click(function () {

                var group = '<div class="form-group group">' + $(".copy").html() + '</div>';
                $("body").find(".group:last").after(group);
            });

            $("body").on("click", ".delete", function () {
                $(this).parents(".group").remove();
            })

        });


        // $(function () {
        //     $(".value").change(function () {
        //         let price = $(this).val();
        //         let total1 = price * 2.5 / 100;
        //         let total_price = price + total1;
        //         console.log(total_price);
        //     });
        // })
    </script>
@endsection
