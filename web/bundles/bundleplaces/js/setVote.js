function getVote(vote,path) {

    $.post(path,
            {
                vote: vote

            },
    function(data, status) {
        if (status === "success") {
            console.log(status);
            //$('#placeContainer').html("<h1>Error !</h1>");
            $('#usersPoll').html(data);
        } else {
            $('#usersPoll').html("Error msg !");
        }

    }
    );
}
;