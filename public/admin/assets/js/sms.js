function showCustomer() {
    let object = $(this);
    let value = parseInt(object.val());
    $('.customer-code-field').show();

    if (value) {
        $('.customer-code-field').css('display', 'flex');
    } else {
        $('.customer-code-field').hide();
        clearInputs();
    }
}

$('select[name="type"]').on('change', showCustomer);

//get customer ajax
function getCustomer() {
    let object = $(this);
    let code = object.val();

    if (code.length < 4) {
        return false;
    }

    $('#customer-fullname-number').text('');
    $('.customer-number').val('');

    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        data: {
            code: code,
        },
        success: function (data) {
            if (data.status === true) {
                let fullNameAndNumber = data.result.first_name + ' ' + data.result.last_name + ' (' + data.result.phone + ')';
                $('#customer-fullname-number').text(fullNameAndNumber);
                $('.customer-number').val(data.result.phone);
            } else {
                $('#customer-fullname-number').text(data.message);
            }
        }
    });
}

$('.customer-code').on('keyup', getCustomer);


//get customer ajax
function showTemplate() {
    let object = $(this);
    let value = object.val();
    $('.sms-message-field').css('display', 'flex');
    $('.sms-message-field textarea').text('');

    if (value == '0') {
        $('.sms-message-field').css('display', 'flex');
    } else {
        $('.sms-message-field').hide();
        $('.sms-message-field textarea').text(value);
    }
}

$('.sms-template-choose').on('change', showTemplate);

function clearInputs() {
    $('.customer-number').val('');
    $('.customer-code').val('');
    $('#customer-fullname-number').text('');
}
