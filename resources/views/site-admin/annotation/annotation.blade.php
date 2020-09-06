@extends("main.site-admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Annotasiya</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="card-title" style="font-size: 20px;"><a href="{{route("getAnnotationEdit",0)}}"><button class="btn btn-primary">Əlavə Et</button></a></h5>
                        </div>
                    </div>
                      <form class="p-3"
                                  action="{{ route('getModuleSearch',['module'=> 'annotation','mainPath' => 'site-admin', 'path' => 'annotation','viewFile'=>'annotation' ]) }}"
                                  method="GET">
                                @csrf
                                  <div class="row">
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Başlıq</label>
                        <input type="text" name="title" value="{{ request()->input('title_az') }}"
                               class="form-control">

                   </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mətn</label>
                            <input type="text" name="content" value="{{ request()->input('content_az') }}"
                                   class="form-control">

                       </div>
                    </div>
                                  <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status"
                                                        class="form-control select-search sms-template-choose"
                                                        data-fouc>
                                                    <option value=""> --- Status seç ---</option>
                                                    <option value="1"
                                                            @if(request()->input('status') == '1') selected @endif>
                                                        Active
                                                    </option>
                                                    <option value="0"
                                                            @if(request()->input('status') == '0') selected @endif>
                                                        Passive
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label>Axtarış</label>
                            <button type="submit" class="btn btn-default btn-block">
                            <i class="icon-search4"></i></button>
                        </div>
                    </div>
                </div>
                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>Başlıq</th>
                            <th>Mətn</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="shop_body">
                        @foreach($results as $result)
                            <tr>
                                <td>{{$result->title_az}}</td>
                                <td>{!! substr($result->content_az,0,50) !!} </td>
                                @includeIf('partials.status', ['id' => $result->id,'status' => $result->status,'module' => 'annotations'])

                                <td>
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a href="{{route("getAnnotationEdit",$result->id)}}" class="dropdown-item"><i
                                                        class="icon-pencil5"></i>Redaktə Et</a>
                                                     <a href="javascript:void(0)" data-id="{{ $result->id }}"
                                                   data-module="annotations" class="dropdown-item deleteModal"><i
                                                        class="icon-list"></i>Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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

@endsection
@section("css")


@endsection
