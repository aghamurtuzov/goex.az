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
                <form id="form" action="{{route("postTranslationEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Key</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $result->key ?? old('key') }}" name="key"
                                   placeholder="Key" required>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="az" role="tabpanel">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Value Az</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control"
                                               value="{{ $result->value['az'] ?? old('value_az') }}" name="value_az"
                                               placeholder="Value Az" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Value Ru</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control"
                                               value="{{ $result->value['ru'] ?? old('value_ru') }}" name="value_ru"
                                               placeholder="Value Ru" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Value En</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control"
                                               value="{{ $result->value['en'] ?? old('value_en') }}" name="value_en"
                                               placeholder="Value En" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="tr" role="tabpanel">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Value Tr</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control"
                                               value="{{ $result->value['tr'] ?? old('value_tr') }}" name="value_tr"
                                               placeholder="Value Tt" required>
                                    </div>
                                </div>
                            </fieldset>
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
