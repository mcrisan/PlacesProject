$(document).ready(function(){
 
    $('#send_owner_details').click(function(e){
        var name = $('#inputName').val();
        var email = $('#inputEmail').val();
        var tel = $('#inputTel').val();
        var placeId = $('#placeid').val();
        if(name!="" || email!="" || tel!="");
        {
            $.ajax({
                 url: "ownershipdetails",
                 data:{name:name,email:email,tel:tel,placeid:placeId},
                 type: "POST",
                 success: function(data) {
                     if (data) {
                         console.log(data);
                     }
                 }
             });
         };
         e.preventDefault();
    });
            $('#send_owner_details').click(function(){
               $('#formOwner').modal('hide');
               $('.close').show;

                    }); 
  
       
        
        
  }); 
  
 

        
     
   
    
     
   
