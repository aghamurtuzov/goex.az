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
        storage = '{{asset("storage/country")}}/';
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
    })

});
