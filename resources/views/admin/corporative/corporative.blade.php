@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Korporativ müştərilər</h5>
                        </div>
                        <div class="col-md-6 m-auto text-right">
                            <a href="{{route('getCorporativeForm')}}">
                                <button class="btn btn-primary">Əlavə et</button>
                            </a>
                        </div>
                    </div>
                    <form
                            action="{{ route('getModuleSearch',['module'=> 'customer','viewFile'=>'corporative','path' => 'corporative','mainPath'=>'admin','routeId' => request()->route('id')]) }}"
                            method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ad Soyad</label>
                                        <input type="text" name="full_name" value="{{ request()->input('full_name') }}"
                                               placeholder="Ad Soyad" class="form-control">
                                        {{--                                        <input type="hidden" value="{{request()->route('type')}}" name="type">--}}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telefon: </label>
                                        <input type="text" class="form-control" value="{{ request()->input('phone') }}"
                                               name="phone" data-mask="(999) 99 999-99-99"
                                               placeholder="(994) 99 999-99-99">
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
                                        <label>Filiallar</label>
                                        <select name="filial_id" id="filial"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Filial seç ---</option>
                                            @foreach($filials as $filial)
                                                <option @if(request()->input('filial_id') == $filial->id) selected
                                                        @endif value="{{ $filial->id }}">{{ $filial->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Müştəri Kodu</label>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">G</span>
                                        </div>
                                        <input type="text" name="customer_code" placeholder="152453625"
                                               value="{{ request()->input('customer_code') }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label for="">Passport</label>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">AZE №</span>
                                        </div>
                                        <input type="text" name="passport" placeholder="15245262"
                                               value="{{ request()->input('passport') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Passport Fin</label>
                                        <input type="text" name="passport_fin" placeholder="5fg555d"
                                               value="{{ request()->input('passport_fin') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" placeholder="goex@mail.ru"
                                               value="{{ request()->input('email') }}" class="form-control">
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
                                <input type="hidden" value="{{request()->route('id')}}" name="situation">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Axtarış</label>

                                        <button type="submit" class="btn btn-default btn-block"><i
                                                    class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                            @php
                                $routeId = isset($routeId) ? $routeId : request()->route('id');
                            @endphp
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-highlight nav-justified tabs-width-full">
                                    <li class="nav-item"><a
                                                href="{{route('getCorporative')}}"
                                                class="nav-link @if(request()->route('id') == '' &&  $routeId == '') active @endif legitRipple px-0">Bütün
                                            müştərilər
                                            <span
                                                    class="badge badge-success badge-pill ml-2"></span></a>
                                    </li>
                                    <li class="nav-item"><a
                                                href="{{route('getCorporative',['id'=>1])}}"
                                                class="nav-link @if(request()->route('id') == 1  ||  $routeId == 1) active @endif  legitRipple px-0"><span
                                                    class="badge badge-warning badge-pill mr-2"></span>
                                            Sifarişi olan müştərilər</a>
                                    </li>
                                    <li class="nav-item"><a
                                                href="{{route('getCorporative',['id'=>2])}}"
                                                class="nav-link @if(request()->route('id') == 2  ||  $routeId == 2) active @endif  legitRipple px-0"><span
                                                    class="badge badge-warning badge-pill mr-2"></span>
                                            Aktiv sifarişi olan müştərilər</a>
                                    </li>
                                    <li class="nav-item"><a
                                                href="{{route('getCorporative',['id'=>3])}}"
                                                class="nav-link @if(request()->route('id') == 3  ||  $routeId == 3) active @endif  legitRipple px-0"><span
                                                    class="badge badge-warning badge-pill mr-2"></span>
                                            Sifarişi olmayan müştərilər</a>
                                    </li>


                                </ul>

                            </div>
                        </div>
                        <table class="table datatable-basic text-center">
                            <thead>
                            <tr>
                                <th>Müştəri Kodu</th>
                                <th>Ad Soyad</th>
                                <th>Filial</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Endirim</th>
                                <th>Status</th>
                                <th>Əməliyyat</th>
                            </tr>
                            </thead>
                            @if(count($results) > 0)
                            <tbody class="text-center" id="customer_body">
                                @foreach($results as $result)
                                    <tr>
                                        <td><b id="customer_code">G</b> {{$result->customer_code}}</td>
                                        <td>{{$result->first_name.' '.$result->last_name}}</td>
                                        <td>{{$result->filialName ? $result->filialName->name : ''}}</td>
                                        <td>{{$result->phone}}</td>
                                        <td>{{$result->email}}</td>
                                        <td>{{$result->discount}} %</td>
                                        @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'customers'])
                                        <td class="text-center">
                                            <a href="{{route("getCorporativeProfile",$result->id)}}"
                                               class="dropdown-item"><i
                                                        class="icon-eye icon-2x mr-1"></i> Bax</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                                <div class="card text-center">
                                    <h4 style="font-weight: 500;">Məlumat yoxdur</h4>
                                </div>
                            @endif
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
    <style>
        #customer_code {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style>
@endsection
