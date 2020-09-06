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
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                            <strong>Qəbul edən:</strong>
                                            {{$result->confirmation ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             <strong>Təsdiq edən:</strong>
                                            {{$result->accepted ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                            <strong>Nəzarət edən:</strong>
                                            {{$result->controls ?? '----'}}
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
                                            {{$result->barcode ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                           <strong>Məhsulun tipi:</strong>
                                            {{$result->product_type ?? '----'}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                         <strong>Məhsulun Kompaniyası:</strong>
                                            {{$result->product_company ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            <strong>Miqdarı:</strong>
                                            {{$result->quantity ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-pink-400">
                                        <span class="mr-3">
                                           <strong> Ödəmə:</strong>
                                            {{$result->price_status ?? '----'}}
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
                                            <strong>Şərh:</strong>
                                            {{$result->comment ?? '----'}}
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
                                          <strong>Müstəri</strong>
                                            {{$result->customer_id ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>İzləmə kodu:</strong>
                                            <span class="badge badge-success">{{$result->follow_code ?? '----'}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <hr>
                    <br>
{{--                    <div class="row">--}}
{{--                        <div class="col-6">--}}
{{--                            <a href="">--}}
{{--                                <button class="btn btn-primary btn-block">Düzəliş et</button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-6">--}}
{{--                            <a href="">--}}
{{--                                <button class="btn btn-danger btn-block">Sil</button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <hr>--}}
{{--                    <br>--}}

                </div>
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

@endsection
