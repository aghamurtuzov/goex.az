@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                 @includeIf('partials.session-message')

                <form action="{{route("postSubSectionEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Anbar</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Bölmə</label>
                                <div class="col-lg-10">
                                <select name="section_id" class="select-search form-control">
                                    <option value="">Bolme Seç</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}"
                                                @if(isset($section->id) && $section->id==$result->section_id) selected @endif>{{$section->name}}
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
