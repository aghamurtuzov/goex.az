@extends("main.site-admin")
@section("content")


    <div class="content pt-4 pb-4">
        <div class="card shop">
            @includeIf('partials.session-message')
            <div class="card-body">
                <form id="form" action="{{route("postAddressEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="az" role="tabpanel">
                            <legend class="text-uppercase font-size-sm font-weight-bold">Ünvan</legend>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ad </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->first_name ?? old('first_name') }}"
                                           name="first_name" placeholder="Ad " required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"> Soyad</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->last_name ?? old('last_name') }}"
                                           name="last_name" placeholder=" Soyad" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ünvan 1</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->address_line_1 ?? old('address_line_1') }}"
                                           name="address_line_1" placeholder="Ünvan 1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ünvan 2</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->address_line_2 ?? old('address_line_2') }}"
                                           name="address_line_2" placeholder="Ünvan 2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Telefon</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $result->phone ?? old('phone') }}"
                                           name="phone" data-mask="(999) 99 999-99-99"
                                           placeholder="(994) 99 999-99-99" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Longitude</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $result->longitude ?? old('longitude') }}"
                                           name="longitude" placeholder="Longitude" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Latitude</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $result->latitude ?? old('latitude') }}"
                                           name="latitude" placeholder="Latitude" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Olke</label>
                                <div class="col-lg-10">
                                    <select name="country" id="country" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                    @if($result && $result->country_id == $country->id) selected @endif>{{ $country->name_az }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Şəhər</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $result->city ?? old('city') }}"
                                           name="city" placeholder="Şəhər" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Rayon</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->district ?? old('district') }}"
                                           name="district" placeholder="Rayon" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Küçə</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->street ?? old('street') }}"
                                           name="street" placeholder="Küçə" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Pasport Fin</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->passport_fin ?? old('passport_fin') }}"
                                           name="passport_fin" placeholder="Passport Fin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Province</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->province ?? old('province') }}"
                                           name="province" placeholder="Province" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Receiver</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"
                                           value="{{ $result->receiver ?? old('receiver') }}"
                                           name="receiver" placeholder="Receiver" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Text az</label>
                                <div class="col-lg-10">
                                        <textarea name="text_az" class="ckeditor form-control" rows="4" cols="4" >
                                                            {{ $result->text_az ?? old('text_az') }}
                                               </textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Text ru</label>
                                <div class="col-lg-10">
                                        <textarea name="text_ru" class="ckeditor form-control" rows="4" cols="4" >
                                                            {{ $result->text_ru ?? old('text_ru') }}
                                               </textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Text en</label>
                                <div class="col-lg-10">
                                        <textarea name="text_en" class="ckeditor form-control" rows="4" cols="4" >
                                                            {{ $result->text_en ?? old('text_en') }}
                                               </textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Text tr</label>
                                <div class="col-lg-10">
                                        <textarea name="text_tr" class="ckeditor form-control" rows="4" cols="4" >
                                                            {{ $result->text_tr ?? old('text_tr') }}
                                               </textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status</label>
                                <div class="col-lg-10">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1"
                                                @if(isset($result->status) && $result->status == '1') selected @endif>
                                            Aktiv
                                        </option>
                                        <option value="0"
                                                @if(isset($result->status) && $result->status == '0') selected @endif>
                                            Passiv
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@section("js")


@endsection


@section("css")

@endsection
