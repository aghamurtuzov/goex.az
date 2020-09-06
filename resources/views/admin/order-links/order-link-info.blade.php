@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Sifariş link</h5>

                        </div>
                    </div>
                    @includeIf('partials.session-message')
                    <div class="container p-2">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="list-feed">
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Link:</strong>
                                            <a href="{{ $result->link??'' }}">{{$result->link ?? '----'}}</a>
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Məhsulun Adı:</strong>
                                            {{$result->product_name ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Məhsulun Olcusu:</strong>
                                            {{$result->product_size ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Məhsulun Qiymeti:</strong>
                                            {{$result->product_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Turkiy daxili kargo Qiymeti:</strong>
                                            {{$result->kargo_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-warning-400">
                                        <span class="mr-3">
                                            <strong>Total Qiymeti:</strong>
                                            {{$result->total_price ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-info-400">
                                        <span class="mr-3">
                                            <strong>Status:</strong>
                                                <span class="badge badge-success">{{ getOrderLinkHistory($result->situation) }}</span>
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
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                             <strong>Sifariş tarixi:</strong>
                                            {{$result->date ?? '----'}}
                                        </span>
                                    </div>
                                    <div class="list-feed-item d-flex flex-nowrap border-teal-400">
                                        <span class="mr-3">
                                          <strong>Müstəri:</strong>
                                            <?php
											$name = $result->customName->first_name ?? '';
											$surname = $result->customName->last_name ?? '';
											$username = $name . ' ' . $surname;
											echo $username ?? '----';
											?>
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
                        </div>

                    </div>
                    <br>
                    <hr>
                    <br>
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
                                <form action="{{route('postOrderLinkEdit',['id'=>$result->id])}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="situation" id="situation" class="form-control">
                                                @foreach(config('settings.orderLinks') as $key => $s)
                                                    @if($key)
                                                        <option value="{{ $key }}"
                                                                @if($result->situation==$key) selected @endif> {{ $s }}
                                                    @endif
                                                @endforeach
                                            </select>
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
                        <div class="col-4">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit">
                                Düzəliş et
                            </button>
                        </div>
                    </div>
                    <br>
                    <hr>
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
