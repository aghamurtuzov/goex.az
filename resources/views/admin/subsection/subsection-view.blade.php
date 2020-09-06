@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Bölmələr</h5>
                        </div>
                    </div>
                    <div class="container p-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="list-feed">
                                    @includeIf('partials.session-message')

                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                         Bölmə Adı: {{$subsection->name}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            Toplam Məhsul Sayısı: {{ $subsection ? count($subsection->orders) : 0 }}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            Yaradan: {{$subsection->user ? $subsection->user->first_name .' '. $subsection->user->last_name : ''}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            Yaranma Tarixi: {{$subsection->date}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             Status: {{ config('settings.status')[$subsection->status] }}
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>{{ $subsection->name }} bölməsinin status tarixçəsi</strong>
                                        </span>
                                </div>

                                @if(count($subsection->histories))
                                    @foreach($subsection->histories as $history)
                                        <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                                <span class="mr-3">
                                               {{ $history->content }}
{{--                                                    {{ getSubsectionHistory(0) }}--}}
                                                </span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>Məhsulun adı</th>
                            <th>İzləmə kodu</th>
                            <th>Müştəri</th>
                            <th>Status</th>
                            <th>Kategoriya</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="customer_body">
                        @if(count($subsection->orders))
                            @foreach($subsection->orders as $result)
                                <tr>
                                    <td>{{$result->product_name}}</td>
                                    <td><a href="#">{{$result->follow_code}}</a></td>
                                    <td>{{$result->customer ? $result->customer->first_name .' ' .$result->customer->last_name : '-' }}</td>
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
                                                <a href="{{route('orderInfo',[$result->id])}}"
                                                   class="dropdown-item"><i class="icon-eye icon-2x mr-1"></i>
                                                    Bax</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section("js")
    <script>
        url_status = '{{ route("postModuleStatus") }}';
    </script>
@endsection

@section("css")

@endsection