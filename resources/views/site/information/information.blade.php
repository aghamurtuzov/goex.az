@extends("main.site")
@section("content")
    <section id="innovation">
        <div class="container">
            <div class="row">
                @foreach($informations as $information)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <img src="{{Storage::url($information->image)}}" class="card-img-top innovation_image">
                            <div class="card-body">
                                <h6 class="card-title">{{$information->title()}}</h6>
                                <p class="card-text">{!!substr($information->content(),0,100)!!}</p>
                                <div class="text-center">
                                    <a href="{{route('getSiteInformationSingle',[$information->id])}}">{{ translate('readmore') }}</a>
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
