@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Balans Tarixcesi</h5>
                        </div>
                    </div>
                    <form
                            action="{{ route('getModuleSearch',['module'=> 'balanceHistory','viewFile'=>'balance-histories','path' => 'balances']) }}"
                            method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Musteri</label>
                                        <select name="customer_id" id="customer_id"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Bölmə seç ---</option>
                                            @foreach($customers as $customer)
                                                <option @if(request()->input('customer_id') == $customer->id) selected
                                                        @endif value="{{ $customer->id }}">{{ $customer->first_name ." " . $customer->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>User</label>
                                        <select name="user_id" id="user_id"
                                                class="form-control select-search sms-template-choose"
                                                data-fouc>
                                            <option value=""> --- Bölmə seç ---</option>
                                            @foreach($users as $user)
                                                <option @if(request()->input('user_id') == $user->id) selected
                                                        @endif value="{{ $user->id }}">{{ $user->first_name ." " . $user->last_name  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <input type="text" name="content" value="{{ request()->input('content') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Qiymet</label>
                                        <input type="number" name="price" value="{{ request()->input('price') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Axtarış</label>
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                    class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table datatable-basic text-center">
                            <thead>
                            <tr>
                                <th>Balans</th>
                                <th>Musteri</th>
                                <th>Metn</th>
                                <th>Qiymet</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Tarix</th>
                            </tr>
                            </thead>
                            <tbody class="text-center" id="customer_body">
                            @foreach($results as $result)
                                <tr>
                                    <td class="text-center">{{ $result->balance ?  $result->balance->name_az : ''}}</td>
                                    <td class="text-center">{{ $result->customer ? $result->customer->first_name .' '. $result->customer->last_name : ''}}</td>
                                    <td class="text-center">{{$result->content}}</td>
                                    <td class="text-center">{{$result->price}}</td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'balance-histories'])
                                    <td class="text-center">{{ $result->user ?  $result->user->first_name .' '. $result->user->last_name : ''}}</td>
                                    <td class="text-center">{{$result->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('partials.pagination')
                    </form>

                    <!-- /basic datatable -->

                </div>

            </div>
        </div>


    </div>
@endsection

@section("js")
    <script>
        url_status = '{{ route("postModuleStatus") }}';
    </script>
    <script src="{{asset("/admin/assets/js/permission.js")}}"></script>





@endsection

@section("css")

@endsection
