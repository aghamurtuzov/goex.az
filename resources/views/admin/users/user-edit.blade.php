@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
           @includeIf('partials.session-message')
            <div class="card-body">
                <form id="form" action="{{route("postUserEdit",[ 'id' => $user->id ])}}" method="post" class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">İstifadəçi Redaktə Et</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">İstifadəçi Adı</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{ $user->username }}" name="username" class="form-control"
                                       placeholder="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{$user->email}}" name="email" class="form-control"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ad</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control"
                                       placeholder="Firstname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Soyad</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control"
                                       placeholder="Lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ip Ünvan</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{$user->ip_address}}" name="ip_address" class="form-control"
                                       placeholder="Ip  Ünvanı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Telefon</label>
                            <div class="col-lg-10">
                                <input type="text" value="{{$user->phone}}" name="phone" class="form-control"
                                       placeholder="Telefon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="status">
                                    <option value="1" @if($user->status=="1") selected @endif>Aktiv</option>
                                    <option value="0" @if($user->status=="0") selected @endif>Deaktiv</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row form-group-float">
                            <label class="col-form-label col-lg-2">Rol: </label>
                            <div class="col-lg-10">
                                <select data-placeholder="Multiple select" name="roles[]"
                                        style="border: 1px solid #ddd;" multiple=""
                                        class="form-control form-control-select2 select2-hidden-accessible" data-fouc=""
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($roles as $role)
                                        <option @if(in_array($role->id,$userRoles)) selected
                                                @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
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
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                                class="btn btn-primary">Geri
                        </button>
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i
                                class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("css")

@endsection
@section("js")

@endsection
