/*$(function() {
    var events = [];
    $.ajax({
        type: "POST",
        url: "http://10.182.20.79/placesproject/web/app_dev.php/eventDetails",
        cache: false,
        dataType: 'json',
        success: function(data) {
            events = data;

        }
    });
 
   $(document).mousemove(function(e) {
        var tagName = e.target.tagName.toLowerCase();
        if ((tagName == "img" || e.target.className == "hover-image") && e.target.className != "no-hovering") {
            var $target = $(e.target);
            var id = e.target.id;
            if (!$(".hover-image").length) {
            
               // console.log(events);
                for (var i = 0; i < events.length; i++) {
                    if (events[i]['id'] == id){
                      
                        var label = events[i]['title'];
                        var description = events[i]['description'];
                        //var eventdate ="d";// events[i]['eventdate']['date'];
                        $('body').append('<div class="hover-image">\
                        <label>' + label + '</label>\
                        <p>' + description + '</p>\
                      </div>');
                    }
                }
                $(".hover-image").on('mousedown', function(e) {
                    //go to details page
                });
            }
            $('.hover-image').css({
                top: $target.offset().top,
                left: $target.offset().left,
                width: $target.width(),
                height: $target.height()
            });
        } else {
            $(".hover-image").remove();
        }
    });
}());
*/

  $(document).ready(function (){
      
      $('div.events').click(function(){
             var slug = $(this).attr('rel');
             
             url = "http://"+window.location.hostname+"/placesproject/web/app_dev.php/home?slug=" + slug;

             window.location.replace(url);
          });
  });
      

