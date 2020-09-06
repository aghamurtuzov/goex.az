@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Beyannameler</h5>
                        <div class="header-elements">
                            <div class="list-icons">

                            </div>
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'statements','viewFile'=>'statements','path' => 'statement']) }}"
                          method="GET">
                        <div class="container card-body">

                            @csrf
                            <div class="container form-tabs p-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">İzləmə kodu</label>
                                            <input type="text" name="tracking_code"
                                                   value="{{ request()->input('tracking_code') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Magaza/Sayt Adı</label>
                                            <input type="text" name="company"
                                                   value="{{ request()->input('company') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Qiymet</label>
                                            <input type="number" name="price"
                                                   value="{{ request()->input('price') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Miqdar</label>
                                            <input type="number" name="quantity"
                                                   value="{{ request()->input('quantity') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Mehsul</label>
                                            <select name="product" id="status"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                <option value=""> --- Mehsul seç ---</option>
                                                @foreach(config('settings.products') as $key => $product)
                                                    <option value="{{ $key }}"
                                                            @if($key == request()->input('product')) selected @endif>
                                                        {{ $product }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tarix:</label>
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                                <input type="date" name="date" class="form-control"
                                                       value="{{ request()->input('date') }}">
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
                                <th>Musteri</th>
                                <th>Traking code</th>
                                <th>Magaza/Sayt adi</th>
                                <th>Mehsul</th>
                                <th>Qiymet</th>
                                <th>Miqdar</th>
                                <th>Sened</th>
                                <th>Qeyd</th>
                                <th>Valyuta</th>
                                <th>Tarix</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{($result->customOrder->first_name ?? '') .' '. ($result->customOrder->last_name ?? '')}}</td>
                                    <td>{{$result->tracking_code}}</td>
                                    <td>{{$result->company}}</td>
                                    <td>{{$result->product}}</td>
                                    <td>{{$result->price}}</td>
                                    <td>{{$result->quantity}}</td>
                                    <td><a href="{{ asset($result->attachment) }}">Sened</a></td>
                                    <td>{{$result->text}}</td>
                                    <td>{{($result->balance ? $result->balance->name_az : '')}}</td>
                                    <td>{{$result->date}}</td>
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

@endsection
@section("js")
@endsection
