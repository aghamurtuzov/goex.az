@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Tariflər</h5>
                        </div>

                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'tariff','viewFile'=>'tariffes','path' => 'tariffes']) }}"
                        method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Qiymət</label>
                                        <input type="text" name="price" value="{{ request()->input('price') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ölkə</label>
                                        <select name="country_id" id="country_id"
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
                                        <label>Tip</label>
                                        <select name="type" id="type"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Tip seç ---</option>
                                            <option value="1" @if(request()->input('type') == '1') selected @endif>
                                                Maye
                                            </option>
                                            <option value="0" @if(request()->input('status') == '0') selected @endif>
                                                Digər
                                            </option>
                                        </select>

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
                                                Aktiv
                                            </option>
                                            <option value="0" @if(request()->input('status') == '0') selected @endif>
                                                Passiv
                                            </option>
                                        </select>

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
                        <div class="row p-2">
                            <div class="col-md-12 text-right">
                                <a class="add-button" href="{{route("getTariffesEdit",['id' => 0])}}">
                                    <button type="button" class="btn btn-primary">Əlavə Et</button>
                                </a>
                            </div>
                        </div>
                        <table class="table datatable-basic text-center">
                            <thead>
                            <tr>
                                <th>Ölkə</th>
                                <th>Çəki</th>
                                <th>Qiymət</th>
                                <th>Status</th>
                                <th>Tip</th>
                                <th>Sort</th>
                                <th>Əməliyyat</th>
                            </tr>
                            </thead>
                            <tbody class="text-center" id="tariff_body">
                            @foreach($results as $result)
                                <tr>
                                    <td class="text-center">{{$result->countryName ? $result->countryName->name_az : ''}}</td>
                                    <td class="text-center">{{$result->weight_text_az}} </td>
                                    <td class="text-center">{{$result->price}}</td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'tariffs'])
                                    <td class="text-center">{{$result->typeName()}}</td>
                                    <td class="text-center">{{$result->sort}}</td>
                                    <td class="text-center">
                                        <a href="{{route("getTariffesEdit",$result->id)}}" class="dropdown-item"><i
                                                class="icon-pencil5 icon-2x m-auto"></i></a>
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
