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
            url: 'editevent/' + dataid,
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
    
    $('#event').editable({
        placement: 'right',
        combodate: {
            firstItem: 'name'
        }
    });      
    
    $('#meeting_start').editable({
        format: 'yyyy-mm-dd hh:ii',    
        viewformat: 'dd/mm/yyyy hh:ii',
        validate: function(v) {
           if(v && v.getDate() == 10) return 'Day cant be 10!';
        },
        datetimepicker: {
           todayBtn: 'linked',
           weekStart: 1
        }        
    }); 
    
    
});



$(function() {
    $('#imagesEvent').editable({
        url: 'eventUploadPhoto',
        //title: 'Enter username'
    });
});

