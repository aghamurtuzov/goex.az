$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#contact_btn").on("click",function (e) {
        e.preventDefault();
        let fullname = $("#fullname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let message = $("#message").text();
        $.ajax({
            url:'{{route("postContact")}}',
            data:{fullname:fullname,email:email,phone:phone,message:message},
            type:"post",
            dataType:"json",
            success:function (response) {
                document.getElementById('form').reset();
                clear();
                swal(
                    response.content,
                    response.title,
                    response.status
                );
            }
        });
    });

    function clear() {
        $("#fullname").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#message").text('');
    }
});
