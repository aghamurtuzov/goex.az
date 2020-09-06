@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Sifarişlər</h5>
                        <div class="header-elements">
                            <div class="list-icons">

                            </div>
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'order-customer','path' => 'orders','mainPath'=>'admin','routeId' => request()->route('situation')]) }}"
                          method="GET">
                        <div class="container card-body">

                            @csrf
                            <div class="container form-tabs p-2">
                                <div class="row">
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
                                            <label for="">İzləmə kodu</label>
                                            <input type="number" name="follow_code"
                                                   value="{{ request()->input('follow_code') }}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Passport</label>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">AZE №</span>
                                            </div>
                                            <input type="text" name="passport" placeholder="15245262"
                                                   value="{{ request()->input('passport') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telefon: </label>
                                            <input type="text" class="form-control"
                                                   value="{{ request()->input('phone') }}"
                                                   name="phone" data-mask="(999) 99 999-99-99"
                                                   placeholder="(994) 99 999-99-99">
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
                                                <input type="date" name="publish_date" class="form-control"
                                                       value="{{ request()->input('publish_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{request()->route('situation')}}" name="situation">
                                    <div class="col-md-3 ">
                                        <input type="hidden" value="1" name="category">
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
                                <li class="nav-item"><a href="{{route('orderCustomer')}}"
                                                        class="nav-link @if(request()->route('situation') == '' &&  $routeId == '') active @endif legitRipple px-0">Bütün
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 1])}}"
                                            class="nav-link @if(request()->route('situation') == 1  ||  $routeId == 1) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Yeni</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 3])}}"
                                            class="nav-link @if(request()->route('situation') == 3  ||  $routeId == 3) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Yolda</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 2])}}"
                                            class="nav-link @if(request()->route('situation') == 2  ||  $routeId == 2) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Xarici Anbarda</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 4])}}"
                                            class="nav-link @if(request()->route('situation') == 4  ||  $routeId == 4) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Daxili Anbarda</a>
                                </li>
                                <li class="nav-item"><a href="{{route('orderCustomer',['situation' => 5])}}"
                                                        class="nav-link @if(request()->route('situation')  == 5  ||  $routeId == 5) active @endif  legitRipple px-0">Problemli
                                        <span
                                                class="badge badge-primary badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 6])}}"
                                            class="nav-link @if(request()->route('situation')  == 6  ||  $routeId == 6) active @endif legitRipple px-0">Geri
                                        qaytarılmış
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderCustomer',['situation' => 7])}}"
                                            class="nav-link @if(request()->route('situation')  == 7  ||  $routeId == 7) active @endif legitRipple px-0">Bitmiş
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>

                            </ul>

                        </div>
                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Müştəri kodu</th>
                                <th>Məhsulun adı</th>
                                <th>İzləmə kodu</th>
                                <th>Müştəri</th>
                                <th>Passport</th>
                                <th>Status</th>
                                <th>Kategoriya</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            @if(count($results) > 0)
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>
                                            <b id="customer_code">G-</b><b>{{$result->customOrder->customer_code ?? ''}}</b>
                                        </td>
                                        <td>{{$result->product_name}}</td>
                                        <td>{{$result->follow_code}}</td>
                                        <td>{{($result->customOrder->first_name ?? '') .' '. ($result->customOrder->last_name ?? '')}}</td>
                                        <td><span id="exchange">AZE</span> {{($result->customOrder->passport ?? '')}}
                                        </td>
                                        <td>
                                            @if($result->situation==1)
                                                <span class="badge badge-success">Yeni</span>
                                            @elseif($result->situation==2)
                                                <span class="badge badge-info">Yolda</span>
                                            @elseif($result->situation==3)
                                                <span class="badge badge-info">Xarici Anbarda</span>
                                            @elseif($result->situation==4)
                                                <span class="badge badge-info">Daxili Anbarda</span>
                                            @elseif($result->situation==5)
                                                <span class="badge badge-danger">Problemli</span>
                                            @elseif($result->situation==6)
                                                <span class="badge badge-warning">Geri qaytarılmış</span>
                                            @elseif($result->situation==7)
                                                <span class="badge badge-success">Bitmiş</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($result->category==1)
                                                <span class="badge badge-success">Müştəri özü aldığı sifariş</span>
                                            @else
                                                <span class="badge badge-danger">Bizim müştəriyə aldıgımız sifariş</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="{{route('orderInfo',[$result->id])}}"
                                                       class="dropdown-item"><i
                                                                class="icon-eye icon-2x mr-1"></i> Bax</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="card text-center">
                                    <h4 style="font-weight: 500;">Məlumat yoxdur</h4>
                                </div>
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
