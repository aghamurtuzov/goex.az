@extends("main.site")
@section("content")
    <section>
        <div class="overlay">
            <div class="container">
                <div class="about_cover pt-3">
                    <img src="{{Storage::url($information->image)}}" alt="">
                </div>
            </div>
        </div>
        <div class="radius_cover"></div>
    </section>

    <!-- about start -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="information-head pb-4">
                        <h2 class="text-center">{{$information->title()}}</h2>
                    </div>
                    <div class="about_text">
                        <p>
                            {{$information->content()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section("css")

@endsection

@section("js")



@endsection
