@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            @includeIf('partials.session-message')
            <div class="card-body">
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

                <form action="{{route("postBalanceEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="az" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Balans</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Ad Az</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_az ?? "" }}"
                                               name="name_az" placeholder="Ad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Slug Az</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->slug_az ?? "" }}"
                                               name="slug_az" placeholder="Slug">
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <div class="tab-pane fade show " id="ru" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Balans</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Ad Ru</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_ru ?? "" }}"
                                               name="name_ru" placeholder="Ad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Slug Ru</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->slug_ru ?? "" }}"
                                               name="slug_ru" placeholder="Slug">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade show " id="en" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Balans</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Ad En</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_en ?? "" }}"
                                               name="name_en" placeholder="Ad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Slug En</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->slug_en ?? "" }}"
                                               name="slug_en" placeholder="Slug">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade show " id="tr" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Balans</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Ad Tr</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_tr ?? "" }}"
                                               name="name_tr" placeholder="Ad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Slug Tr</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->slug_tr ?? "" }}"
                                               name="slug_tr" placeholder="Slug">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select name="status" id="status"
                                        class="form-control select-search sms-template-choose"
                                        data-fouc>
                                    <option value="1" @if(isset($result->status) && $result->status==1) selected
                                            @endif>
                                        Active
                                    </option>
                                    <option value="0" @if(isset($result->status) && $result->status==0) selected
                                            @endif>
                                         Passive
                                    </option>
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
                </form>

                <!-- /basic datatable -->

            </div>

        </div>
    </div>



@endsection

@section("css")

@endsection

