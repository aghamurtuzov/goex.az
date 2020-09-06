@extends("main.site-admin")
@section("content")


    <div class="content pt-4 pb-4">
        <div class="card shop">
            @includeIf('partials.session-message')
            <div class="card-body">
                <form id="form" action="{{route("postTranslationGroupEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Ad</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $result->name ?? old('name') }}" name="name"
                                   placeholder="Ad" required>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section("js")

@endsection


@section("css")

@endsection
