@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                @includeIf('partials.session-message')
                <form id="form" action="{{route("postStockEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Daxili Anbar</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Ölkə</label>
                                <div class="col-lg-10">
                                    <select name="country_id" class="select-search form-control">
                                        <option value="">--Ölkə Seç--</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                    @if(isset($result->country_id) && $country->id==$result->country_id) selected @endif>{{$country->name_az}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Şəhər</label>
                                <div class="col-lg-10">
                                    <select name="city_id" class="select-search form-control">
                                        <option value="">--Şəhər Seç--</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    @if(isset($result->city_id) && $city->id==$result->city_id) selected @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-lg-2">Ad</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control"
                                           value="{{ $result->name ?? "" }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Address</label>
                                <div class="col-lg-10">
                                    <input name="address" type="text" class="form-control"
                                           value="{{ $result->address ?? "" }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Phone</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $result->phone_1 ?? "" }}"
                                           name="phone_1" data-mask="(999) 99 999-99-99"
                                           placeholder="(994) 99 999-99-99">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Status</label>
                                <div class="col-lg-10">
                                    <select name="status" class="select-search form-control">
                                        <option @if(isset($result->status) && $result->status==1) selected @endif value="1">Aktiv</option>
                                        <option @if(isset($result->status) && $result->status==0) selected @endif value="0">Deaktiv</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                                        class="btn btn-primary">Geri
                                </button>
                                <button type="submit" class="btn btn-primary">Yarat <i
                                        class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <!-- /basic datatable -->

            </div>

        </div>
    </div>



@endsection

@section("css")

@endsection
@section("js")

    <script>

        $("#anytime-time").AnyTime_picker({
            format: "%H:%i"
        });
        $("#anytime-time-2").AnyTime_picker({
            format: "%H:%i"
        });

    </script>

@endsection
