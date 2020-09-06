@extends("main.admin")
@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <!-- Traffic sources -->
                <div class="card" style="margin-top: 20px;">

                    <!-- /traffic sources -->

                    <div class="content">
                        <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'document-customs','path' => 'accounting']) }}"
                              method="GET">
                            <div class="container card-body">
                                @csrf
                                <div class="container form-tabs p-2">
                                    <div class="row">
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
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <a href="{{action('AccountingController@export',['results' => $results])}}">Export</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="printarea" class="fixed_header excel table datatable-basic">
                                        <thead>
                                        <tr>
                                            <th>TR_NUMBER</th>
                                            <th>DIRECTION</th>
                                            <th>QUANTITY_OF_GOODS</th>
                                            <th>WEIGHT_GOODS</th>
                                            <th>INVOYS_PRICE</th>
                                            <th>CURRENCY_TYPE</th>
                                            <th>NAME_OF_GOODS</th>
                                            <th>IDXAL_NAME</th>
                                            <th>IDXAL_ADRESS</th>
                                            <th>IXRAC_NAME</th>
                                            <th>IXRAC_ADRESS</th>
                                            <th>GOODS_TRAFFIC_FR</th>
                                            <th>GOODS_TRAFFIC_TO</th>
                                            <th>QAIME</th>
                                            <th>TRACKING_NO</th>
                                            <th>FIN</th>
                                            <th>PHONE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $result)
                                            @if($result->sack && ( $result->sack->position == 1 || $result->sack->position == 2) )
                                                <tr>
                                                    <td>{{$result->tracking_code}}</td>
                                                    <td>1</td>
                                                    <td>{{ $result->quantity }}</td>
                                                    <td>{{$result->weight}}</td>
                                                    <td>{{$result->product_price}}</td>
                                                    <td>{{$result->balance ? $result->balance->name_az : ''}}</td>
                                                    <td>{{$result->product_name}}</td>
                                                    <td>{{$result->customOrder ? $result->customOrder->first_name . ' ' . $result->customOrder->last_name : ''}}</td>
                                                    <td>{{$result->customOrder ? $result->customOrder->address : ''}}</td>
                                                    <td>{{$result->product_company}}</td>
                                                    <td>{{$result->product_company_address}}</td>
                                                    <td>792</td>
                                                    <td>31</td>
                                                    <td>{{$result->tracking_code}}</td>
                                                    <td>{{$result->tracking_code}}</td>
                                                    <td>{{$result->customOrder ? $result->customOrder->passport_fin : ''}}</td>
                                                    <td>{{$result->customOrder ? $result->customOrder->phone : ''}}</td>

                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>

                                    @include('partials.pagination')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section("css")

    <style>

        .fixed_header {
            width: 400px;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .fixed_header tbody {
            overflow: auto;
            height: 100px;
        }

        .fixed_header thead {
            color: #fff;
            background: #5d5df5;
        }

        .fixed_header th, .fixed_header td {
            padding: 5px;
            text-align: left;
            width: 200px;
            font-weight: bold;
        }

        .fixed_header tbody tr:nth-child(odd) {
            background-color: #dcdcff;
        }

    </style>

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
