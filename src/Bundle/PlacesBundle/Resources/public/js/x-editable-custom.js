$(function() {
    $.fn.editable.defaults.mode = 'inline';
    var dataid = $('#dataid').val();
    $('.myeditable').editable();


    $('#title').editable('option', 'validate', function(v) {
        if (!v)
            return 'Required field!';
    });



    $('#save-btn').click(function() {
        var test = {};
        test.image = $('#image-tag').val();
        test.dateevent = $('#event').text();
        $('.myeditable').editable('submit', {
            url: 'editevent/' + dataid,           
            data: test,
            success: function(data, config) {
                if (data && data.id) {
                    $('#').val();
                    var msg = 'New event created!';
                } else if (data && data.errors) {
                    config.error.call(this, data.errors);
                }
            },
            params: function(params) {
                params.a = 1;
                return params;
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
            if (v && v.getDate() == 10)
                return 'Day cant be 10!';
        },
        datetimepicker: {
            todayBtn: 'linked',
            weekStart: 1
            
        }
    });


});



$(function() {
    __images.processImages();
});
//var oldimage = $('#poster').attr('src');
//
//$('#imagesEvent').on('click', function() {
//    alert('aa');
//
//});


//function bindPostImage() {
//    var oldimage = $('#poster').attr('src');
//
//    alert('aa');
//    $('#imagesEvent').editable({
//        url: 'eventUploadPhoto',
//        success: function(data) {
//            if (data == 'Not a valid URL') {
//                $('#imagepreview').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="picture" data-type="text" data-pk="1" href="#"><img class="img-e" src="' + oldimage + '" width="160px" alt="poster" ></a>');
//                $('#msg-show').show(0).html(data).ready(function() {
//                    $('#msg-show').fadeOut(2350)
//                });
//                $('#imagetag').html('<input type="hidden" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + oldimage + '">');
//            } else {
//                $('#imagepreview').html('<img class="img-e" src="' + data + '" width="160px" alt="poster" >');
//                $('#imagetag').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="' + data + '" data-type="text" data-pk="2" href="#"><input type="hidden" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + data + '"></a>');
//            }
//
//        }
//    });
//
//}

var __images = {
    processImages: function() {
        $('#imagesEvent').editable({
            url: 'eventUploadPhoto',
            success: function(data) {
                if (data == 'Not a valid URL') {
                    oldimage = $('#poster').attr('src');
                    $('#imagepreview').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="picture" data-type="text" data-pk="1" href="#"><img class="img-e" src="' + oldimage + '" width="160px" alt="poster" ></a>');
                    $('#msg-show').show(0).html(data).ready(function() {
                        $('#msg-show').fadeOut(2350);
                        __images.postAction();
                    });
                    $('#imagetag').html('<input type="hidden" data-name="image-poster-data" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + oldimage + '">');
                } else {
                    $('#imagepreview').html('<img class="img-e" src="' + data + '" width="160px" alt="poster" >');
                    $('#imagetag').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="' + data + '" data-type="text" data-pk="2" href="#"><input type="hidden" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + data + '"></a>');
                }

            }
        });
    },
    postAction: function() {
        $('#imagesEvent').editable({
            url: 'eventUploadPhoto',
            success: function(data) {
                if (data == 'Not a valid URL') {
                    $('#imagepreview').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="picture" data-type="text" data-pk="1" href="#"><img class="img-e" src="' + oldimage + '" width="160px" alt="poster" ></a>');
                    $('#msg-show').show(0).html(data).ready(function() {
                        $('#msg-show').fadeOut(2350);
                        __images.postAction();
                    });
                    $('#imagetag').html('<input type="hidden" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + oldimage + '">');
                } else {
                    $('#imagepreview').html('<img class="img-e" src="' + data + '" width="160px" alt="poster" >');
                    $('#imagetag').html('<a style="color: #000000;border-bottom: none;" id="imagesEvent" data-original-title="Enter picture" data-name="' + data + '" data-type="text" data-pk="2" href="#"><input type="hidden" class="myeditable editable editable-pre-wrapped editable-click editable-empty" id="image-tag" value="' + data + '"></a>');
                }

            }
        });
    }
}