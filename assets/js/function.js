$("#GotoPage").click(function() {
    $('html, body').animate({
        scrollTop: $("#myDiv").offset().top
    }, 2000);
});

function GotoPage(page){

	

	$('html, body').animate({
        scrollTop: $('#'+page).offset().top-100
    }, 1000);

	$('.navbar-nav li').removeClass('active');
    $('#'+page+'_nav').addClass('active');


}