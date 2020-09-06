@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <h3 class="card-title">Sms Şablonu</h3>
                        </div>
                    </div>
                    <form
                        action="{{ route('getModuleSearch',['module'=> 'smsTemplate','viewFile'=>'sms-template','path' => 'sms' ]) }}"
                        method="GET">
                        @csrf
                        <div class="container form-tabs p-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sms mətn</label>
                                        <input type="text" name="message" class="form-control" value="{{ request()->input('message') }}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Axtarış</label>
                                        <button type="submit" class="btn btn-default btn-block"><i class="icon-search4"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row p-2">
                        <div class="col-md-12 text-right">
                            <a class="add-button" href="{{route("getSmsTemplateEdit",['id' => 0])}}">
                                <button type="button" class="btn btn-primary">Əlavə Et</button>
                            </a>
                        </div>
                    </div>
                    <table class="table datatable-basic">
                        <thead class="text-center">
                        <tr>
                            <th>Sms mətn</th>
                            <th>Status</th>
                            <th>Əməliyyat</th>
                        </tr>
                        </thead>
                        <tbody id="customer_body" class="text-center">
                        @foreach($results as $result)
                            <tr>
                                <td>{{substr($result->message,0,50)}}... </td>
                                <td>
                                    @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'sms_templates'])
                                </td>
                                <td>
                                    <a href="{{route("getSmsTemplateEdit",$result->id)}}" class="dropdown-item"><i
                                            class="icon-pencil5 icon-2x m-auto"></i></a>

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

@endsection

