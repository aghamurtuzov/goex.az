@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
                    <div class="card-body">
                        @includeIf('partials.session-message')
                        <ul class="nav nav-tabs mr-auto" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#az" role="tab">Az</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ru" role="tab">Ru</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#en" role="tab">En</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tr" role="tab">Tr</a>
                            </li>
                        </ul>
                <form id="form" action="{{route("postTariffesEdit",['id' => $result->id ?? 0])}}" method="post" class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Tariff</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Ölkə</label>
                                <div class="col-lg-10">
                                    <select name="country_id" class="select-search form-control">
                                        <option value="">Ölkə Seç</option>
                                        @foreach($countries as $country)
{{--                                            <option value="{{ $country->id }}">{{$country->name_az}}</option>--}}
                                            <option value="{{ $country->id }}"
                                                   @if(isset($result->country_id) && $country->id==$result->country_id) selected @endif>{{$country->name_az}}
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Type</label>
                                <div class="col-lg-10">
                                    <select name="type" class="select-search form-control">
                                        <option value="">Tip Seç</option>
{{--                                        <option value="0">Digər</option>--}}
{{--                                        <option value="1">Maye</option>--}}
                                        <option @if(isset($result->type) && $result->type==1) selected @endif value="1">Maye</option>
                                        <option @if(isset($result->type) && $result->type==0) selected @endif value="0">Digər</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-lg-2">Başlanğıc Çəki</label>
                                <div class="col-lg-10">
                                    <input name="start_weight" type="text" class="form-control"
                                           value="{{ $result->start_weight ?? "" }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Son Çəki</label>
                                <div class="col-lg-10">
                                    <input name="end_weight" type="text" class="form-control"
                                           value="{{ $result->end_weight ?? "" }}">
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="az" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-2">Ölçü Mətin Az</label>
                                        <div class="col-lg-10">
                                            <input name="weight_text_az" type="text" class="form-control"
                                                   value="{{ $result->weight_text_az ?? "" }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show " id="ru" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-2">Ölçü Mətin Ru</label>
                                        <div class="col-lg-10">
                                            <input name="weight_text_ru" type="text" class="form-control"
                                                   value="{{ $result->weight_text_ru ?? "" }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show " id="en" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-2">Ölçü Mətin En</label>
                                        <div class="col-lg-10">
                                            <input name="weight_text_en" type="text" class="form-control"
                                                   value="{{ $result->weight_text_en ?? "" }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show " id="tr" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-2">Ölçü Mətin Tr</label>
                                        <div class="col-lg-10">
                                            <input name="weight_text_tr" type="text" class="form-control"
                                                   value="{{ $result->weight_text_tr ?? "" }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Qiymət</label>
                                <div class="col-lg-10">
                                    <input name="price" type="text" class="form-control"
                                           value="{{ $result->price ?? "" }}" placeholder="Ad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Sort</label>
                                <div class="col-lg-10">
                                    <input name="sort" type="text" class="form-control"
                                           value="{{ $result->sort ?? "" }}" >
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
