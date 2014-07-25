
$(document).ready(function() {
   $('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});

   $(".login").on('click',function(){
   		$(".login_area").slideToggle("slow");
   });


});


