@extends("main.site")
@section("content")
    <section id="faq">
        <div class="container">
            <div class="col">
                @foreach($faqs as $faq)
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse"
                                 data-target="#collapseOne{{$faq->id}}">
                                <div class="row">
                                    <div class="col-sm-6 col-8">
                                        <div class="faq_head">
                                            <h2>{{$faq->title()}}</h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-4 faq_block_click">
                                        <div class="faq_click">
                                            <button class="btn btn-link" type="button">
                                                <i class="fa fa-plus plus"></i>
                                                <i class="fa fa-times closed"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="collapseOne{{$faq->id}}" class="collapse">
                                <div class="card-body">
                                    {!! $faq->content()!!}
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
