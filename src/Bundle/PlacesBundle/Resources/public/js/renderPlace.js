$(document).ready(function(event) {
/*    //$(".list-group-item").on('click', function() {   
    $(".it").on('click', function() {
        param = $(this).attr('href');
        //alert (param);
        $(this).addClass('active').siblings().removeClass('active');
        $.ajax({
//            url: "/MyProject/web/app_dev.php/renderPlace/" + param,
            url: param,
            type: "GET",
            success: function(data) {
//                alert(data);
                if (data) {
                    console.log('1');
                    $('#place-container').html(data);
                }
            }
        });
        //alert(param);
        return false;
        //alert(22);
        event.preventDefault();

    });*/
});
