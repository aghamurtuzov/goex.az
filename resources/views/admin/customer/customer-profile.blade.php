@extends("main.admin")
@section("content")
    <div class="page-content pt-4">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Main sidebar</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">


                    <!-- User menu -->
                    <div class="sidebar-user bg-indigo-400">
                        <div class="card-body">
                            <div class="media ">
                                <h1 class="m-auto"><b>G</b> - {{$result->customer_code}}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="card-body p-3">
                        <ul class="nav nav-tabs nav-sidebar" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="icon-home4"></i> Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#order" role="tab"
                                   aria-controls="order" aria-selected="false"><i class="icon-color-sampler"></i> Bütün
                                    sifarişlər</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#orderactive" role="tab"
                                   aria-controls="orderactive" aria-selected="false"><i class="icon-color-sampler"></i>
                                    Aktiv sifarişlər</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#orderend" role="tab"
                                   aria-controls="orderend" aria-selected="false"><i class="icon-color-sampler"></i>
                                    Bitmiş sifarişlər</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Profil Məlumatı</h4>

                                    </div>
                                    @includeIf('partials.session-message')

                                    <div class="card-body py-0 p-4" style="margin-bottom: -6px;">

                                        <form id="form"
                                              action="{{route("postCustomerProfile",['id' => $result->id ?? 0 ])}}"
                                              method="post"
                                              class="users-content" enctype="multipart/form-data">
                                            @csrf
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label
                                                                class="col-form-label">Ad</label></div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="first_name"
                                                               value="{{ $result->first_name ?? '' }}"
                                                               class="form-control" placeholder="Ad">
                                                    </div>
                                                    <div class="col-lg-2"><label class="col-form-label">Soyad</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="last_name"
                                                               value="{{ $result->last_name ?? '' }}"
                                                               class="form-control" placeholder="Soyad">
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="col-form-label">Doğum
                                                            Tarixi</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="date_of_birth"
                                                               value="{{$result->date_of_birth  ?? '' }}"
                                                               class="form-control" placeholder="Doğum Tarixi">
                                                    </div>
                                                    <div class="col-lg-2"><label class="col-form-label">Email</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="email" value="{{$result->email ?? ''}}"
                                                               class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="col-form-label">Passport</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="passport"
                                                               value="{{$result->passport ?? ''}}"
                                                               class="form-control"
                                                               placeholder="Passport" disabled>
                                                    </div>
                                                    <div class="col-lg-2"><label class="col-form-label">Passport
                                                            Fin</label></div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="passport_fin"
                                                               value="{{$result->passport_fin  ?? ''}}"
                                                               class="form-control" placeholder="Passport Fin" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="col-form-label">Endirim</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="discount"
                                                               value="{{$result->discount ?? ''}}"
                                                               class="form-control" placeholder="Endirim">
                                                    </div>
                                                    <div class="col-lg-2"><label class="col-form-label">Telefon</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="phone"
                                                               value="{{$result->phone  ?? '' }}"
                                                               class="form-control" placeholder="Telefon">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="col-form-label">Ünvan</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="address"
                                                               value="{{$result->address ?? ''}}"
                                                               class="form-control" placeholder="Ünvan">
                                                    </div>
                                                    <div class="col-lg-2"><label class="col-form-label">Filial</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="filial_id" id="filial"
                                                                class="form-control select-search sms-template-choose"
                                                                data-fouc>
                                                            <option value=""> --- Filial seç ---</option>
                                                            @foreach($filials as $filial)
                                                                <option @if($result->filial_id==$filial->id) selected
                                                                        @endif value="{{ $filial->id }}">{{ $filial->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="col-form-label">Status</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="status" id="status"
                                                                class="form-control select-search sms-template-choose"
                                                                data-fouc>
                                                            <option value=""> --- Status seç ---</option>
                                                            <option value="1"
                                                                    @if($result->status == '1') selected @endif>
                                                                Active
                                                            </option>
                                                            <option value="0"
                                                                    @if($result->status == '0') selected @endif>
                                                                Passive
                                                            </option>
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"><label class="d-block font-weight-semibold">Cinsi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <div class="uniform-choice"><input type="radio" value="1"
                                                                                               class="form-check-input-styled"
                                                                                               @if($result->gender) checked
                                                                                               @endif name="gender">
                                                            </div>
                                                            Kişi
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <div class="uniform-choice"><input type="radio"
                                                                                               class="form-check-input-styled"
                                                                                               value="0"
                                                                                               @if(!$result->gender) checked
                                                                                               @endif name="gender">
                                                            </div>
                                                            Qadın
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    @foreach($result->balanceCustomer as $balance)


                                                        @if($balance->balance_id == 1)
                                                            <div class="col-lg-2"><label
                                                                        class="col-form-label">AZN</label>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <input type="number" name="balance_azn"
                                                                       value="{{$balance->amount ?? 0}}"
                                                                       class="form-control" placeholder="AZN" disabled>
                                                            </div>
                                                        @endif
                                                        <br>
                                                        @if($balance->balance_id == 2)
                                                            <div class="col-lg-2"><label
                                                                        class="col-form-label">EURO</label>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <input type="number" name="balance_euro"
                                                                       value="{{$balance->amount ?? 0}}"
                                                                       class="form-control" placeholder="EURO" disabled>
                                                            </div>
                                                        @endif
                                                        <br>
                                                        @if($balance->balance_id == 3)
                                                            <div class="col-lg-2"><label
                                                                        class="col-form-label">USD</label>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <input type="number" name="balance_usd"
                                                                       value="{{$balance->amount ?? 0}}"
                                                                       class="form-control" placeholder="USD" disabled>
                                                            </div>
                                                        @endif





                                                    @endforeach
                                                </div>

                                            </fieldset>

                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Yadda Saxla <i
                                                            class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Bütün sifarişlər</h4>

                                    </div>

                                    <div class="card-body py-0 p-4" style="margin-bottom: -6px;">
                                        <table class="table datatable-basic">
                                            <thead>
                                            <tr>
                                                <th>Məhsul adı</th>
                                                <th>İzləmə kodu</th>
                                                <th>Barkod</th>
                                                <th>Tarix</th>
                                                <th>Ödəniş</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderAlls as $orderAll)
                                                <tr>
                                                    <td>{{$orderAll->product_name}}</td>
                                                    <td><a href="#">{{$orderAll->follow_code}}</a></td>
                                                    <td>{{$orderAll->barcode}}</td>
                                                    <td>{{$orderAll->publish_date}}</td>
                                                    <td>{{$orderAll->price_status ? 'Ödənilib' : 'Ödənilməyib'}}</td>
                                                    <td>
                                                        @if($orderAll->situation==1)
                                                            <span class="badge badge-success">Yeni</span>
                                                        @elseif($orderAll->situation==2)
                                                            <span class="badge badge-info">Yolda</span>
                                                        @elseif($orderAll->situation==3)
                                                            <span class="badge badge-info">Daxili Anbarda</span>
                                                        @elseif($orderAll->situation==4)
                                                            <span class="badge badge-info">Xarici Anbarda</span>
                                                        @elseif($orderAll->situation==5)
                                                            <span class="badge badge-danger">Problemli</span>
                                                        @elseif($orderAll->situation==6)
                                                            <span class="badge badge-warning">Geri qaytarılmış</span>
                                                        @elseif($orderAll->situation==7)
                                                            <span class="badge badge-success">Bitmiş</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="dropdown">
                                                                <a href="{{route('getCustomerInfo',[$orderAll->id])}}"
                                                                   class="dropdown-item"><i
                                                                            class="icon-eye icon-2x mr-1"></i> Bax</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orderactive" role="tabpanel" aria-labelledby="orderactive-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Aktiv sifarişlər</h4>

                                    </div>

                                    <div class="card-body py-0 p-4" style="margin-bottom: -6px;">
                                        <table class="table datatable-basic">
                                            <thead>
                                            <tr>
                                                <th>Məhsul adı</th>
                                                <th>İzləmə kodu</th>
                                                <th>Barkod</th>
                                                <th>Tarix</th>
                                                <th>Ödəniş</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderActives as $orderActive)
                                                <tr>
                                                    <td>{{$orderActive->product_name}}</td>
                                                    <td><a href="#">{{$orderActive->follow_code}}</a></td>
                                                    <td>{{$orderActive->barcode}}</td>
                                                    <td>{{$orderActive->publish_date}}</td>
                                                    <td>{{$orderActive->price_status ? 'Ödənilib' : 'Ödənilməyib'}}</td>
                                                    <td>
                                                        @if($orderActive->situation==1)
                                                            <span class="badge badge-success">Yeni</span>
                                                        @elseif($orderActive->situation==2)
                                                            <span class="badge badge-info">Yolda</span>
                                                        @elseif($orderActive->situation==3)
                                                            <span class="badge badge-info">Daxili Anbarda</span>
                                                        @elseif($orderActive->situation==4)
                                                            <span class="badge badge-info">Xarici Anbarda</span>
                                                        @elseif($orderActive->situation==5)
                                                            <span class="badge badge-danger">Problemli</span>
                                                        @elseif($orderActive->situation==6)
                                                            <span class="badge badge-warning">Geri qaytarılmış</span>
                                                        @elseif($orderActive->situation==7)
                                                            <span class="badge badge-success">Bitmiş</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="dropdown">
                                                                <a href="{{route('getCustomerInfo',[$orderAll->id])}}"
                                                                   class="dropdown-item"><i
                                                                            class="icon-eye icon-2x mr-1"></i> Bax</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orderend" role="tabpanel" aria-labelledby="orderend-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Bitmiş sifarişlər</h4>

                                    </div>

                                    <div class="card-body py-0 p-4" style="margin-bottom: -6px;">
                                        <table class="table datatable-basic">
                                            <thead>
                                            <tr>
                                                <th>Məhsul adı</th>
                                                <th>İzləmə kodu</th>
                                                <th>Barkod</th>
                                                <th>Tarix</th>
                                                <th>Ödəniş</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderEnds as $orderEnd)
                                                <tr>
                                                    <td>{{$orderEnd->product_name}}</td>
                                                    <td><a href="#">{{$orderEnd->follow_code}}</a></td>
                                                    <td>{{$orderEnd->barcode}}</td>
                                                    <td>{{$orderEnd->publish_date}}</td>
                                                    <td>{{$orderEnd->price_status ? 'Ödənilib' : 'Ödənilməyib'}}</td>
                                                    <td>
                                                        @if($orderEnd->situation==1)
                                                            <span class="badge badge-success">Yeni</span>
                                                        @elseif($orderEnd->situation==2)
                                                            <span class="badge badge-info">Yolda</span>
                                                        @elseif($orderEnd->situation==3)
                                                            <span class="badge badge-info">Daxili Anbarda</span>
                                                        @elseif($orderEnd->situation==4)
                                                            <span class="badge badge-info">Xarici Anbarda</span>
                                                        @elseif($orderEnd->situation==5)
                                                            <span class="badge badge-danger">Problemli</span>
                                                        @elseif($orderEnd->situation==6)
                                                            <span class="badge badge-warning">Geri qaytarılmış</span>
                                                        @elseif($orderEnd->situation==7)
                                                            <span class="badge badge-success">Bitmiş</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="dropdown">
                                                                <a href="{{route('getCustomerInfo',[$orderAll->id])}}"
                                                                   class="dropdown-item"><i
                                                                            class="icon-eye icon-2x mr-1"></i> Bax</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                </div>


                <!-- /main charts -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
@endsection

@section("js")

@endsection

@section("css")

@endsection
