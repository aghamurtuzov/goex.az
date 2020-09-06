@extends("main.site")
@section("content")
    <section id="services">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-12">
                        <div class="services_block">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-2">
                                        <div class="card_head text-center">
                                            <div class="services_img">
                                                <img src="{{Storage::url($service->image)}}">
                                            </div>
                                            <h5>{{$service->title()}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {!!$service->content()!!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
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
