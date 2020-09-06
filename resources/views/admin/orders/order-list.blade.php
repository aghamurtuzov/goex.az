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
                    <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'order-list','path' => 'orders']) }}"
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
                                        <div class="form-group">
                                            <label for="">Kategoriya</label>
                                            <select name="category" id="category"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                <option value=""> --- Kategoriya seç ---</option>
                                                <option value="1"
                                                        @if(request()->input('category') == '1') selected @endif>
                                                    Müştəri özü aldığı sifariş
                                                </option>
                                                <option value="2"
                                                        @if(request()->input('category') == '2') selected @endif>
                                                    Bizim müştəriyə aldıgımız sifariş
                                                </option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="situation" id="situation"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                <option value=""> --- Status seç ---</option>
                                                <option value="1"
                                                        @if(request()->input('situation') == '1') selected @endif>
                                                    Yeni
                                                </option>
                                                <option value="2"
                                                        @if(request()->input('situation') == '2') selected @endif>
                                                    Yolda
                                                </option>
                                                <option value="3"
                                                        @if(request()->input('situation') == '3') selected @endif>
                                                    Daxili Anbar
                                                </option>
                                                <option value="4"
                                                        @if(request()->input('situation') == '4') selected @endif>
                                                    Xarici Anbar
                                                </option>
                                                <option value="5"
                                                        @if(request()->input('situation') == '5') selected @endif>
                                                    Problemli
                                                </option>
                                                <option value="6"
                                                        @if(request()->input('situation') == '6') selected @endif>
                                                    Geri qaytarılmış
                                                </option>
                                                <option value="7"
                                                        @if(request()->input('situation') == '7') selected @endif>
                                                    Bitmiş
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Başlanğıc Tarix:</label>
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                <input type="date" name="start_date" class="form-control"
                                                       value="{{ request()->input('start_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bitiş Tarix:</label>
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                <input type="date" name="end_date" class="form-control"
                                                       value="{{ request()->input('end_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Passport</label>
                                            <input type="text" name="passport" placeholder="AZE № 15245262"
                                                   value="{{ request()->input('passport') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Müştəri Kodu</label>
                                            <input type="text" name="customer_code" placeholder="152453625"
                                                   value="{{ request()->input('customer_code') }}" class="form-control">
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
                        <div class="card-body">

                            <ul class="nav nav-tabs nav-tabs-highlight nav-justified tabs-width-full">
                                <li class="nav-item"><a href="{{route('orderList')}}"
                                                        class="nav-link @if(request()->route('situation') == '') active @endif legitRipple px-0">Bütün
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 1])}}"
                                            class="nav-link @if(request()->route('situation') == 1) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Yeni</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 2])}}"
                                            class="nav-link @if(request()->route('situation') == 2) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Yolda</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 3])}}"
                                            class="nav-link @if(request()->route('situation') == 3) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Daxili Anbarda</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 4])}}"
                                            class="nav-link @if(request()->route('situation') == 4) active @endif legitRipple px-0"><span
                                                class="badge badge-warning badge-pill mr-2"></span>
                                        Xarici Anbarda</a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 5])}}"
                                            class="nav-link @if(request()->route('situation')  == 5) active @endif  legitRipple px-0">Problemli
                                        <span
                                                class="badge badge-primary badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 6])}}"
                                            class="nav-link @if(request()->route('situation')  == 6) active @endif legitRipple px-0">Geri
                                        qaytarılmış
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{route('orderList',['situation' => 7])}}"
                                            class="nav-link @if(request()->route('situation')  == 7) active @endif legitRipple px-0">Bitmiş
                                        <span
                                                class="badge badge-success badge-pill ml-2"></span></a>
                                </li>

                            </ul>

                        </div>
                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Məhsulun adı</th>
                                <th>İzləmə kodu</th>
                                <th>Müştəri kodu</th>
                                <th>Müştəri</th>
                                <th>Passport</th>
                                <th>Status</th>
                                <th>Kategoriya</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->product_name}}</td>
                                    <td><a href="#">{{$result->follow_code}}</a></td>
                                    <td><a href="#">{{$result->customOrder->customer_code ?? ''}}</a></td>
                                    <td>{{($result->customOrder->first_name ?? '') .' '. ($result->customOrder->last_name ?? '')}}</td>
                                    <td>AZE {{($result->customOrder->passport ?? '')}}</td>
                                    <td>
                                        @if($result->situation==1)
                                            <span class="badge badge-success">Yeni</span>
                                        @elseif($result->situation==2)
                                            <span class="badge badge-info">Yolda</span>
                                        @elseif($result->situation==3)
                                            <span class="badge badge-info">Daxili Anbarda</span>
                                        @elseif($result->situation==4)
                                            <span class="badge badge-info">Xarici Anbarda</span>
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
                                                <a href="{{route('orderInfo',[$result->id])}}" class="dropdown-item"><i
                                                            class="icon-eye icon-2x mr-1"></i> Bax</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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

@endsection
@section("js")
@endsection
