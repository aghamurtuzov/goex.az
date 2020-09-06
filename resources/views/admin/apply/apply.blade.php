@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Muracietler</h5>
                        <div class="header-elements">
                            <div class="list-icons">

                            </div>
                        </div>
                    </div>
                    <form action="{{ route('getModuleSearch',['module'=> 'applies','viewFile'=>'apply','path' => 'apply']) }}"
                          method="GET">
                        <div class="container card-body">

                            @csrf
                            <div class="container form-tabs p-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Kateqoriya</label>
                                            <select name="category_id" id="status"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                <option value=""> --- Kateqoriya seç ---</option>
                                                @foreach(config('settings.categories') as $key => $category)
                                                    <option value="{{ $key }}"
                                                            @if($key == request()->input('category_id')) selected @endif>
                                                        {{ $category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Olke</label>
                                            <select name="country_id" id="country_id"
                                                    class="form-control select-search sms-template-choose"
                                                    data-fouc>
                                                <option value=""> --- Olke seç ---</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                            @if($country->id == request()->input('country_id')) selected @endif>
                                                        {{ $country->name() }}
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
                                <th>Kateqoriya</th>
                                <th>Olke</th>
                                <th>Message</th>
                                <th>Tarix</th>
                                <th>Sened</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{($result->catgeory_id ?? '')}}</td>
                                    <td>{{$result->countryName ? $result->countryName->name() : ''}}</td>
                                    <td>{{$result->message}}</td>
                                    <td><a href="{{ asset($result->attachment) }}">Sened</a></td>
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
