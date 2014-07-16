//$(document).ready(function() {
//    $("#loadmore").on("click", function() {
//        var start = $("#start").val();
//        var limit = $("#limit").val();
//        $.post("/MyProject/web/app_dev.php/morePlacesRequest",
//            {
//                start: start,
//                limit: limit
//            },
//            function(data,status){
//                if(status === "success"){
//                    console.log(status);
//                    $('#placeContainer').html(data);
//                } else {
//                    $('#placeContainer').html("Error msg !");
//                }
//                
//            }
//        );
//        /*
//        $.ajax({
//            url: "/MyProject/web/app_dev.php/morePlacesRequest/" + param,
//            type: "POST",
//            success: function(data) {
//                //alert(data);
//                $("#placeContainer").html(data);
//            }
//        });*/
//    });
//});