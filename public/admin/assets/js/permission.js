let name,
    check,
    check2,
    html,
    status,
    modal,
    button;

$('#permissions').on('show.bs.modal', function (event) {
    button = $(event.relatedTarget); // Button that triggered the modal
    id = button.data('id');
    modal = $(this);
    modal.find('.modal-title').text('Permissions');
    modal.find('.modal-body input:first').val("");
    modal.find('.modal-content .message').removeClass('alert-primary alert-danger alert').text('');

    $('.permission_save').attr('data-id', id);
    if (id) {
        name = $(".permission" + id).find("td:first").text();
        modal.find('.modal-body input:first').val(name);
    }

});

$(".message").hide();

//permission ajax rest append
$(".permission_save").on("click", function (e) {
    e.preventDefault();
    name = $("#permission_name").val();
    status = $("#is_active").val();
    id = $(this).attr('data-id');
    $.ajax({
        url: url_permission,
        data: {
            id: id,
            name: name,
            status: status,
        },
        type: "post",
        dataType: "json",
        success: function (data) {
            $(".message").show();
            setTimeout(function () {
                if (data.success == 200) {
                    check = data.permission.status ? '' : 'display:none';
                    check2 = data.permission.status ? 'display:none' : '';
                    html = '';
                    html += '<td>' + data.permission.name + '</td>' +
                        '<td>\n';
                    html += '<div id="isActive_' + data.permission.id + '_p" class="btn-group"  style="' + check + '"><a href="#" class="statusCurrent label bg-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Aktiv <span class="caret"></span></a><ul class="dropdown-menu dropdown-menu-right"><li  class="statusToChange"><a type="button" data-id="' + data.permission.id + '" data-status="1" data-module="permissions"><span class=" status-mark bg-danger position-left"></span>Deaktiv</a></li></ul></div><div id="isDeactive_' + data.permission.id + '_p" class="btn-group" style="' + check2 + '"><a href="#" class="statusCurrent label bg-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Deaktiv<span class="caret"></span></a><ul class="dropdown-menu dropdown-menu-right"><li class="statusToChange"><a type="button"  data-id="' + data.permission.id + '" data-status="0" data-module="permissions"><span class="status-mark bg-success position-left"></span>Aktiv</a></li></ul></div>';
                    html += '</td>';

                    html += '<td class="text-center">\n' +
                        '                                    <a href="javascript:void(0);" class="dropdown-item  permissions_update"\n' +
                        '                                       data-id="' + data.permission.id + '" data-toggle="modal" data-target="#permissions"><i\n' +
                        '                                            class="icon-pencil5 m-auto mr-3 icon-2x"></i></a>\n' +
                        '                                </td></tr>';

                    if (!parseInt(data.id)) {
                        $("#permission_table").append('<tr class="permission' + data.permission.id + '">' + html + '</tr>');
                    } else {
                        $("#permission_table .permission" + data.permission.id).html(html);
                    }

                    $(".message").addClass("alert alert-primary").text(data.message);
                }
            }, 100);
            $("#permission_name").val("");
        }
    });
});


//=============================================================================================
//role ajax rest append


$('#role').on('show.bs.modal', function (event) {
    button = $(event.relatedTarget); // Button that triggered the modal
    id = button.data('id');
    modal = $(this);
    modal.find('.modal-title').text('Role');
    modal.find('.modal-body input:first').val("");
    modal.find('.modal-content .message').removeClass('alert-primary alert-danger alert').text('');
    $("#permission").val(null).trigger("change");

    $('.role_save').attr('data-id', id);
    if (id) {
        name = $(".roles" + id).find("td:first").text();
        modal.find('.modal-body input:first').val(name);
        $(".roles" + id).find("td label").each(function (index, value) {
            let perId = value.getAttribute('data-id');
            modal.find('.modal-body select option[value="' + perId + '"]').prop('selected', 'selected');
        });
    }

    $("#permission").trigger("change");

});


$(".role_save").on("click", function (e) {
    e.preventDefault();
    name = $("#name").val();
    let permission = $("#permission").val();
    status = $("#is_active").val();
    id = $(this).attr('data-id');

    $.ajax({
        url: url_role,
        data: {
            id: id,
            name: name,
            permission: permission,
            status: status,
        },
        type: "post",
        dataType: "json",
        success: function (data) {
            $(".message").show();
            setTimeout(function () {
                if (data.success == 200) {
                    check = data.role.status ? '' : 'display:none';
                    check2 = data.role.status ? 'display:none' : '';
                    html = '';
                    html += '<td>' + data.role.name + '</td>' +
                        '<td>\n';
                    $.each(data.role.permissions, function (i, item) {
                        html += '<label class="badge badge-success"\n' +
                            '                       data-id="' + item.id + '">' + item.name + '</label>';
                    });
                    html += '</td><td>';
                    html += '<div id="isActive_' + data.role.id + '" class="btn-group"  style="' + check + '"><a href="#" class="statusCurrent label bg-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Aktiv <span class="caret"></span></a><ul class="dropdown-menu dropdown-menu-right"><li  class="statusToChange"><a type="button" data-id="' + data.role.id + '" data-status="1" data-module="roles"><span class=" status-mark bg-danger position-left"></span>Deaktiv</a></li></ul></div><div id="isDeactive_' + data.role.id + '" class="btn-group" style="' + check2 + '"><a href="#" class="statusCurrent label bg-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Deaktiv<span class="caret"></span></a><ul class="dropdown-menu dropdown-menu-right"><li class="statusToChange"><a type="button"  data-id="' + data.role.id + '" data-status="0" data-module="roles"><span class="status-mark bg-success position-left"></span>Aktiv</a></li></ul></div>';
                    html += '</td>';

                    html += '<td class="text-center">' +
                        '<a href="javascript:void(0);" class="dropdown-item role_update"' +
                        'data-id="' + data.role.id + '" data-toggle="modal" data-target="#role"><i' +
                        ' class="icon-pencil5 m-auto mr-3 icon-2x"></i></a>' +
                        ' </td></tr>';

                    if (!parseInt(data.id)) {
                        $("#role_table").append('<tr class="roles' + data.role.id + '">' + html + '</tr>');
                    } else {
                        $("#role_table .roles" + data.role.id).html(html);
                    }

                    $(".message").addClass("alert alert-primary").text(data.message);
                }
            }, 100);
            $("#name").val("");
            $("#permission").val(null).trigger("change");
        }
    });
});






