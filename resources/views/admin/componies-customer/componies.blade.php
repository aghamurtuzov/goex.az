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
                            <a class="add-button" href="{{route("getCustomerCompanyEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                    </div>


                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>Ad</th>
                            <th>Musteri tipi</th>
                            <th>Sifaris nomresi</th>
                            <th>Endirim</th>
                            <th>EndirimStatus</th>
                            <th>Pulsuz yoxsa Endirim</th>
                            <th>Status</th>
                            <th>Tarix</th>
                            <th>Əməliyyat</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="customer_body">
                        @foreach($results as $result)
                            <tr>
                                <td class="text-center">{{ $result->name_az}}</td>
                                <td class="text-center">{{ $result->customer_type == 1 ? 'Musteri' : ($result->customer_type == 2 ? 'Korporativ musteri' : 'Yeni gelen musteri')}}</td>
                                <td class="text-center">{{$result->order_number .' sifaris'}}</td>
                                <td class="text-center">{{$result->discount}}</td>
                                <td class="text-center">{{$result->is_fix_or_person ? 'Fix' : 'Faiz'}}</td>
                                <td class="text-center">{{$result->is_free ? 'Pulsuz' : 'Endirim'}}</td>
                                @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'companies'])
                                <td class="text-center">{{$result->created_at}}</td>
                                <td class="text-center">
                                    <a href="{{route("getCustomerCompanyEdit",$result->id)}}" class="dropdown-item"><i
                                                class="icon-pencil5 icon-2x m-auto"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @include('partials.pagination')


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
