@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Sifariş linkləri</h5>
                        <div class="header-elements">
                            <div class="list-icons">

                            </div>
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'orderLink','viewFile'=>'order-links','path' => 'order-links','mainPath'=>'admin','routeId' => request()->route('situation')]) }}"
                          method="GET">
                        <div class="container card-body">
                            @csrf
                            <div class="container form-tabs p-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Link</label>
                                            <input type="text" name="link"
                                                   value="{{ request()->input('link') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Məhsulun Adı</label>
                                            <input type="text" name="product_name"
                                                   value="{{ request()->input('product_name') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Reng</label>
                                            <input type="text" name="color"
                                                   value="{{ request()->input('color') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Turkiye daxili kargo</label>
                                            <input type="text" name="kargo_price"
                                                   value="{{ request()->input('kargo_price') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Mehsulun qiymeti</label>
                                            <input type="text" name="product_price"
                                                   value="{{ request()->input('product_price') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Metn</label>
                                            <input type="number" name="description"
                                                   value="{{ request()->input('description') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Müştəri Kodu</label>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">G</span>
                                            </div>
                                            <input type="text" name="customer_code" placeholder="152453625"
                                                   value="{{ request()->input('customer_code') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sifariş Tarixi:</label>
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                <input type="date" name="date" class="form-control"
                                                       value="{{ request()->input('date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{request()->route('situation')}}" name="situation">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>Axtarış</label>
                                            <button type="submit" class="btn btn-default btn-block"><i
                                                        class="icon-search4"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @php
                            $routeId = isset($routeId) ? $routeId : request()->route('situation');
                        @endphp
                        <div class="card-body">

                            <ul class="nav nav-tabs nav-tabs-highlight nav-justified tabs-width-full">
                                @foreach(config('settings.orderLinks') as $key => $s)
                                    <li class="nav-item"><a href="{{route('getOrderLinks',['situation' => $key])}}"
                                                            class="nav-link @if($key == $routeId ) active @endif legitRipple px-0">{{ $s }}
                                            <span class="badge badge-success badge-pill ml-2"></span></a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Link</th>
                                <th>Müştəri</th>
                                <th>Məhsulun adı</th>
                                <th>Mehsulun qiymeti</th>
                                <th>Mehsulun olcusu</th>
                                <th>Miqdar</th>
                                <th>Reng</th>
                                <th>Check</th>
                                <th>Metn</th>
                                <th>Status</th>
                                <th>Tarix</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            @if(count($results))
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td><a href="{{$result->link}}">{{$result->link}}</a></td>
                                        <td>{{($result->customName ? $result->customName->first_name  .' '. $result->customName->last_name : '-')}}</td>
                                        <td>{{$result->product_name}}</td>
                                        <td>{{$result->product_price}}</td>
                                        <td>{{$result->product_size}}</td>
                                        <td>{{$result->quantity}}</td>
                                        <td>{{$result->color}}</td>
                                        <td>
                                            <span class="badge badge-success">{{$result->check ? 'Yoxlanilsin' : '-'}}</span>
                                        </td>
                                        <td>{{$result->description}}</td>
                                        <td>
                                            <span class="badge badge-success">{{ getOrderLinkHistory($result->situation) }}</span>
                                        </td>
                                        <td>{{$result->date}}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="{{route('getOrderLinkInfo',[$result->id])}}"
                                                       class="dropdown-item"><i
                                                                class="icon-eye icon-2x mr-1"></i> Bax</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tr>
                                    <td>Melumat yoxdur</td>
                                </tr>
                            @endif
                        </table>

                        @include('partials.pagination')
                    </form>
                </div>
                <!-- /basic datatable -->

            </div>

        </div>
    </div>
    <!-- /table -->

@endsection

@section("css")
    <style>
        #exchange {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        #customer_code {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style>
@endsection
@section("js")
@endsection
