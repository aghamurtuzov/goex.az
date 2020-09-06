@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h3 class="card-title">Sms</h3>
                        </div>

                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'sms','viewFile'=>'sms','path' => 'sms']) }}"
                        method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sms mətn</label>
                                        <input type="text" name="message" class="form-control"
                                               value="{{ request()->input('message') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefon: </label>
                                        <input type="text" class="form-control" value="{{ request()->input('phone') }}"
                                               name="phone" data-mask="(999) 99 999-99-99"
                                               placeholder="(994) 99 999-99-99">
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
                                                Aktiv
                                            </option>
                                            <option value="0" @if(request()->input('status') == '0') selected @endif>
                                                Passiv
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Başlanğıc Tarix:</label>
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
                                        <label>Bitiş Tarix:</label>
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
                                        <label>Axtarış</label>
                                        <button type="submit" class="btn btn-default btn-block"><i
                                                class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-12 text-right">
                                <a class="add-button" href="{{route("getSmsEdit",['id' => 0])}}">
                                    <button type="button" class="btn btn-primary">Əlavə Et</button>
                                </a>
                            </div>
                        </div>
                        <table class="table datatable-basic">
                            <thead class="text-center">
                            <tr>
                                <th>Sms mətn</th>
                                <th>Qəbul edən şəxs</th>
                                <th>Status</th>
                                <th>Tarix</th>
                            </tr>
                            </thead>
                            <tbody id="customer_body" class="text-center">
                            @foreach($results as $result)
                                <tr>
                                    <td>{{substr($result->message,0,50)}}...</td>
                                    <td>@if($result->number) {{ $result->userName->first_name . ' ' . $result->userName->last_name }}
                                        ({{ $result->number }}) @else {{$result->typeName()}}@endif</td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'sms'])
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



@endsection

