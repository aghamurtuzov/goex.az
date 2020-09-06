@extends("main.site")
@section("content")
    <section id="world_calculate">
        <div class="container">
            <nav>
                <div class="nav nav-tabs world_active" id="nav-tab" role="tablist">
                    @foreach($countries as $country)
                    <a class="nav-item country @if($country->id == 1) active @endif" id="{{$country->id}}" data-toggle="tab" href="javascript:void(0)">
                        <div class="world_block" data-id="flag{{$country->id}}">
                            <img src="{{$country->image}}" class="country-flag">
                            <h6>{{$country->name()}}</h6>
                        </div>
                    </a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-turkey">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="world_calculate_top" >
{{--                                <div class="flag">--}}
{{--                                    <img src="" class="img-fluid">--}}
{{--                                    <h2>Turkey</h2>--}}
{{--                                </div>--}}
                                <table>
                                    <thead>
                                    <tr>
                                        <th>{{ translate('size') }}</th>
                                        <th>{{ translate('maye') }}</th>
                                        <th>{{ translate('discounted') }}</th>
                                        <th>{{ translate('available') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tariffCountry">
                                        <tr>
                                            <td>0 kg - 0.25 kg</td>
                                            <td>1.5 USD</td>
                                            <td>1.5 USD</td>
                                            <td>1.5 USD</td>
                                        </tr>
                                    </tbody >
                                </table>
                            </div>
                            <div class="world_calculate_bottom">
                                <h6>{{ translate('shop_in_turkey_right_now') }}</h6>
                                <button>{{ translate('to_stores') }}</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="world_calculate_block">
                                @include("site.calculate.calculate")
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let id,image,worldId,storage,newimage;
            $(".country").on("click",function(){
                worldId = $(this).attr("id");
                image = $("#"+ worldId +" img").attr("src");
                newimage = $(".world_calculate_top img").attr("src",image);
                id=$(this).attr("id");
                storage = '{{asset('storage/country')}}/';
                $.ajax({
                    url:'{{route("postSiteCountry")}}',
                    data:{id:id},
                    type:"post",
                    dataType:"json",
                    success:function (response) {
                        let rows="";
                        $.each(response.tariff,function(i, item) {
                            rows += '<tr>\n' +
                                '      <td>'+item.weight_text+'</td>\n' +
                                '      <td>'+item.price+'</td>\n' +
                                '      <td>1.5 USD</td>\n' +
                                '      <td>1.5 USD</td>\n' +
                                '</tr>';
                            console.log(item);
                        });
                        $("#tariffCountry").html(rows);
                        console.log(rows);

                    }

                });
            });

            $(".calculate_btn").click(function(e){

                let width = $("#width").val();
                let height = $("#height").val();
                let depth = $("#depth").val();
                let weight = $("#weight").val();
                let country_id = $("#country_id").val();

                $.ajax({
                    type:'POST',
                    url:'{{route("postCalculate")}}',
                    data:{
                        width:width,
                        height:height,
                        depth:depth,
                        weight:weight,
                        country_id:country_id
                    },
                    success:function(data){
                        $("#result").html(data.price + " USD");
                    }
                });
                e.preventDefault();
            });

        })
    </script>

    @endsection
