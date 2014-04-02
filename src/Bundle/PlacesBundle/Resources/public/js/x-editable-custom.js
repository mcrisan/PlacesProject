$(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';
    $('#titleevent').editable();
    $('#contextevent').editable();


//make username required
    $('#titleevent').editable('option', 'validate', function(v) {
        if (!v)
            return 'Required field!';
    });
    $('#contextevent').editable('option', 'validate', function(v) {
        if (!v)
            return 'Required field!';
    });

//    $('#save-btn').click(function() {
//        var placeId = $('#save-btn').data('placeid');
//        $('.myeditable').editable('submit', {
//            url: 'editevent/'+placeId,
//            ajaxOptions: {
//                dataType: 'json' //assuming json response
//            },
//            success: function(data, config) {
//                if (data && data.id) { //record created, response like {"id": 2}
//                    //set pk
//                    $(this).editable('option', 'pk', data.id);
//                    //remove unsaved class
//                    $(this).removeClass('editable-unsaved');
//                    //show messages
//                    var msg = 'New user created! Now editables submit individually.';
//                    $('#msg').addClass('alert-success').removeClass('alert-error').html(msg).show();
//                    $('#save-btn').hide();
//                    $(this).off('save.newuser');
//                } else if (data && data.errors) {
//                    //server-side validation error, response like {"errors": {"username": "username already exist"} }
//                    config.error.call(this, data.errors);
//                }
//            },
//            error: function(errors) {
//                var msg = '';
//                if (errors && errors.responseText) { //ajax error, errors = xhr object
//                    msg = errors.responseText;
//                } else { //validation error (client-side or server-side)
//                    $.each(errors, function(k, v) {
//                        msg += k + ": " + v + "<br>";
//                    });
//                }
//                $('#msg').removeClass('alert-success').addClass('alert-error').html(msg).show();
//            }
//        });
//    });
});
