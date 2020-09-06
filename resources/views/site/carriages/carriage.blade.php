@extends("main.site")
@section("content")
    <section id="carriage">
        <div class="container">
            <h2>{{ translate('condition_title') }}:</h2>
            <div class="row">
                <div class="col">
                    <ol>
                        @foreach($conditions as $condition)
                            <li>{!!$condition->content()!!}</li>
                        @endforeach
                    </ol>

                </div>
            </div>
        </div>
    </section>
@endsection

@section("css")

@endsection

@section("js")

@endsection
