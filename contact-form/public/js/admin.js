$(document).on('click', '.search_message', function () {
    id = $(this).attr('data-id');
    url = $('.kln-url').attr('data-base-url');
    if ($('.message-content-' + id).is(':empty')) {
        $.ajax({

            url: url + '/getMessage/' + id,
            type: 'post',
            dataType: 'html',
            success: function (data) {
                value = jQuery.parseJSON(data);
                html = '<div class="message"><p>' + value.message + '</p><div><br/>'
                $('.message-content-' + id).append(html)
            },
            error: function (request, error) {
                alert("Request: " + JSON.stringify(request));
            }
        });
    }

})


$(document).on('click', '.change_status', function () {
    id = $(this).attr('data-id');
    url = $('.kln-url').attr('data-base-url');
    $.ajax({

        url: url + '/setReadMessage/' + id,
        type: 'post',
        dataType: 'html',
        data: {
            "value": $(this).attr('data-value'),
            "id": id
        },
        success: function (data) {
            value = jQuery.parseJSON(data);
            if (value.message == 1) {
                $('.list-message-' + id).removeClass('message-not-showing');
                $('.list-message-' + id).addClass('message-showing');
            }
            if (value.message == 0) {
                $('.list-message-' + id).removeClass('message-showing');
                $('.list-message-' + id).addClass('message-not-showing');
            }
            $('.list-message-' + id).attr('data-value', value.message)
        },
        error: function (request, error) {
            alert("Request: " + JSON.stringify(request));
        }
    });
})