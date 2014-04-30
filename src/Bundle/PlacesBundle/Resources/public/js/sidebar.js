$(document).ready(function() {
    var i = 0;
    var searchvalue = $("#searchvalue").val();
    var nrplaces;
    $('.right-container').scroll(function() {
        if ($(this)[0].scrollHeight - $(this).scrollTop() == $(this).outerHeight()) {
            i++;
            $.ajax({
                url: "morePlacesRequest",
                type: "POST",
                data: 'pag=' + i + '&searchval=' + searchvalue,
                success: function(data) {
                    if (data) {
                        $('#gif-loader').hide();
                        $('.restaurant-list').append(data);
                        nrplaces = $("#nrplaces").val();      
                    }
                },
                beforeSend: function() {
                    $('#gif-loader').show();
                },
                complete: function() {
                    $('#gif-loader').hide();
                }
            });
        }
    });
    $(".restaurant-list").on('click','.it',function(event){
        param = $(this).attr('href');
        event.preventDefault();
        $(".restaurant-list li").removeClass("item-active");
        $(this).parents('li').addClass("item-active");
        $(this).addClass('active').siblings().removeClass('active');
        $.ajax({
            url: param,
            type: "GET",
            success: function(data) {
                if (data) {
                    $('.left-container').html(data);
                    refreshMap();
                }
            }
        });
        return false;
        event.preventDefault();
    });
    var refreshMap = function(){
        var toAddrLatLng = $("#lat").val() + " " + $("#lng").val();
        var fromAddr = $("#fromAddress").val();
        //alert(fromAddr);
        var toAddr = $("#toAddress").val();
        //alert(toAddrLatLng);
        if ("" !== toAddr) {
            initialize(fromAddr, toAddrLatLng, $("#lat").val(), $("#lng").val());
        } else {
            initialize(fromAddr, toAddrLatLng, $("#lat").val(), $("#lng").val());
        }
    }
});
