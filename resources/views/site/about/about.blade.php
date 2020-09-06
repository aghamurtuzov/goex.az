@extends("main.site")
@section("content")
    <section id="about_cover">
        <div class="overlay">
            <div class="container">
                <div class="about_cover_text">
                    <p>{{ translate('news') }}</p>
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

                    <div class="about_text">
                        <p>
                            {!!$abouts->content()!!}
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
