function setVote(rating,path){
        
        $.post(path,
            {
                rating: rating,
                id: $('#placeId').val()
            },
            function(data,status){
                if(status === "success"){
                    console.log(status);
                    //$('#placeContainer').html("<h1>Error !</h1>");
                    $('#voteSection').html(data);
                } else {
                    $('#voteSection').html("Error msg !");
                }
                
            }
        );
    };
    




/*
function setVote(rating) {
 if (window.XMLHttpRequest) {
 xmlhttp=new XMLHttpRequest();
 } else {
 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 
 xmlhttp.onreadystatechange=function() {
 if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 document.getElementById("voteSection").innerHTML=xmlhttp.responseText;
 }
 };
 

 var placeId = $("#placeId").val();
 //alert(paramToSend);
 
 var votePath = "/MyProject/web/app_dev.php/setVote";
 
 xmlhttp.open("POST",votePath);
 xmlhttp.send("id="+placeId+"&rating="+rating);
 }

/*
$(document).ready(function() {
    $(".vote").on("click", function() {
        //alert(1); 
        var rating = $(this).val();
        var paramToSend = "";
        var placeId = $("#placeId").val();
        var ip = $("#ip").val();

        var paramToSend = rating + "," + placeId + "," + ip;
                $.ajax({
            url: "/MyProject/web/app_dev.php/setVote/" + paramToSend,
            type: "POST",
            success: function(data) {
                //alert(data);
                $("#voteSection").html(data);
            }

        });

    });
});*/