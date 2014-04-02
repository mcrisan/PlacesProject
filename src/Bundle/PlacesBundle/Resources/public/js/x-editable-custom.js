$(function() {
    $.fn.editable.defaults.mode = 'inline';
    var dataid = $('#dataid').val();
    console.log(dataid);
    
//init editables
    $('.myeditable').editable({
        url: '/post',
        placement: 'right'
    });
//make username required
    $('#title').editable('option', 'validate', function(v) {
        if (!v)
            return 'Required field!';
    });
//automatically show next editable
    $('.myeditable').on('save.event', function() {
        var that = this;
        setTimeout(function() {
            $(that).closest('tr').next().find('.myeditable').editable('show');
        }, 200);
    });
//create new user
    $('#save-btn').click(function() {
        $('.myeditable').editable('submit', {
          
            url: 'editevent/'+dataid,
            ajaxOptions: {
                dataType: 'json' //assuming json response
            },
            success: function(data, config) {
                if (data && data.id) { //record created, response like {"id": 2}
//set pk
                    $(this).editable('option', 'pk', data.id);
//remove unsaved class
                    $(this).removeClass('editable-unsaved');
//show messages
                    var msg = 'New event created!';
                    $('#msg').addClass('alert-success').removeClass('alert-error').html(msg).show();
                    $('#save-btn').hide();
                    $(this).off('save.event');
                } else if (data && data.errors) {
//server-side validation error, response like {"errors": {"username": "username already exist"} }
                    config.error.call(this, data.errors);
                }
            },
            error: function(errors) {
                var msg = '';
                if (errors && errors.responseText) { //ajax error, errors = xhr object
                    msg = errors.responseText;
                } else { //validation error (client-side or server-side)
                    $.each(errors, function(k, v) {
                        msg += k + ": " + v + "<br>";
                    });
                }
                $('#msg').removeClass('alert-success').addClass('alert-error').html(msg).show();
            }
        });
    });
//reset
    $('#reset-btn').click(function() {
        $('.myeditable').editable('setValue', null)
                .editable('option', 'pk', null)
                .removeClass('editable-unsaved');
        $('#save-btn').show();
        $('#msg').hide();
    });
});