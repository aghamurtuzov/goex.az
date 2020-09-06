@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Sifariş</h5>

                        </div>
                    </div>
                    @includeIf('partials.session-message')
                    <div class="container p-2">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Məhsulun Adı:</strong>
                                            {{$result->product_name ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            <strong>Status:</strong>
                                             @if($result->situation==1)
                                                <span class="badge badge-success">Yeni</span>
                                            @elseif($result->situation==2)
                                                <span class="badge badge-info">Yolda</span>
                                            @elseif($result->situation==3)
                                                <span class="badge badge-info">Xarici Anbarda</span>
                                            @elseif($result->situation==4)
                                                <span class="badge badge-info">Daxili Anbarda</span>
                                            @elseif($result->situation==5)
                                                <span class="badge badge-danger">Problemli</span>
                                            @elseif($result->situation==6)
                                                <span class="badge badge-warning">Geri qaytarılmış</span>
                                            @elseif($result->situation==7)
                                                <span class="badge badge-success">Bitmiş</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            <strong>Qəbul edən:</strong>
                                                <?php
											$name = $result->confirmationOrder->first_name ?? '';
											$surname = $result->confirmationOrder->last_name ?? '';
											$username = $name . ' ' . $surname;
											echo $username ?? '----';
											?>
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             <strong>Təsdiq edən:</strong>
                                             <?php
											$name = $result->acceptedOrder->first_name ?? '';
											$surname = $result->acceptedOrder->last_name ?? '';
											$username = $name . ' ' . $surname;
											echo $username ?? '----';
											?>
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Nəzarət edən:</strong>
                                             <?php
											$name = $result->controlsOrder->first_name ?? '';
											$surname = $result->controlsOrder->last_name ?? '';
											$username = $name . ' ' . $surname;
											echo $username ?? '----';
											?>
                                        </span>
                                    </div>

                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong>Kategoriya:</strong>
                                             @if($result->category==1)
                                                <span class="badge badge-success">Müştəri özü aldığı sifariş</span>
                                            @else
                                                <span class="badge badge-danger">Bizim müştəriyə aldıgımız sifariş</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Barkod:</strong>
                                            <span class="badge badge-warning">{{$result->barcode ?? '----'}}</span>
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong>Məhsulun tipi:</strong>
                                            {{$result->product_type ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                         <strong>Məhsulun Kompaniyası:</strong>
                                            {{$result->product_company ?? '----'}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            <strong>Miqdarı:</strong>
                                            {{$result->quantity .' ədəd' ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                           <strong> Ödəmə:</strong>
                                            @if($result->price_status)
                                                <span class="badge badge-success">Ödənilib</span>
                                            @else
                                                <span class="badge badge-danger">Ödənilməyib</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             <strong>Sifariş tarixi:</strong>
                                            {{$result->publish_date ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong> Valyuta:</strong>
                                            {{$result->exchange ?? '----'}}
                                        </span>
                                    </div>

                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>Müstəri:</strong>
                                            <?php
											$name = $result->customOrder->first_name ?? '';
											$surname = $result->customOrder->last_name ?? '';
											$username = $name . ' ' . $surname;
											echo $username ?? '----';
											?>

                                        </span>
                                    </div>

                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong> Məhsulun qiyməti:</strong>
                                            {{$result->product_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Çatdırılma qiyməti:</strong>
                                            {{$result->delivery_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Rəngi:</strong>
                                            {{$result->color ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Sifarişim yoxlansın:</strong>
                                            {{($result->check) ? 'Hə' : 'Yox'}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                         <strong>Eni:</strong>
                                            {{$result->width ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                           <strong>Uzunluğu:</strong>
                                            {{$result->length ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                          <strong>Çəkisi:</strong>
                                            {{$result->weight ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong>Dəyəri:</strong>
                                            {{$result->value ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>Qəbz:</strong>
                                            {{$result->receipt_date ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Toplam qiymət:</strong>
                                            {{$result->total_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>İzləmə kodu:</strong>
                                            <span class="badge badge-success">{{$result->follow_code ?? '----'}}</span>
                                        </span>
                                    </div>
                                    @if($result->category==2)
                                        <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>Link:</strong>
                                            <a href="{{$result->link ?? '#'}}" target="_blank">{{$result->link ?? '----'}}</a>
                                        </span>
                                        </div>
                                    @endif
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Şərh:</strong>
                                            {{$result->comment ?? '----'}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <hr>
                    <br>
                    {{--                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"--}}
                    {{--                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                    {{--                        <div class="modal-dialog" role="document">--}}
                    {{--                            <div class="modal-content">--}}
                    {{--                                <div class="modal-header">--}}
                    {{--                                    <h5 class="modal-title" id="exampleModalLabel">Şərh bildir</h5>--}}
                    {{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--                                        <span aria-hidden="true">&times;</span>--}}
                    {{--                                    </button>--}}
                    {{--                                </div>--}}
                    {{--                                <form action="{{route('postOrderComment',['id'=>$result->id])}}" method="post">--}}
                    {{--                                    @csrf--}}
                    {{--                                    <div class="modal-body">--}}
                    {{--                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"--}}
                    {{--                                              placeholder="Şərh yaz...">--}}
                    {{--                                        {!! $result->comment !!}--}}
                    {{--                                    </textarea>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-footer">--}}
                    {{--                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bağla</button>--}}
                    {{--                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>--}}
                    {{--                                    </div>--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Düzəliş et</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('postOrderEdit',['id'=>$result->id])}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
											<?php
											$name = $result->customOrder->first_name ?? '';
											$surname = $result->customOrder->last_name ?? '';
											$username = $name . ' ' . $surname;
											?>
                                            <label for="">Müştəri</label>
                                            <input type="text"
                                                   value="{{$username}}"
                                                   class="form-control" placeholder="Müştəri" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Müştəri kodu</label>
                                            <input type="text" name="customer_code"
                                                   value="{{$result->customOrder->customer_code ?? ''}}"
                                                   class="form-control"
                                                   placeholder="Müştəri kodu">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="situation" id="situation" class="form-control">
                                                <option value="1" @if($result->situation=='1') selected @endif>Yeni
                                                </option>
                                                <option value="2" @if($result->situation=='2') selected @endif>Yolda
                                                </option>
                                                <option value="3" @if($result->situation=='3') selected @endif>Xarici
                                                    Anbarda
                                                </option>
                                                <option value="4" @if($result->situation=='4') selected @endif>Daxili
                                                    anbarda
                                                </option>
                                                <option value="5" @if($result->situation=='5') selected @endif>
                                                    problemli
                                                </option>
                                                <option value="6" @if($result->situation=='6') selected @endif>Geri
                                                    qaytarılmış
                                                </option>
                                                <option value="7" @if($result->situation=='7') selected @endif>Bitmiş
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Açıqlama</label>
                                            <textarea name="comment" class="form-control" id="comment" rows="4"
                                                      placeholder="Şərh yaz">
                                                {{$result->comment ?? ''}}
                                            </textarea>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bağla</button>
                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--                        @if($result->category==2)--}}
                        @if($result->situation!='7')
                            <div class="col-4">
                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit">
                                    Düzəliş
                                    et
                                </button>
                            </div>
                            {{--                            <div class="col-4">--}}
                            {{--                                <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#exampleModal">--}}
                            {{--                                    Şərh yaz--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                        @endif
                        {{--                        @endif--}}

                        {{--                        <div class="col-4">--}}
                        {{--                            <a href="#">--}}
                        {{--                                <button class="btn btn-info btn-block">PDF</button>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </div>
                    <br>
                    <hr>
                    <div class="card-body">
                        <h4>Sifariş Tarixçəsi</h4>
                        <br>
                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>Məhsul adı</th>
                                <th>İstifadəçi</th>
                                <th>Nəzarət edən</th>
                                <th>Status</th>
                                <th>Açıqlama</th>
                                <th>Vaxtı</th>
                                <th>Ətraflı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($historys as $history)
								<?php
								$name = $history->orderName->customOrder->first_name ?? '';
								$surname = $history->orderName->customOrder->last_name ?? '';
								$username = $name . ' ' . $surname;
								?>
                                <tr>
                                    <td>{{$history->orderName->product_name}}</td>
                                    <td>{{$username}}</td>
									<?php
									$name = $history->userOrder->first_name ?? '';
									$surname = $history->userOrder->last_name ?? '';
									$username = $name . ' ' . $surname;
									?>
                                    <td>{{$username}}</td>
                                    <td>
                                        @if($history->status==1)
                                            <span class="badge badge-success">Yeni</span>
                                        @elseif($history->status==2)
                                            <span class="badge badge-info">Yolda</span>
                                        @elseif($history->status==3)
                                            <span class="badge badge-info">Xarici Anbarda</span>
                                        @elseif($history->status==4)
                                            <span class="badge badge-info">Daxili Anbarda</span>
                                        @elseif($history->status==5)
                                            <span class="badge badge-danger">Problemli</span>
                                        @elseif($history->status==6)
                                            <span class="badge badge-warning">Geri qaytarılmış</span>
                                        @elseif($history->status==7)
                                            <span class="badge badge-success">Bitmiş</span>
                                        @endif
                                    </td>
                                    <td>{!! $history->content ? substr($history->content,0,40) .'...' : 'Şərh yoxdur'; !!} </td>
                                    <td>{{$history->date}}</td>
                                    <td><a href="javascript:void(0)" class="dropdown-item" data-toggle="modal"
                                           data-target="#content-{{$history->id}}"><i class="icon-eye icon-2x mr-1"></i>
                                            Bax</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="content-{{$history->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Şərh</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {!! $history->content ?? 'Şərh yoxdur' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section("js")
    <script>
        url_status = '{{ route("postModuleStatus") }}';
    </script>
    <script>
        $(document).ready(function () {
            $("#comment").val($.trim($('#comment').val()));
            $("#content").val($.trim($('#content').val()));
        });

    </script>
@endsection

@section("css")
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
@endsection
