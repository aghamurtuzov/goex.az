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
                <form id="form" action="{{route("postInformationEdit",['id' => $result->id ?? 0])}}" method="post" class="users-content" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="az" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Məlumat</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title Az</label>
                                    <div class="col-lg-10">
                                        <input  type="text" class="form-control" value="{{ $result->title_az ?? old('title_az') }}" name="title_az" placeholder="Title Az" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Metn Az</label>
                                    <div class="col-lg-10">
                                             <textarea name="content_az" class="ckeditor form-control" rows="4" cols="4" required>
                                                                           {{ $result->content_az ?? old('content_az') }}
                                              </textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Məlumat</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title Ru</label>
                                    <div class="col-lg-10">
                                        <input  type="text" class="form-control" value="{{ $result->title_ru ?? old('title_ru') }}" name="title_ru" placeholder="Title Ru" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Metn Ru</label>
                                    <div class="col-lg-10">
                                        <textarea name="content_ru" class="ckeditor form-control" rows="4" cols="4" required>
                                                            {{ $result->content_ru ?? old('content_ru') }}
                                               </textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Məlumat</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title En</label>
                                    <div class="col-lg-10">
                                        <input  type="text" class="form-control" value="{{ $result->title_en ?? old('title_en') }}" name="title_en" placeholder="Title En" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Metn En</label>
                                    <div class="col-lg-10">
                                        <textarea  name="content_en" class="form-control ckeditor" rows="4" cols="4" required>{{ $result->content_en ?? old('content_en') }}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="tr" role="tabpanel">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Məlumat</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title Tr</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" value="{{ $result->title_tr ?? old('title_tr') }}" name="title_tr" placeholder="Title Tr" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Metn Tr</label>
                                    <div class="col-lg-10">
                                        <textarea name="content_tr" class="form-control ckeditor" rows="4" cols="4" required>{{ $result->content_tr ?? old('content_tr') }}</textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Şəkil</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                                          <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tarix </label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                <input  type="date" name="date" class="form-control"
                                       value="{{  $result->date ?? old('date')  }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="dateSection">
                        <label class="control-label col-lg-2">Tarix Aralığı</label>
                        <div class="input-group col-lg-10">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
                            <input name="date_between" type="text" class="form-control daterange-basic" value=" {{ $result->date_between ?? old('date_between') }}">
                        </div>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-form-label col-lg-2" style="margin-top: auto">Kampaniya</label>--}}
{{--                        <div class="col-lg-10">--}}
{{--                            <input type="checkbox" id="category" value="0" name="is_partner" style="height: 25px;width: 23px;">--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
                        <button type="submit" class="btn btn-primary">Əlavə Et <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@section("js")

    <script>
        $("#category").click(function () {
                 if($(this).is(':checked')){
                     $("#dateSection").show();
                 }
                 else{
                     $("#dateSection").hide();
                 }
        });



    </script>


@endsection


@section("css")

@endsection
