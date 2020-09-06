@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">{{ $type == 'stock' ? 'Daxili Anbarda olan sifarisler' : 'Xarici Anbarda olan sifarisler'}}</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            @if($type == 'stock')
                                <a class="local-stock-sections" href="{{route("getSubSectionTransferProduct")}}">
                                    <button class="btn btn-primary">Transfer product</button>
                                </a>
                                <a class="local-stock-sections" href="{{route("getSubSectionAddProduct")}}">
                                    <button class="btn btn-primary">Add product</button>
                                </a>
                                <a class="local-stock-sections" href="{{route("getSections")}}">
                                    <button class="btn btn-primary">Daxili Anbar Bölmələri</button>
                                </a>
                                <a class="add-button" href="{{route("getSectionEdit",['id' => 0])}}">
                                    <button class="btn btn-primary">Yeni bölmə yarat</button>
                                </a>
                                <a class="local-stock-sections" href="{{route("getSubSections")}}">
                                    <button class="btn btn-primary">Alt Bölmələr</button>
                                </a>
                            @else
                                <a class="local-stock-sections" href="{{route("getSackTransferProduct")}}">
                                    <button class="btn btn-primary">Transfer product</button>
                                </a>
                                <a class="add-button" href="{{route("getSackProductAdd",['id' => 0])}}">
                                    <button class="btn btn-primary">Add product</button>
                                </a>
                                <a class="local-stock-sections" href="{{route("getSacks")}}">
                                    <button class="btn btn-primary">Çuvallar</button>
                                </a>
                                <a class="add-button" href="{{route("getSackEdit",['id' => 0])}}">
                                    <button class="btn btn-primary">Yeni çuval yarat</button>
                                </a>
                            @endif

{{--                            <a class="add-button" href="{{route("getStockEdit",['id' => 0])}}">--}}
{{--                                <button class="btn btn-primary">Əlavə Et</button>--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'order-sack-stock','path' => 'orders']) }}"
                          method="GET">
                        <div class="container card-body">
                            @csrf
                            <input type="hidden" value="{{ $type ?? '' }}" name="type">
                            <input type="hidden" value="{{ $situation ?? '' }}" name="situation">
                            <div class="container form-tabs p-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Bolme</label>
                                            <select name="stock_id" id="stock_id"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                @foreach($stocks as $st)
                                                    <option value="{{ $st->id }}"
                                                            @if(request()->input('stock_id') == $st->id) selected @endif>
                                                        {{ $st->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if($type == "stock")
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Bolme</label>
                                                <select name="section_id" id="section_id"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Bolme seç ---</option>
                                                    @foreach($sections as $se)
                                                        <option value="{{ $se->id }}"
                                                                @if(request()->input('section_id') == $se->id) selected @endif>
                                                            {{ $se->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Alt Bolme</label>
                                                <select name="subsection_id" id="subsection_id"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Alt Bolme seç ---</option>
                                                    @foreach($sub_sections as $s)
                                                        <option value="{{ $s->id }}"
                                                                @if(request()->input('subsection_id') == $s->id) selected @endif>
                                                            {{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Cuval</label>
                                                <select name="sack_id" id="sack_id"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Cuval seç ---</option>
                                                    @foreach($sacks as $sa)
                                                        <option value="{{ $sa->id }}"
                                                                @if(request()->input('sack_id') == $sa->id) selected @endif>
                                                            {{ $sa->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Məhsulun Adı</label>
                                            <input type="text" name="product_name"
                                                   value="{{ request()->input('product_name') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">İzləmə kodu</label>
                                            <input type="number" name="follow_code"
                                                   value="{{ request()->input('follow_code') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Passport</label>
                                            <input type="text" name="passport" placeholder="AZE № 15245262"
                                                   value="{{ request()->input('passport') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telefon: </label>
                                            <input type="text" class="form-control"
                                                   value="{{ request()->input('phone') }}"
                                                   name="phone" data-mask="(999) 99 999-99-99"
                                                   placeholder="(994) 99 999-99-99">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Müştəri Kodu</label>
                                            <input type="text" name="customer_code" placeholder="152453625"
                                                   value="{{ request()->input('customer_code') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sifariş Tarix:</label>
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                <input type="date" name="publish_date" class="form-control"
                                                       value="{{ request()->input('publish_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>Axtarış</label>
                                            <button type="submit" class="btn btn-default btn-block"><i
                                                        class="icon-search4"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Məhsulun adı</th>
                                <th>İzləmə kodu</th>
                                <th>Müştəri kodu</th>
                                <th>Müştəri</th>
                                <th>Passport</th>
                                <th>Kategoriya</th>
                                <th>Stock</th>
                                @if($type == 'stock')
                                    <th>Bolme</th>
                                    <th>Alt bolme</th>
                                @else
                                    <th>Cuval</th>
                                @endif
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->product_name}}</td>
                                    <td><a href="#">{{$result->follow_code}}</a></td>
                                    <td><a href="#">{{$result->customOrder->customer_code ?? ''}}</a></td>
                                    <td>{{($result->customOrder->first_name ?? '') .' '. ($result->customOrder->last_name ?? '')}}</td>
                                    <td>AZE {{($result->customOrder->passport ?? '')}}</td>

                                    <td>
                                        @if($result->category==1)
                                            <span class="badge badge-success">Müştəri özü aldığı sifariş</span>
                                        @else
                                            <span class="badge badge-danger">Bizim müştəriyə aldıgımız sifariş</span>
                                        @endif
                                    </td>
                                    <td>{{$result->sub_section && $result->sub_section->SectionName && $result->sub_section->SectionName->StockName ? $result->sub_section->SectionName->StockName->name : ''}}</td>
                                    @if($type == 'stock')
                                        <td>{{$result->sub_section && $result->sub_section->SectionName ? $result->sub_section->SectionName->name : ''}}</td>
                                        <td>{{$result->sub_section ? $result->sub_section->name : ''}}</td>
                                    @else
                                        <td>{{$result->sack ? $result->sack->name : ''}}</td>
                                    @endif

                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="{{route('orderInfo',[$result->id])}}" class="dropdown-item"><i
                                                            class="icon-eye icon-2x mr-1"></i> Bax</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @include('partials.pagination')
                    </form>
                </div>
                <!-- /basic datatable -->

            </div>

        </div>
    </div>
    <!-- /table -->

@endsection

@section("css")

    <style>
        #exchange {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style>

@endsection
@section("js")
@endsection
