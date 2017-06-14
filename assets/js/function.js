$("#GotoPage").click(function() {
    $('html, body').animate({
        scrollTop: $("#myDiv").offset().top
    }, 2000);
});

function GotoPage(page){

	

	$('html, body').animate({
        scrollTop: $('#'+page).offset().top-100
    }, 1000);

	// $('.navbar-nav li').removeClass('active');
 //    $('#'+page+'_nav').addClass('active');


}

$(function() {
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    var menu_name = ["aboutus", "works", "impact", "involved", "newsroom"];

    for(var i=0;i<=4;i++){
	    if (scroll >= $('#'+menu_name[i]).offset().top-100) { // check the offset top
	    	$('.navbar-nav li').removeClass('active');
	      $('#'+menu_name[i]+'_nav').addClass('active');
	    }
	    
  	}
  });
});