@extends("main.site-admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Ölkə</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6 text-left">
                            <a class="add-button" href="{{route("getCountryEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="add-button" href="{{route("getCategoryEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form class="col-md-6 p-3"
                                  action="{{ route('getModuleSearch',['module'=> 'country','mainPath'=> 'site-admin', 'path' => 'dictionary','viewFile'=>'dictionaries' ]) }}"
                                  method="GET">
                                @csrf
                                <input type="hidden" name="perPage" value="20"
                                       class="form-control">
                                <div class="container form-tabs p-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ad</label>
                                                <input type="text" name="name" value="{{ request()->input('name') }}"
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
                                                <button type="submit" class="btn btn-default btn-block"><i
                                                        class="icon-search4"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table datatable-basic text-center">
                                    <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Şəkil</th>
                                        <th>Kod</th>
                                        <th>Status</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="customer_body">
                                    @foreach($results as $result)
                                        <tr>
                                            <td class="text-center">{{ $result->name_az }}</td>
                                            <td class="text-center"><img src="/{{$result->image}}"
                                                                         width="100">
                                            </td>
                                            <td class="text-center">{{ $result->code }}</td>
                                            @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'countries'])

                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                             <a href="{{route("getCountryEdit",$result->id)}}"
                                                               class="dropdown-item"><i
                                                                    class="icon-pencil5"></i>Redaktə Et</a>
                                                            <a href="javascript:void(0)" data-id="{{ $result->id }}"
                                                               data-module="countries"
                                                               class="dropdown-item deleteModal"><i
                                                                    class="icon-list"></i>Sil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>


                            </form>
                            <form class="col-md-6 p-3"
                                  action="{{ route('getModuleSearch',['module'=> 'category','mainPath' => 'site-admin', 'path' => 'dictionary','viewFile'=>'dictionaries' ]) }}"
                                  method="GET">
                                @csrf
                                <input type="hidden" name="perPage" value="20"
                                       class="form-control">
                                <div class="container form-tabs p-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ad</label>
                                                <input type="text" name="name"
                                                       value="{{ request()->input('name_az') }}"
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
                                                <button type="submit" class="btn btn-default btn-block"><i
                                                        class="icon-search4"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table datatable-basic text-center">
                                    <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Status</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="customer_body">
                                    @foreach($results_ as $result_)
                                        <tr>
                                            <td class="text-center">{{ $result_->name_az}}</td>
                                            @includeIf('partials.status', ['id' => $result_->id,'status' => $result_->status,'module' => 'categories'])


                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route("getCategoryEdit",$result_->id)}}"
                                                               class="dropdown-item"><i
                                                                    class="icon-pencil5"></i>Redaktə Et</a>
                                                            <a href="javascript:void(0)" data-id="{{ $result_->id }}"
                                                               data-module="categories"
                                                               class="dropdown-item deleteModal"><i
                                                                    class="icon-list"></i>Sil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>


                            </form>
                        </div>
                    </div>


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
