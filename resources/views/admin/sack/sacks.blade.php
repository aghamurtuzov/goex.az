@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">

                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Çuvallar</h5>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="local-stock-sections" href="{{route("getSackTransferProduct")}}">
                                <button class="btn btn-primary">Transfer product</button>
                            </a>
                            <a class="add-button" href="{{route("getSackProductAdd",['id' => 0])}}">
                                <button class="btn btn-primary">Add product</button>
                            </a>
                            <a class="add-button" href="{{route("getSackEdit",['id' => 0])}}">
                                <button class="btn btn-primary">Yeni çuval yarat</button>
                            </a>
                        </div>
                    </div>
                    <form
                            action="{{ route('getModuleSearch',['module'=> 'sack','viewFile'=>'sacks','path' => 'sack']) }}"
                            method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Ad</label>
                                        <input type="text" name="name" value="{{ request()->input('name') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Stok</label>
                                        <select name="stock_id" id="stock"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Stock seç ---</option>
                                            @foreach($stocks as $stock)
                                                <option @if(request()->input('stock_id') == $stock->id) selected
                                                        @endif value="{{ $stock->id }}">{{ $stock->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Status seç ---</option>
                                            <option value="1" @if(request()->input('status') == '1') selected @endif>
                                                Active
                                            </option>
                                            <option value="0" @if(request()->input('status') == '0') selected @endif>
                                                Passive
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="date" name="start_date" class="form-control"
                                                   value="{{ request()->input('start_date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="date" name="end_date" class="form-control"
                                                   value="{{ request()->input('end_date') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Search</label>
                                        <input type="hidden" name="position" class="form-control"
                                               value="{{ $position['count']}}">
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                    class="icon-search4"></i></button>
                                        <a href="{{ route('getStockOrSackOrders',['type' =>'sack' ,'id' => App\Models\Stock::first()->id]) }}" class="btn btn-success btn-block">
                                            Ətraflı axtarış <i class="icon-search4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /basic datatable -->

                        <div class="card my-card-box pb-0">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-highlight nav-justified tabs-width-full">
                                    <li class="nav-item"><a href="{{route("getSacks",['position' => 0])}}"
                                                            class="nav-link @if($position['count'] == 0) active @endif  legitRipple px-0"><span
                                                    class="badge badge-warning badge-pill mr-2">{{ $position['first'] }}</span>
                                            Xarici anbarda</a>
                                    </li>
                                    <li class="nav-item"><a href="{{route("getSacks",['position' => 1])}}"
                                                            class="nav-link @if($position['count'] == 1) active @endif  legitRipple px-0">Yolda
                                            <span
                                                    class="badge badge-primary badge-pill ml-2">{{ $position['second'] }}</span></a>
                                    </li>
                                    <li class="nav-item"><a href="{{route("getSacks",['position' => 2])}}"
                                                            class="nav-link @if($position['count'] == 2) active @endif  legitRipple px-0">Tamamlanmış
                                            <span
                                                    class="badge badge-success badge-pill ml-2">{{ $position['third'] }}</span></a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="justified-badges-tab1">
                                    </div>

                                    <div class="tab-pane fade" id="justified-badges-tab2">
                                    </div>

                                    <div class="tab-pane fade" id="justified-badges-tab3">
                                    </div>

                                    <div class="tab-pane fade" id="justified-badges-tab4">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card py-3 card-sack">
                            <div class="row sacks-number">
                                @foreach($results as $result)
                                    <div class="col-md-2">
                                        <a href="{{route('getSackView',['id' => $result->id])}}"><b>12</b><img
                                                    src="{{asset("/admin/assets/global_assets/images/sack.png")}}"
                                                    alt="">
                                            <h5 class="text-center">{{$result->name}}  {{ $result->is_full ? '(Doludur)' : '' }} </h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @include('partials.pagination')


                    </form>

                </div>

            </div>
        </div>

        @endsection

        @section("js")
            <script>
                url_status = '{{ route("postModuleStatus") }}';
            </script>
        @endsection

        @section("css")
            <script src="{{asset("/admin/assets/global_assets/images/sack.jpg")}}"></script>
@endsection
