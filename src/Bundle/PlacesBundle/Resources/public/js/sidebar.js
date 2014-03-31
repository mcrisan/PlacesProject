$(document).ready(function() {
    var array = "";
    var i = 0;
    var searchvalue = $("#searchvalue").val();
    var nrplaces;
    // store current places in list
    $('.app-aside-div').children('a').each(function() {
        var arrHref = ($(this).attr('id'));
        array += arrHref + ',';
    });
    $('.app-results-wrapper').scroll(function() {
        if ($(this)[0].scrollHeight - $(this).scrollTop() == $(this).outerHeight()) {
            i++;
            console.log(i);
            console.log(searchvalue);
            $.ajax({
                url: "morePlacesRequest",
                type: "POST",
                data: 'pag=' + i + '&searchval=' + searchvalue,
                success: function(data) {
                    if (data) {
                        $('#gif-loader').hide();
                        $('.app-aside-div').append(data);
                        nrplaces = $("#nrplaces").val();
                        console.log(nrplaces);
                        $(".it"+i).on('click', function() {
                            param = $(this).attr('href');
                            $(this).addClass('active').siblings().removeClass('active');
                            $.ajax({
                                url: param,
                                type: "GET",
                                success: function(data) {
                                    if (data) {
                                        console.log('1');
                                        $('#place-container').html(data);
                                    }
                                }
                            });
                            return false;
                            event.preventDefault();
                        });
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
});