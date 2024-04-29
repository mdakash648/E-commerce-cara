jQuery(document).ready(function ($) {


    $.ajax({
        url: '',
        type: 'POST',
        data: {
            'action': 'my_action',
        },
        success: function (response) {
            // Insert the received H1 tag into the body or a specific div
            $('#click-count').html(response);

        }
    });

});