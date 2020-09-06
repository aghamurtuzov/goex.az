@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            @includeIf('partials.session-message')
            <div class="card-body">
                <form id="form" action="{{route("postCorporativeForm",['id' => $result->id ?? 0])}}" method="POST"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Korporativ müştəri əlavə et
                        </legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ad</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->first_name ?? old('first_name') }}" name="first_name"
                                       placeholder="Ad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Soyad</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->last_name ?? old('last_name') }}" name="last_name"
                                       placeholder="Soyad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Şirkət adı</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->company_name ?? old('company_name') }}" name="company_name"
                                       placeholder="Şirkət adı">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Hesab nömrəsi</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->account_number ?? old('account_number') }}" name="account_number"
                                       placeholder="Hesab nömrəsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Ünvan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" value="{{ $result->address ?? old('address') }}"
                                       name="address" placeholder="Ünvan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Doğum Tarixi</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control"
                                       value="{{ $result->date_of_birth ?? old('date_of_birth') }}" name="date_of_birth"
                                       placeholder="Test">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Filial</label>
                            <div class="col-lg-10">
                                <select name="filial_id" id="filial"
                                        class="form-control select-search sms-template-choose"
                                        data-fouc>
                                    <option value=""> --- Filial seç ---</option>
                                    @foreach($filials as $filial)
                                        <option @if(old('filial_id')==$filial->id) selected @endif value="{{ $filial->id }}">{{ $filial->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Passport</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->passport ?? old('passport') }}" name="passport"
                                       placeholder="15151515">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Passport Fin</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->passport_fin ?? old('passport_fin') }}" name="passport_fin"
                                       placeholder="Passport Fin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Telefon</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" value="{{ $result->phone ?? old('phone') }}"
                                       name="phone" data-mask="(999) 99 999-99-99"
                                       placeholder="(994) 99 999-99-99">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" value="{{ $result->email ?? old('email') }}"
                                       name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Endirim</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control"
                                       value="{{ $result->discount ?? old('discount') }}" name="discount"
                                       placeholder="Endirim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Cinsiyyet</label>
                            <div class="col-lg-10">
                                <select name="gender" id="gender"
                                        class="form-control select-search sms-template-choose"
                                        data-fouc>
                                    <option value=""> --- Cinsiyyet seç ---</option>
                                    <option value="1" @if(old('gender')=='1') selected @endif>
                                        Kişi
                                    </option>
                                    <option value="0" @if(old('gender')=='0') selected @endif>
                                        Qadın
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Balans azn</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control"
                                       value="{{ $result->balance_azn ?? 0.00 }}" name="balance_azn"
                                       placeholder="Balans azn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Balans euro</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       value="{{ $result->balance_euro ?? 0.00 }}" name="balance_euro"
                                       placeholder="Balans euro">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Balans usd</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control"
                                       value="{{ $result->balance_usd ?? 0.00 }}" name="balance_usd"
                                       placeholder="Balans usd">
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-left">
                        <label class="col-form-label col-lg-2"></label>
                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
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
