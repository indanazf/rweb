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

function banner2_readmore(){
  var media = window.innerWidth;
  if(media >= 1000){
    $(".banner-2__content").css({'float': 'right', 'right': '0'});
    $(".banner-2__content").stop().animate({width:'150%'}, 250);
    $(".banner-2__content__desc").stop().animate({'height': '200px'}, 250);
  }else{
    $(".banner-2__content__desc").stop().animate({'height': '240px'}, 250);
  }
  $("#banner-2__content__readmore").hide();
  $("#banner-2__content__close").show();
}

function banner2_close(){
  $(".banner-2__content").css({'float': 'right', 'right': '0'});
  $(".banner-2__content").stop().animate({width:'100%'}, 250);
  $("#banner-2__content__close").hide();
  $("#banner-2__content__readmore").show();
  $(".banner-2__content__desc").stop().animate({'height': '110px'}, 250);
  
}
