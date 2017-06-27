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

function banner3_readmore(){
  $(".banner-3__content__desc").animate({height:'256px'}, 250);
  $("#banner-3__content__readmore").hide();
  $("#banner-3__content__close").show();
}

function banner3_close(){
  $(".banner-3__content__desc").animate({height:'105px'}, 250);
  $("#banner-3__content__readmore").show();
  $("#banner-3__content__close").hide();
}

function banner4_readmore(){
  $(".banner-4__content__desc").animate({height:'150px'}, 250);
  $("#banner-4__content__readmore").hide();
  $("#banner-4__content__close").show();
}

function banner4_close(){
  $(".banner-4__content__desc").animate({height:'50px'}, 250);
  $("#banner-4__content__readmore").show();
  $("#banner-4__content__close").hide();
}
>>>>>>> 72eb8ea38dfe1565081c90325418fe7d96ee85a9
