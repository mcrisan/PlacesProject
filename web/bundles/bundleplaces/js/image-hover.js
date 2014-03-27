$(function(){
  $(document).mousemove(function(e){
      var tagName = e.target.tagName.toLowerCase();
      if((tagName == "img" || e.target.className == "hover-image") && e.target.className != "no-hovering"){
          var $target = $(e.target);
          if(!$(".hover-image").length){
            var label = "La matusica";
            var description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam";
            var rating = 3;
            $('body').append('<div class="hover-image">\
                <label>'+label+'</label>\
                <p>'+description+'</p>\
                <ul>\
                  <li></li>\
                  <li></li>\
                  <li class="active"></li>\
                  <li class="active"></li>\
                  <li class="active"></li>\
                </ul>\
              </div>');

              $(".hover-image").on('mousedown', function(e){
                  console.log(e);
                  //go to details page
              });
          }
          $('.hover-image').css({
              top: $target.offset().top,
              left: $target.offset().left,
              width: $target.width(),
              height: $target.height()
          });
      }else{
          $(".hover-image").remove();
      }
  });
}());
