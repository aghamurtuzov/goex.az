@extends("main.site")
@section("content")
    <section id="forbidden">
        <div class="container">
            <h2>{{ translate('forbidden_title') }}</h2>
            <div class="row">
                @foreach($forbiddens as $forbidden)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="forbidden_block">
                            <img src="{{Storage::url($forbidden->image)}}" class="img-fluid">
                            <div class="forbidden_text text-center pt-1">
                                <p>{{$forbidden->name()}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

@section("css")

@endsection

@section("js")
@endsection
