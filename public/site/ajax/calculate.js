$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".calculate_btn").click(function(e){
        e.preventDefault();
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

    });
})
