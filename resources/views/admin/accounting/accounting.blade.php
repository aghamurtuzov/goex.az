@extends("main.admin")
@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
            {{--                <a class="local-stock-sections" href="{{route("accounting")}}">--}}
            {{--                    <button class="btn btn-primary">Sifarisler</button>--}}
            {{--                </a>--}}
            {{--                <a class="local-stock-sections" href="{{route("accounting",['type' => 1])}}">--}}
            {{--                    <button class="btn btn-primary">Daxili anbar</button>--}}
            {{--                </a>--}}
            {{--                <a class="local-stock-sections" href="{{route("accounting",['type' => 2])}}">--}}
            {{--                    <button class="btn btn-primary">Xarici anbar</button>--}}
            {{--                </a>--}}
            <!-- Traffic sources -->
                <div class="card" style="margin-top: 20px;">
                    <div class="card-header header-elements-inline">

                    </div>

                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <a href="#"
                                       class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-plus3"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">Gunluk</div>
                                        <span class="text-muted"><span
                                                    class="badge badge-mark border-success mr-2"></span>{{ $dataAccounting['day']??'' }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-2">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <a href="#"
                                       class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-watch2"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">Heftelik</div>
                                        <span class="text-muted"><span
                                                    class="badge badge-mark border-success mr-2"></span>{{ $dataAccounting['day']??'' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <a href="#"
                                       class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-people"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">Ayliq</div>
                                        <span class="text-muted"><span
                                                    class="badge badge-mark border-success mr-2"></span>{{ $dataAccounting['month']??'' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <a href="#"
                                       class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-people"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">İllik</div>
                                        <span class="text-muted"><span
                                                    class="badge badge-mark border-success mr-2"></span>{{ $dataAccounting['year']??'' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <a href="#"
                                       class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-people"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">Toplam</div>
                                        <span class="text-muted"><span
                                                    class="badge badge-mark border-success mr-2"></span>{{ $dataAccounting['total']??'' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /traffic sources -->

                    <div class="content">
                        <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'accounting','path' => 'accounting']) }}"
                              method="GET">
                            <div class="container card-body">
                                @csrf
                                <div class="container form-tabs p-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Anbar</label>
                                                <select name="stock_type" id="stock_type"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Anbar seç ---</option>
                                                    <option value="0"
                                                            @if(request()->input('stock_type') == 0) selected @endif>
                                                        Daxili anbar
                                                    </option>
                                                    <option value="1"
                                                            @if(request()->input('stock_type') == 1) selected @endif>
                                                        Xarici anbar
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
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
                                                <label>Status</label>
                                                <select name="situation" id="situation"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Status seç ---</option>
                                                    <option value="1"
                                                            @if(request()->input('situation') == '1') selected @endif>
                                                        Yeni
                                                    </option>
                                                    <option value="2"
                                                            @if(request()->input('situation') == '2') selected @endif>
                                                        Yolda
                                                    </option>
                                                    <option value="3"
                                                            @if(request()->input('situation') == '3') selected @endif>
                                                        Daxili Anbar
                                                    </option>
                                                    <option value="4"
                                                            @if(request()->input('situation') == '4') selected @endif>
                                                        Xarici Anbar
                                                    </option>
                                                    <option value="5"
                                                            @if(request()->input('situation') == '5') selected @endif>
                                                        Problemli
                                                    </option>
                                                    <option value="6"
                                                            @if(request()->input('situation') == '6') selected @endif>
                                                        Geri qaytarılmış
                                                    </option>
                                                    <option value="7"
                                                            @if(request()->input('situation') == '7') selected @endif>
                                                        Bitmiş
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Gun</label>
                                                <select name="day" id="day"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Gun sec ---</option>
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}"
                                                                @if(request()->input('day') == $i) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Ay</label>
                                                <select name="month" id="month"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Ay sec ---</option>
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}"
                                                                @if(request()->input('month') == $i) selected @endif>
                                                            {{ getMonth($i) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">İl</label>
                                                <select name="year" id="year"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- İl sec ---</option>
                                                    @for($i=2019;$i<=2030;$i++)
                                                        <option value="{{ $i }}"
                                                                @if(request()->input('year') == $i) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Baslanma Tarix:</label>
                                                <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                    <input type="date" name="publish_date_begin" class="form-control"
                                                           value="{{ request()->input('publish_date_begin') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bitme Tarix:</label>
                                                <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                    <input type="date" name="publish_date_end" class="form-control"
                                                           value="{{ request()->input('publish_date_end') }}">
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

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" id="btn-excel"
                                                    class="btn-print btn-success btn-block">Excel<i
                                                        class="icon-file-excel"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" id="btn-txt"
                                                    class="btn-print btn-primary btn-block">Txt<i
                                                        class="icon-file-text"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" id="btn-json"
                                                    class="btn-print btn-link btn-block">Json<i
                                                        class="icon-file-text3"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" id="btn-pdf"
                                                    class="btn-print btn-danger btn-block">Pdf<i
                                                        class="icon-file-pdf"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" id="btn-print"
                                                    class="btn-print btn-default btn-block">Çap<i
                                                        class="icon-printer"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <a href="{{ route('getAccountingDocumentCustoms') }}"
                                                    class="btn btn-block">Gomruk ucun sened</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="printarea" class="excel table datatable-basic">
                                <thead>
                                <tr>
                                    <th>Məhsulun adı</th>
                                    <th>İzləmə kodu</th>
                                    <th>Müştəri kodu</th>
                                    <th>Product price</th>
                                    <th>Delivery price</th>
                                    <th>Endirim</th>
                                    <th>Toplam</th>
                                    @if(request()->input('section_id') ||  request()->input('subsection_id'))
                                        <th>Bolme</th>
                                        <th>Alt bolme</th>
                                    @endif
                                    @if(request()->input('sack_id'))
                                        <th>Cuval</th>
                                    @endif
                                    <th class="no-print">Kategoriya</th>
                                    <th class="no-print">Status</th>
                                    <th>Tarix</th>
                                    <th class="no-print text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->product_name}}</td>
                                        <td><a href="#">{{$result->follow_code}}</a></td>
                                        <td><a href="#">{{$result->customOrder->customer_code ?? ''}}</a></td>
                                        <td>{{$result->product_price}}</td>
                                        <td>{{$result->delivery_price}}</td>
                                        <td>{{$result->discount}}</td>
                                        <td>{{$result->total_price}}</td>
                                        @if(request()->input('section_id') ||  request()->input('subsection_id'))
                                            <td>{{$result->sub_section && $result->sub_section->SectionName ? $result->sub_section->SectionName->name : ''}}</td>
                                            <td>{{$result->sub_section ? $result->sub_section->name : ''}}</td>
                                        @endif
                                        @if(request()->input('sack_id'))
                                            <td>{{$result->sack ? $result->sack->name : ''}}</td>
                                        @endif
                                        <td class="no-print">
                                            @if($result->category==1)
                                                <span class="badge badge-success">Müştəri özü aldığı sifariş</span>
                                            @else
                                                <span class="badge badge-danger">Bizim müştəriyə aldıgımız sifariş</span>
                                            @endif
                                        </td>
                                        <td class="no-print">
                                            @if($result->situation==1)
                                                <span class="badge badge-success">Yeni</span>
                                            @elseif($result->situation==2)
                                                <span class="badge badge-info">Yolda</span>
                                            @elseif($result->situation==3)
                                                <span class="badge badge-info">Daxili Anbarda</span>
                                            @elseif($result->situation==4)
                                                <span class="badge badge-info">Xarici Anbarda</span>
                                            @elseif($result->situation==5)
                                                <span class="badge badge-danger">Problemli</span>
                                            @elseif($result->situation==6)
                                                <span class="badge badge-warning">Geri qaytarılmış</span>
                                            @elseif($result->situation==7)
                                                <span class="badge badge-success">Bitmiş</span>
                                            @endif
                                        </td>
                                        <td>{{$result->publish_date}}</td>
                                        <td class="no-print text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="{{route('orderInfo',[$result->id])}}"
                                                       class="dropdown-item"><i
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
                </div>
            </div>
        </div>
    </div>


@endsection
@section("css")
@endsection

@section("js")
    <script>
        $("#btn-excel").on('click', function () {
            $("#printarea").tableHTMLExport({
                // csv, txt, json, pdf
                type: 'csv',
                // file name
                filename: 'muhasibat-excel.xls',
            });
        });
        $("#btn-pdf").on('click', function () {
            html2canvas($('#printarea')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 1000
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("muhasibat-pdf.pdf");
                }
            });
        });

        $("#btn-json").on('click', function () {
            $("#printarea").tableHTMLExport({
                // csv, txt, json, pdf
                type: 'json',
                // file name
                filename: 'muhasibat-json.json',
            });
        });
        $("#btn-txt").on('click', function () {
            $("#printarea").tableHTMLExport({
                // csv, txt, json, pdf
                type: 'txt',
                // file name
                filename: 'muhasibat-txt.txt',
            });
        });
        $(function () {
            $("#btn-print").on('click', function () {

                $("#printarea").print({

// Use Global styles
                    globalStyles: true,

// Add link with attrbute media=print
                    mediaPrint: true,

//Custom stylesheet
                    stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",

//Print in a hidden iframe
                    iframe: false,

// Don't print this
                    noPrintSelector: ".no-print",

// Manually add form values
                    manuallyCopyFormValues: true,

// resolves after print and restructure the code for better maintainability
                    deferred: $.Deferred(),

// timeout
                    timeout: 250,

// Custom title
                    title: null,

// Custom document type
                    doctype: '<!doctype html>'

                });
            });
        });

    </script>
@endsection
