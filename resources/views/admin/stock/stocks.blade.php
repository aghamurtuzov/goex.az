@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Daxili Anbar</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            @if(!$type)
                                <a class="local-stock-sections" href="{{route("getSections")}}">
                                    <button class="btn btn-primary">Daxili Anbar Bölmələri</button>
                                </a>
                            @else
                                <a class="local-stock-sections" href="{{route("getSacks")}}">
                                    <button class="btn btn-primary">Çuvallar</button>
                                </a>
                            @endif

                            <a class="add-button" href="{{route("getStockEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Yeni daxili anbar yarat</button>
                            </a>
                        </div>
                    </div>
                    <form
                            action="{{ route('getModuleSearch',['module'=> 'stock','viewFile'=>'stocks','path' => 'stock' ]) }}"
                            method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ölkə</label>
                                        <select name="country_id" id="country"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Ölkə seç ---</option>
                                            @foreach($countries as $country)
                                                <option @if(request()->input('country_id') == $country->id) selected
                                                        @endif value="{{ $country->id }}">{{ $country->name_az }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ad</label>
                                        <input type="text" name="name" value="{{ request()->input('name') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Status seç ---</option>
                                            <option value="1" @if(request()->input('status') == '1') selected @endif>
                                                Active
                                            </option>
                                            <option value="0" @if(request()->input('status') == '0') selected @endif>
                                                Passive
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telefon: </label>
                                        <input type="text" class="form-control" value=""
                                               name="phone" data-mask="(999) 99 999-99-99"
                                               placeholder="(994) 99 999-99-99">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Şəhər</label>
                                        <select name="city_id" id="city"
                                                class="form-control select-search "
                                                data-fouc>
                                            <option value=""> --- Şəhər seç ---</option>
                                            @foreach($cities as $city)
                                                <option @if(request()->input('city_id') == $city->id) selected
                                                        @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ünvan</label>
                                        <input type="text" name="name" value="{{ request()->input('address') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Tarix:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="date" name="date" class="form-control"
                                                   value="{{ request()->input('date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Axtarış</label>
                                        <input type="hidden" name="type" value="{{ $type }}"
                                               class="form-control">
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                    class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table datatable-basic text-center">
                            <thead>
                            <tr>
                                <th>Ölkə</th>
                                <th>Şəhər</th>
                                <th>Ad</th>
                                <th>Telefon</th>
                                <th>Ünvan</th>
                                <th>Tarix</th>
                                <th>Status</th>
                                <th>Əməliyyat</th>
                            </tr>
                            </thead>
                            <tbody class="text-center" id="customer_body">
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->countryName->name_az}}</td>
                                    <td>{{$result->cityName->name}}</td>
                                    <td>{{$result->name}}</td>
                                    <td>{{$result->phone_1}}</td>
                                    <td>{{$result->address}}</td>
                                    <td>{{$result->date}} </td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'stocks'])
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route("getStockEdit",$result->id)}}"
                                                       class="dropdown-item"><i
                                                                class="icon-pencil5"></i>Edit</a>
                                                    <a href="{{ !$type ?  route("getSections",['stock_id' => $result->id]) : route("getSacks",['stock_id' => $result->id]) }}"
                                                       class="dropdown-item"><i class="icon-section"></i>Bolmeler</a>
                                                    <a href="{{ route('getStockOrSackOrders',['type' => $result->type ? 'sack' : 'stock','id' => $result->id]) }}"
                                                       class="dropdown-item"><i class="icon-list"></i>Sifarisler</a>
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
    <script>
        url_status = '{{ route("postModuleStatus") }}';
    </script>
    <script src="{{asset("/admin/assets/js/permission.js")}}"></script>
@endsection

@section("css")

@endsection
