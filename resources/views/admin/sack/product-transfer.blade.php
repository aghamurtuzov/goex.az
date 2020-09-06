@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                @includeIf('partials.session-message')

                <form action="{{route("postSackTransferProduct")}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Product Transfer</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Barkod</label>
                                <div class="col-lg-10">
                                    <input id="barcode" autofocus class="form-control barcode" type="text" name="barcode"
                                           value="{{ old('barcode')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Çuval</label>
                                <div class="col-lg-10">
                                    <select name="sack_id" class="select-search form-control">
                                        <option value="">-- Çuval Seç --</option>
                                        @foreach($sacks as $sack)
                                            <option @if(old('sack_id') == $sack->id) selected
                                                    @endif value="{{ $sack->id }}">{{$sack->name}}</option>
                                        @endforeach
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

        $('body').on('keyup', '.barcode', function (e) {
            // if (e.keyCode === 13 || e.keyCode === 9834) {
                let barcode = $(this).val();
                console.log(barcode);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                    },
                    data: {
                        barcode: barcode
                    },
                    type: 'POST',
                    url: '{{ route('postProductForBarcode') }}',
                    dataType: 'json',
                    success: function (data) {
                        if (data.error == 'NotFoundUser') {
                            swal({
                                title: NotFoundUser + '!',
                                type: 'warning',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            return false;
                        }
                    }
                });
            // }
        });


        $("#anytime-time").AnyTime_picker({
            format: "%H:%i"
        });
        $("#anytime-time-2").AnyTime_picker({
            format: "%H:%i"
        });

    </script>

@endsection
