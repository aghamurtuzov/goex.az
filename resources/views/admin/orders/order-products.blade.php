@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Mehsullar</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'orders','viewFile'=>'order-products','path' => 'orders']) }}"
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
                                                <option value="0">Daxili anbar</option>
                                                <option value="1">Xarici anbar</option>
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
                                            <label for="">Link</label>
                                            <input type="text" name="link" placeholder=""
                                                   value="{{ request()->input('link') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Barkod</label>
                                            <input type="text" name="barcode" placeholder=""
                                                   value="{{ request()->input('barcode') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Mehsul sirketi</label>
                                            <input type="text" name="product_company" placeholder=""
                                                   value="{{ request()->input('product_company') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Mehsul qiymeti</label>
                                            <input type="number" name="product_price" placeholder=""
                                                   value="{{ request()->input('product_price') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Catdirilma qiymeti</label>
                                            <input type="number" name="delivery_price" placeholder=""
                                                   value="{{ request()->input('delivery_price') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">En</label>
                                            <input type="number" name="width" placeholder=""
                                                   value="{{ request()->input('width') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Uzunluq</label>
                                            <input type="number" name="length" placeholder=""
                                                   value="{{ request()->input('length') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Hundurluk</label>
                                            <input type="number" name="depth" placeholder=""
                                                   value="{{ request()->input('depth') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ceki</label>
                                            <input type="number" name="weight" placeholder=""
                                                   value="{{ request()->input('weight') }}"
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
                                            <button type="button" id="btn-print"
                                                    class="btn-print btn-default btn-block">Çap<i
                                                        class="icon-printer"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="printarea" class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Məhsulun adı</th>
                                <th>İzləmə kodu</th>
                                <th>Müştəri kodu</th>
                                <th>Müştəri</th>
                                <th>Passport</th>
                                <th class="no-print">Kategoriya</th>
                                <th class="no-print">Status</th>
                                <th class="no-print text-center">Actions</th>
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
                                    <td class="no-print text-center">
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
    <script>

        $(function () {
            $("#btn-print").on('click', function () {

                $("#printarea").print({

// Use Global styles
                    globalStyles: false,

// Add link with attrbute media=print
                    mediaPrint: false,

//Custom stylesheet
                    stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",

//Print in a hidden iframe
                    iframe: false,

// Don't print this
                    noPrintSelector: ".no-print",

// Add this on top
                    append: "Toplam mehsul :  {{ count($results) }}",

// Add this at bottom
                    prepend: "<br/>jQueryScript.net",

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
