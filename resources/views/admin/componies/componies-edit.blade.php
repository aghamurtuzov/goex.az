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

                     <form action="{{route("postCompanyEdit",['id' => $result->id ?? 0])}}" method="post" class="users-content">
                         @csrf
                         <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="az" role="tabpanel">
                                 <fieldset class="mb-3">
                                     <legend class="text-uppercase font-size-sm font-weight-bold">Kampaniya</legend>
                                     <div class="form-group row">
                                         <label class="col-form-label col-lg-2">Ad Az</label>
                                         <div class="col-lg-10">
                                             <input  type="text" class="form-control" value="{{ $result->name_az ?? "" }}"
                                                    name="name_az" placeholder="Ad">
                                         </div>
                                     </div>
                                 </fieldset>
                             </div>
                             <div class="tab-pane fade show " id="ru" role="tabpanel">
                                 <fieldset class="mb-3">
                                     <legend class="text-uppercase font-size-sm font-weight-bold">Kampaniya</legend>
                                     <div class="form-group row">
                                         <label class="col-form-label col-lg-2">Ad Ru</label>
                                         <div class="col-lg-10">
                                             <input  type="text" class="form-control" value="{{ $result->name_ru ?? "" }}"
                                                    name="name_ru" placeholder="Ad">
                                         </div>
                                     </div>
                                 </fieldset>
                             </div>
                             <div class="tab-pane fade show " id="en" role="tabpanel">
                                 <fieldset class="mb-3">
                                     <legend class="text-uppercase font-size-sm font-weight-bold">Kampaniya</legend>
                                     <div class="form-group row">
                                         <label class="col-form-label col-lg-2">Ad En</label>
                                         <div class="col-lg-10">
                                             <input  type="text" class="form-control" value="{{ $result->name_en ?? "" }}"
                                                    name="name_en" placeholder="Ad">
                                         </div>
                                     </div>
                                 </fieldset>
                             </div>
                             <div class="tab-pane fade show " id="tr" role="tabpanel">
                                 <fieldset class="mb-3">
                                     <legend class="text-uppercase font-size-sm font-weight-bold">Kampaniya</legend>
                                     <div class="form-group row">
                                         <label class="col-form-label col-lg-2">Ad Tr</label>
                                         <div class="col-lg-10">
                                             <input  type="text" class="form-control" value="{{ $result->name_tr ?? "" }}"
                                                     name="name_tr" placeholder="Ad">
                                         </div>
                                     </div>
                                 </fieldset>
                             </div>
                         <div class="form-group row">
                             <label class="control-label col-lg-2">Tarif</label>
                             <div class="col-lg-10">
                                 <select name="tariff_id" class="select-search form-control">
                                     <option value="">Tarif Seç</option>
                                 @foreach($tariffs as $tariff)
                                         <option value="{{ $tariff->id }}">{{$tariff->weight_text_az}}</option>
                                         <option value="{{ $tariff->id }}"
                                                 @if(isset($result->tariff_id) && $tariff->id==$result->tariff_id) selected @endif>{{$tariff->weight_text_az}}
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="control-label col-lg-2">Endirim</label>
                             <div class="col-lg-10">
                                 <input name="discount" type="text" class="form-control"
                                        value="{{$result->discount ?? ''}}" placeholder="Endirim">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="control-label col-lg-2">Endirim status</label>
                             <div class="col-lg-10">
                                 <select name="is_fix_or_person" class="select-search form-control">
                                     <option @if(isset($result->is_fix_or_person) && $result->is_fix_or_person==1) selected @endif value="1">Faiz</option>
                                     <option @if(isset($result->is_fix_or_person) && $result->is_fix_or_person==0) selected @endif value="0">Fix</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row" id="dateSection">
                             <label class="control-label col-lg-2">Tarix Aralığı</label>
                             <div class="input-group col-lg-10">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
                                 <input type="text" name="date"  class="form-control daterange-basic" value="{{$result->start_date ?? '' }}">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="control-label col-lg-2">Başlama Saati</label>
                             <div class="col-lg-10">
                                 <div class="input-group">
						     <span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-watch2"></i></span>
										</span>
                                     <input type="text" name="start_time"  class="form-control" id="anytime-time" value="{{$result->start_time ?? ''}}">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="control-label col-lg-2">Bitmə Saati</label>
                             <div class="col-lg-10">
                                 <div class="input-group">
						<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-watch2"></i></span>
										</span>
                                     <input type="text" name="end_time" class="form-control" id="anytime-time-2" value="{{$result->end_time ?? ''}}">
                                 </div>
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
