$(function() {
                $(".search").keyup(function()
                {
                    $( ".search" ).addClass( "ui-autocomplete-loading" );
                    var searchid = $(this).val();
                    var dataString = 'search=' + searchid;
                    if (searchid != '')
                    {
                        $.ajax({
                            type: "POST",
                            url: "autocomaction",
                            data: dataString,
                            cache: false,
                            success: function(html)
                            {
                                $("#autocomplete-result").html(html).show();
                                $( ".search" ).removeClass( "ui-autocomplete-loading" );
                            }
                        });
                    }
                    return false;
                });

                jQuery("#autocomplete-result").on("click", function(e) {
                    var $clicked = $(e.target);
                    //var $name = $clicked.parent().find('.name').html();
                    //alert($name);
                    var $name = $clicked.find('.name').html();
                    if ( typeof $name == 'undefined'){
                        $name = $clicked.parent().find('.name').html();
                    }
                    //alert($name);
                    var decoded = $("<div/>").html($name).text();
                    $('#searchh').val(decoded);
                });
                jQuery(document).on("click", function(e) {
                    var $clicked = $(e.target);
                    if (!$clicked.hasClass("search")) {
                        jQuery("#autocomplete-result").fadeOut();
                    }
                });
                $('#searchh').click(function() {
                    jQuery("#autocomplete-result").fadeIn();
                });
            });