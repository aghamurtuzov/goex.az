@extends("main.site")
@section("content")
    <section id="shopping">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4">
                    <div class="nav flex-column shop_active nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        @foreach($categorys as $category)
                            <a class="nav-link category" id="{{$category->id}}" data-toggle="pill"
                               href="#v-pills-home">{{$category->name()}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9 col-sm-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active">
                            <div class="row" id="tabContent">
                                @foreach($shops as $shop)
                                    <div class="col-md-4 col-lg-3 col-sm-6">
                                        <div class="shopping_image">
                                            <img src="{{Storage::url($shop->image)}}" class="img-fluid">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section("css")
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let id;
            $(".category").on("click", function () {
                let id = $(this).attr("id");
                        {{--let storage = '{{Storage::url('shops/')}}';--}}
                        {{--let storage = '{{url('storage/shops')}}/';--}}
                let storage = '{{asset('storage/shops')}}/';
                $.ajax({
                    url: '{{route("postSiteShop")}}',
                    data: {id: id},
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        let rows = "";
                        $.each(response.shops, function (i, item) {
                            rows += '<div class="col-md-4 col-lg-3 col-sm-6">\n' +
                                '                                    <div class="shopping_image">\n' +
                                '                                        <img src="' + storage + item.image + '" class="img-fluid">\n' +
                                '                                    </div>\n' +
                                '                                </div>';
                        });
                        $("#tabContent").html(rows);
                    }

                });
            })
        })


    </script>



@endsection
