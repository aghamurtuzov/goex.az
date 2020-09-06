@extends("main.site-admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="content">
                <!-- Basic datatable -->
                <div class="card">
                    <div class="row p-4">
                        <div class="col-md-6">
                            <h5 class="card-title" style="font-size: 20px;">Tercumeler</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="card-title" style="font-size: 20px;"><a href="{{route("getTranslationExport")}}">
                                    <button class="btn btn-primary">Export</button>
                                </a>
                            </h5>
                            <h5 class="card-title" style="font-size: 20px;"><a href="{{route("getTranslationEdit",0)}}">
                                    <button class="btn btn-primary">Əlavə Et</button>
                                </a></h5>
                        </div>

                    </div>
                    @if(Session::has('export-message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('export-message') }}</p>
                    @endif
                    <form class="p-3"
                          action="{{ route('getModuleSearch',['module'=> 'translation','mainPath' => 'site-admin', 'path' => 'translations','viewFile'=>'translation' ]) }}"
                          method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Key</label>
                                    <input type="text" name="key" value="{{ request()->input('key') }}"
                                           class="form-control">

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
                                <th>Key</th>
                                <th>Value</th>
                                <th>Tarix</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody class="text-center" id="shop_body">
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->key }}</td>
                                    <td>{{ $result->value }}</td>
                                    <td>{{ $result->created_at }}</td>
                                    <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="{{route("getTranslationEdit",$result->id)}}"
                                                       class="dropdown-item"><i
                                                                class="icon-pencil5"></i>Redaktə Et</a>
                                                    <a href="javascript:void(0)" data-id="{{ $result->id }}"
                                                       data-module="translations" class="dropdown-item deleteModal"><i
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
