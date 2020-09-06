@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                @includeIf('partials.session-message')

                <form action="{{route("postSackEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Çuvallar</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Ad</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="name" value="{{ $result->name??''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Stok</label>
                                <div class="col-lg-10">
                                    <select name="stock_id" class="select-search form-control">

                                        <option value="">-- Stok Seç --</option>
                                        @foreach($stocks as $stock)
                                            <option value="{{ $stock->id }}"
                                                    @if(isset($result->stock_id) && $stock->id==$result->stock_id) selected @endif>{{$stock->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Status</label>
                                <div class="col-lg-10">
                                    <select name="status" class="select-search form-control">
                                        <option @if($result && !$result['status']) selected @endif value="1">Aktiv
                                        </option>
                                        <option @if($result && $result['status']) selected @endif value="0">Deaktiv
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
