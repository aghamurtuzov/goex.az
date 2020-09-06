@extends("main.site-admin")
@section("content")


    <div class="content pt-4 pb-4">
        <div class="card shop">
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
                <form id="form" action="{{route("postCategoryEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="az" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Şəhər</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Şəhər Adı Az</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_az ?? old('name_az') }}" name="name_az" placeholder="Şəhər Adı Az" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Ölkə</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Şəhər Adı Ru</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_ru ?? old('name_ru') }}" name="name_ru" placeholder="Şəhər Adı Ru" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Ölkə</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Şəhər Adı En</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_en ?? old('name_en') }}" name="name_en" placeholder="Şəhər Adı En" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="tr" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Ölkə</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Şəhər Adı Tr</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->name_tr ?? old('name_tr') }}" name="name_tr" placeholder="Şəhər Adı Tr" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" @if(isset($result->status) && $result->status == '1') selected @endif>Aktiv</option>
                                <option value="0" @if(isset($result->status) && $result->status == '0') selected @endif>Passiv</option>
                            </select>
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
