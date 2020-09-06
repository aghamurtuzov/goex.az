@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Kampaniya</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="add-button" href="{{route("getCompanyEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'company','viewFile'=>'componies','path' => 'componies']) }}"
                        method="GET">
                        @csrf
                    <div class="container form-tabs p-2">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ad</label>
                                    <input type="text" name="name" value="{{ request()->input('name_az') }}"
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
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <label>Axtarış</label>
                                    <button type="submit" class="btn btn-default btn-block"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>Ad</th>
                            <th>Tarif</th>
                            <th>Endirim</th>
                            <th> Tarix</th>
                            <th>Status</th>
                            <th>Başlama Saati</th>
                            <th>Bitmə Saati</th>
                            <th>Əməliyyat</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="customer_body">
                          @foreach($results as $result)
                            <tr>
                                <td class="text-center">{{ $result->name_az}}</td>
                                <td class="text-center">{{$result->tariffName ? $result->tariffName->weight_text_az : '-'}}</td>
                                <td class="text-center">{{$result->discount}}</td>
                                <td class="text-center">{{$result->start_date}}</td>
                                @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'companies'])
                                <td class="text-center">{{$result->start_time}}</td>
                                <td class="text-center">{{$result->end_time}}</td>
                                <td class="text-center">
                                    <a href="{{route("getCompanyEdit",$result->id)}}" class="dropdown-item"><i
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
