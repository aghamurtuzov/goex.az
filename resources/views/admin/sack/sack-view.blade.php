@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Çuvallar</h5>
                        </div>
                    </div>
                    <div class="container p-2">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-sack">
                                    <div class="row sacks-number">
                                        <a href="#" onclick=false>
                                            <img style="width: 100%;" src="{{ asset('admin/assets/global_assets/images/sack.png') }}"
                                                 alt="">
                                            <h3 class="text-center">{{$sack->name}} ({{ $sack->id }})</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                         Çuval Adı: {{$sack->name}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            Toplam Məhsul Sayısı: {{ $sack ? count($sack->orders) : 0 }}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            Yaradan: {{$sack->user ? $sack->user->first_name . $sack->user->last_name : ''}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            Yaranma Tarixi: {{$sack->date}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             Status: {{ config('settings.status')[$sack->status] }}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Çuvalın status tarixçəsi</strong>
                                        </span>
                                    </div>

                                    @if(count($sack->histories))
                                        @foreach($sack->histories as $history)
                                            <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                                <span class="mr-3">
                                                    {{ $history->content }}
                                                </span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-5">
                                @includeIf('partials.session-message')
                                <div class="d-flex flex-nowrap border-warning-400">
                                    <form style="display: flex;flex-direction:column;width: 80%;"
                                          action="{{ route('postSackChangeProductPosition',['id' => $sack->id]) }}"
                                          method="post">
                                        @csrf
                                        <select name="position" class="form-control"
                                                style="margin-right: 20px !important;">
                                            @if(config('settings.sackPositions'))
                                                @foreach(config('settings.sackPositions') as $key => $position)
                                                    <option {{ $key == $sack->position ? 'selected' : '' }} value="{{ $key }}">{{ $position }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div style="display: flex;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                padding: 20px 0;">
                                            <input {{ $sack->is_full ? 'checked' : '' }} type="checkbox" value="1"
                                                   name="is_full">
                                            <span>Doludur ?</span>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;">
                                            <div class="d-flex flex-nowrap border-warning-400">
                                                <a href="{{ route('postSackDelete',['id' => $sack->id]) }}"
                                                   class="btn btn-warning delete-sack">Cuvali sil</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="add-button" href="{{route("getSackProductAdd",['id' => 0])}}">
                                <button class="btn btn-primary">Add product</button>
                            </a>
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
                        @if(count($sack->orders))
                            @foreach($sack->orders as $result)
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
