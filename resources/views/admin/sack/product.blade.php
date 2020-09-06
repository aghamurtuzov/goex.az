@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                @includeIf('partials.session-message')

                <form action="{{route("postSackProductAdd",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Çuvallar</legend>

                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Barkod</label>
                                <div class="col-lg-10">
                                    <input autofocus class="form-control" type="text" name="barcode"
                                           value="{{ old('barcode')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Ad</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="product_name"
                                           value="{{ old('product_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Sirket</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="product_company"
                                           value="{{ old('product_company')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Sirket unvani</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="product_company_address"
                                           value="{{ old('product_company_address')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Musteri kodu</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="customer_code"
                                           value="{{ old('customer_code')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Miqdar</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="quantity"
                                           value="{{ old('quantity')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Product price</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="product_price"
                                           value="{{ old('product_price')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Width</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="width"
                                           value="{{ old('width')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Length</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="length"
                                           value="{{ old('length')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Weight</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="weight"
                                           value="{{ old('weight')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Value</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="value"
                                           value="{{ old('value')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Depth</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="depth"
                                           value="{{ old('depth')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Address</label>
                                <div class="col-lg-10">
                                    <select name="address_id" class="select-search form-control">
                                        <option value="">-- Address Seç --</option>
                                        @foreach($addresses as  $address)
                                            <option @if(old('product_type') == $address->id) selected
                                                    @endif value="{{ $address->id }}">{{$address->address_line_1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Product type</label>
                                <div class="col-lg-10">
                                    <select name="product_type" class="select-search form-control">
                                        <option value="">-- Product type Seç --</option>
                                        @foreach(config('settings.productTypes') as $key => $productType)
                                            <option @if(old('product_type') == $key) selected
                                                    @endif value="{{ $key }}">{{$productType}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Valyuta</label>
                                <div class="col-lg-10">
                                    <select name="balance_id" class="select-search form-control">
                                        <option value="">-- Valyuta Seç --</option>
                                        @foreach($balances as $balance)
                                            <option @if(old('balance_id') == $balance->id) selected
                                                    @endif value="{{ $balance->id }}">{{$balance->name_az}}</option>
                                        @endforeach
                                    </select>
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
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Status</label>
                                <div class="col-lg-10">
                                    <select name="status" class="select-search form-control">
                                        <option @if(old('status')) selected @endif value="1">Aktiv
                                        </option>
                                        <option @if(!old('status')) selected @endif value="0">Deaktiv
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

        $("input[name='barcode']").focus();

        $('body').on('keypress', '.barcode', function (e) {
            if (e.keyCode === 13 || e.keyCode === 9834) {
                let barcode = $(this).val();
                $(this).blur();
            }
        });

    </script>

@endsection
