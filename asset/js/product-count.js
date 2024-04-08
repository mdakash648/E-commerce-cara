$(document).ready(function() {
    // AJAX call to fetch the data from test.php
    $.ajax({
        url: '../../inc/cart_pro_count.php',
        type: 'GET',
        success: function(response) {
            // On success, create a div with the background color received from the response
            $('#box').html('<div class="box1" style="background-color:' + response + '; height: 100px; width: 100px;"></div>');
        },
        error: function() {
            // On error, display an error message
            $('#box').html('Error fetching message');
        }
    });
    $('#btn').click(function () {
        $.ajax({
            url: 'test.php',
            type: 'GET',
            success: function (response) {
                $('#box').html('<div class="box1" style="background-color:'+ response +' ;"></div>');
            },
            error: function () {
                $('#box').html('Error fetching message');
            }
        });
    });
});