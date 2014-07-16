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
    