{{--@extends("main.admin")--}}
{{--@section("content")--}}
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h3 class="card-title">İstifadəçilər</h3>
                        </div>

                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'user','path' => 'users','viewFile'=>'users-list' ]) }}"
                        method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ad Soyad</label>
                                        <input type="text" name="full_name" value="{{ request()->input('full_name') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">İstifadəçi Adı</label>
                                        <input type="text" name="username" value="{{ request()->input('username') }}"
                                               class="form-control">
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
                            </div>
                            <div class="row">
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
                                        <label>Rollər</label>
                                        <select class="form-control select-search select2-hidden-accessible"
                                                data-fouc="" tabindex="-1" aria-hidden="true">
                                            <option value="">--- Rol seç ---</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Axtarış</label>
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 mb-3">
                            <a href="{{route("getUserAdd")}}">
                                <button  type="button" class="btn btn-primary">Əlavə Et</button>
                            </a>
                            <a href="{{route("permission-role.index")}}">
                                <button type="button" class="btn btn-primary">İcazələr və Rollar</button>
                            </a>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table datatable-basic users">
                            <thead>
                            <tr>
                                <th>İstifadəçi Adı</th>
                                <th>Email</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Ip Ünvanı</th>
                                <th>Tarix</th>
                                <th>Telefon</th>
                                <th>Rol</th>
                                <th>Status</th>
                                <th class="text-center">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->username}}</td>
                                    <td>{{$result->email}}</td>
                                    <td>{{$result->first_name}}</td>
                                    <td>{{$result->last_name}}</td>
                                    <td>{{$result->ip_address}}</td>
                                    <td>{{$result->date}}</td>
                                    <td>{{$result->phone}}</td>
                                    <td>
                                        @if(!empty($result->getRoleNames()))
                                            @foreach($result->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'users'])
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route("getUserEdit",$result->id)}}"
                                                       class="dropdown-item"><i class="icon-pencil7"></i>Redaktə Et</a>
                                                    <a href="" class="dropdown-item"><i class="icon-trash-alt"></i>Sil</a>
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


                </div>

            </div>

        </div>
    </div>
    <!-- /table -->


{{--@endsection--}}
@section("css")

@endsection

@section("js")

@endsection
