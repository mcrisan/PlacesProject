$(function() {
    $.fn.editable.defaults.mode = 'inline';
    var dataid = $('#dataid').val();
    $('.myeditable').editable();
    

    $('#title').editable('option', 'validate', function(v) {
        if (!v)
            return 'Required field!';
    });

    
    $('#save-btn').click(function() {
        $('.myeditable').editable('submit', {
          
            url: 'editevent/'+dataid,
            ajaxOptions: {
                dataType: 'json' //assuming json response
            },
            success: function(data, config) {
                if (data && data.id) { 
                    var msg = 'New event created!';
                } else if (data && data.errors) {
                    config.error.call(this, data.errors);
                }
            },
            error: function(errors) {
               
                var msg = '';
                if (errors && errors.responseText) { 
                    msg = errors.responseText;
                    
                } 
               $('#msg-show').html(msg);
            }
        });
    });
});


 $(function(){
    $('#imagesEvent').editable({
        url: 'eventUploadPhoto/',
        //title: 'Enter username'
    });
});