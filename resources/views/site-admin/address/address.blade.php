@extends("main.site-admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Ünvanlar</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="card-title" style="font-size: 20px;"><a href="{{route("getAddressEdit",0)}}">
                                    <button class="btn btn-primary">Əlavə Et</button>
                                </a></h5>
                        </div>
                    </div>
                    <form class="p-3"
                          action="{{ route('getModuleSearch',['module'=> 'address','mainPath' => 'site-admin', 'path' => 'address','viewFile'=>'address' ]) }}"
                          method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Ad </label>
                                    <input type="text" name="first_name" value="{{ request()->input('first_name') }}"
                                           class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Soyad</label>
                                    <input type="text" name="last_name" value="{{ request()->input('last_name') }}"
                                           class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefon: </label>
                                    <input type="text" class="form-control" value="{{ request()->input('phone') }}"
                                           name="phone" data-mask="(999) 99 999-99-99"
                                           placeholder="(994) 99 999-99-99">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Unvan: </label>
                                    <input type="text" class="form-control" value="{{ request()->input('phone') }}" name="address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Ölkə</label>
                                    <select name="country" id="country" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                    @if(request()->input('country') == $country->id) selected @endif>{{ $country->name_az }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Şəhər</label>
                                    <input type="text" name="city" value="{{ request()->input('city') }}"
                                           class="form-control">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status"
                                            class="form-control select-search sms-template-choose"
                                            data-fouc>
                                        <option value=""> --- Status seç ---</option>
                                        <option value="1"
                                                @if(request()->input('status') == '1') selected @endif>
                                            Active
                                        </option>
                                        <option value="0"
                                                @if(request()->input('status') == '0') selected @endif>
                                            Passive
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Axtarış</label>
                                    <button type="submit" class="btn btn-default btn-block">
                                        <i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>

                        <table class="table datatable-basic text-center">
                            <thead>
                            <tr>
                                <th>Ad</th>
                                <th> Soyad</th>
                                <th>Telefon</th>
                                <th>Ölkə</th>
                                <th>Şəhər</th>
                                <th>Status</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody class="text-center" id="shop_body">
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->first_name}}</td>
                                    <td>{{$result->last_name}}</td>
                                    <td>{{$result->phone}} </td>
                                    <td>{{$result->countryName ? $result->countryName->name_az : ''}} </td>
                                    <td>{{$result->city}} </td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'addresses'])

                                    <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="{{route("getAddressEdit",$result->id)}}"
                                                       class="dropdown-item"><i
                                                                class="icon-pencil5"></i>Redaktə Et</a>
                                                    <a href="javascript:void(0)" data-id="{{ $result->id }}"
                                                       data-module="addresses" class="dropdown-item deleteModal"><i
                                                                class="icon-list"></i>Sil</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('partials.pagination')

                    </form>

                    <!-- /basic datatable -->

                </div>

            </div>
        </div>

    </div>


@endsection
@section("js")

@endsection
@section("css")


@endsection
