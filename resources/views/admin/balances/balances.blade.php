@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Balans</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="add-button" href="{{route("getBalanceEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'balance','viewFile'=>'balances','path' => 'balances']) }}"
                        method="GET">
                        @csrf
                    <div class="container form-tabs p-2">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ad</label>
                                    <input type="text" name="name" value="{{ request()->input('name') }}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="{{ request()->input('slug') }}"
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
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Tarix</th>
                            <th>Əməliyyat</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="customer_body">
                          @foreach($results as $result)
                            <tr>
                                <td class="text-center">{{ $result->name_az}}</td>
                                <td class="text-center">{{ $result->slug_az}}</td>
                                @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'balances'])
                                <td class="text-center">{{$result->created_at}}</td>
                                <td class="text-center">
                                    <a href="{{route("getBalanceEdit",$result->id)}}" class="dropdown-item"><i
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
