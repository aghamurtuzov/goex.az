@extends("main.admin")
@section("content")
    <div class="content permission">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-6 solid">
                    <div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="role"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form>
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Rol Əlavə Et</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="container mt-2">
                                        <div class="alert message"></div>
                                    </div>
                                    <div class="modal-body">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Ad</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                           placeholder="Ad">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row form-group-float">
                                            <label class="col-form-label col-lg-2">Permission: </label>
                                            <div class="col-lg-10">
                                                <select data-placeholder="Multiple select" id="permission"
                                                        name="permission[]" style="border: 1px solid #ddd;" multiple=""
                                                        class="form-control permission_select form-control-select2 select2-hidden-accessible"
                                                        data-fouc="" tabindex="-1" aria-hidden="true">
                                                    <optgroup>
                                                        @foreach($permission as $p)
                                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <fieldset class="mb-3">
                                            <div class="col-lg-10">
                                                <input type="hidden" name="id" id="id">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="type" data-id="" class="btn btn-primary role_save">Yadda Saxla <i
                                                class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="newadd">
                        <button class="btn btn-primary" data-id="0" data-toggle="modal" data-target="#role">Yeni Rol
                            Əlavə Et
                        </button>
                    </div>

                    <table class="table datatable-basic role">
                        <thead>
                        <tr>
                            <th>Ad</th>
                            <th>Rol</th>
                            <th>Status</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody id="role_table" class="status-change-table">
                        @foreach($roles as $role)
                            <tr class="roles{{$role->id}}">
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach($role->permissions as $per)
                                        <label class="badge badge-success"
                                               data-id="{{$per->id}}"> {{$per->name}}</label>
                                    @endforeach
                                </td>
                                @includeIf('partials.status', ['id' => $role->id,'status' => $role->status,'module' => 'roles'])
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="dropdown-item  role_update"
                                       data-id="{{$role->id}}" data-toggle="modal" data-target="#role"><i
                                            class="icon-pencil5 m-auto mr-3 icon-2x"></i></a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="modal fade" id="permissions" tabindex="-1" role="dialog" aria-labelledby="permissions"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form>
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">İcazələr Əlavə Et</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="container mt-2">
                                        <div class="alert message"></div>
                                    </div>
                                    <div class="modal-body">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Ad</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name" id="permission_name"
                                                           class="form-control"
                                                           placeholder="Ad">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="mb-3">
                                            <div class="col-lg-10">
                                                <input type="hidden" name="id" id="id">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="type" data-id="" class="btn btn-primary permission_save">Yadda
                                            Saxla <i
                                                class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="newadd">
                        <button class="btn btn-primary" data-id="0" data-toggle="modal" data-target="#permissions">Yeni
                            İcazə Əlavə Et
                        </button>
                    </div>
                    <table class="table datatable-basic permission ">
                        <thead>
                        <tr>
                            <th>Ad</th>
                            <th>Status</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody id="permission_table" class="status-change-table">
                        @foreach($permission as $per)
                            <tr class="permission{{$per->id}}">
                                <td>{{$per->name}}</td>
                                @includeIf('partials.status', ['id' => $per->id,'status' => $per->status,'module' => 'permissions'])
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="dropdown-item  permissions_update"
                                       data-id="{{$per->id}}" data-toggle="modal" data-target="#permissions"><i
                                            class="icon-pencil5 m-auto mr-3 icon-2x"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("css")


@endsection

@section("js")

    <script>
        let url_permission = '{{route("permissionForm")}}';
        let url_role = '{{route("role_form")}}';
    </script>
    <script src="{{asset("/admin/assets/js/permission.js")}}"></script>
@endsection
