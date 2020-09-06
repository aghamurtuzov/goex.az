@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            @if(Session::has('success-message'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success-message') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-class alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <div class="card-body">
                <form action="{{route("postUserAdd")}}" method="post" class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">İstifadəçi Əlavə Et</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">İstifadəçi Adı</label>
                            <div class="col-lg-10">
                                <input type="text" name="username" class="form-control" placeholder="İstifadəçi Adı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ad</label>
                            <div class="col-lg-10">
                                <input type="text" name="first_name" class="form-control" placeholder="Ad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Soyad</label>
                            <div class="col-lg-10">
                                <input type="text" name="last_name" class="form-control" placeholder="Soyad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ip Ünvan</label>
                            <div class="col-lg-10">
                                <input type="text" name="ip_address" class="form-control" placeholder="Ip Ünvan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Telefon</label>
                            <div class="col-lg-10">
                                <input type="text" name="phone" class="form-control" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row form-group-float">
                            <label class="col-form-label col-lg-2">Rollar: </label>
                            <div class="col-lg-10">
                                <select data-placeholder="Rol Seç" name="roles[]" style="border: 1px solid #ddd;" multiple="" class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
                                    <optgroup>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Şifrə</label>
                            <div class="col-lg-10">
                                <input type="password" name="password" class="form-control" placeholder="Şifrə">
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
