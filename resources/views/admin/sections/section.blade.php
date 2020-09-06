@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Daxili Anbar Bölmələri</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="local-stock-sections" href="{{route("getSubSectionTransferProduct")}}">
                                <button class="btn btn-primary">Transfer product</button>
                            </a>
                            <a class="local-stock-sections" href="{{route("getSubSectionAddProduct")}}">
                                <button class="btn btn-primary">Add product</button>
                            </a>
                            <a class="local-stock-sections" href="{{route("getSubSections")}}">
                                <button class="btn btn-primary">Alt Bölmələr</button>
                            </a>
                            <a class="add-button" href="{{route("getSectionEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Yeni bölmə yarat</button>
                            </a>
                        </div>
                    </div>
                    <form
                            action="{{ route('getModuleSearch',['module'=> 'section','path' => 'sections','viewFile'=>'section' ]) }}"
                            method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Anbar</label>
                                        <select name="stock_id" id="stock"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Anbar seç ---</option>
                                            @foreach($stocks as $stock)
                                                <option @if(request()->input('stock_id') == $stock->id) selected
                                                        @endif value="{{ $stock->id }}">{{ $stock->name }}</option>
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
                                        <label>Axtarış</label>
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                    class="icon-search4"></i></button>
                                        <a href="{{ route('getStockOrSackOrders',['type' =>'stock']) }}" class="btn btn-success btn-block">
                                            Ətraflı axtarış <i class="icon-search4"></i></a>
                                    </div>
                                </div>
                            </div>


                            <table class="table datatable-basic text-center">
                                <thead>
                                <tr>
                                    <th>Anbar</th>
                                    <th>Ad</th>
                                    <th>Status</th>
                                    <th>Tarix</th>
                                    <th>Əməliyyat</th>
                                </tr>
                                </thead>
                                <tbody class="text-center" id="customer_body">
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->StockName->name}}</td>
                                        <td>{{$result->name}}</td>
                                        @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'sections'])
                                        <td>{{$result->date}}</td>

                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{route("getSectionEdit",$result->id)}}"
                                                           class="dropdown-item"><i
                                                                    class="icon-pencil5"></i>Edit</a>
                                                        <a href="{{route("getSubSections",['section_id' => $result->id])}}" class="dropdown-item"><i class="icon-list"></i>Alt Bölmələr</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('partials.pagination')
                        </div>
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
