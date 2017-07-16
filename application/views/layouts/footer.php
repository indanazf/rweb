	<div class="footer">
		<div class="container">
			<div class="col-md-6">
				<div class="footer__left">
					<form>
					<!-- <input type="email" name="email" id="email" required="" placeholder="Alamat Email" class="footer__left__email"> -->
					<!--<a href="<?php echo site_url('donation') ?>" class="footer__left__button" align="center">Donate</a>-->
					</form> 
					<div class="clear"></div>
					<!-- <div class="footer__left__text">Enter your email to get the registration form</div>  -->
					<br>
					<img src="<?= base_url() ?>assets/images/logo-white.png" class="footer__left__logo">
				</div>
			</div>
			<div class="col-md-6">
				<div class="footer__right">
					<table class="footer__right__table">
						<tr >
							<td>Email</td>
							<td>info@sahabatcipta.or.id</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>+62 21 7919 8690</td>
						</tr>
						<tr>
							<td>Fax</td>
							<td>+62 21 7919 8691</td>
						</tr>
						<tr>
							<td valign="top">Address</td>
							<td>Jl. Mampang Prapatan XIV No. 47 <br>RT 01/RW 02, Jakarta 12790, Indonesia</td>
						</tr>
					</table>
				</div>

			</div>

		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ==================================================
    <!-- Placed at the end of the document so the pages load faster -->
   

    <!-- full slider -->
    <script src="<?= base_url() ?>assets/js/jquery.fullPage.js"></script>
    <script src="<?= base_url() ?>assets/js/fullslider.js"></script>
    <script type="text/javascript">
    	var deleteLog = false;
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu',
				scrollingSpeed: 1000,
				slidesNavigation: true,
				afterRender: function () {
		            setInterval(function () {
		                $.fn.fullpage.moveSlideRight();
		            }, 10000);
		        },
				onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){
					var own_index = slideIndex + 1;
					if(slideIndex==0 || slideIndex==1 || slideIndex==2){
						$("#banner-overlay__slider__animate-"+own_index).css({width: "120%", opacity: "0.2"});
						$("#banner-1__content__animate-"+own_index).css({opacity: "0"});
						$("#banner-1__content__title__animate-"+own_index).css({opacity: "0", marginTop: "50px"});
						$("#banner-1__content__desc__animate-"+own_index).css({opacity: "0", marginTop: "50px"});
					}else if(slideIndex==3 || slideIndex==4){
						$("#banner-overlay__slider__animate-"+own_index).css({width: "120%", opacity: "0.2"});
						if (slideIndex==3){
							$("#our-team__content__animate").css({opacity: "0"});
						}else{
							$("#our-executive__content__animate").css({opacity: "0"});
						}
					}
				},
				afterLoad: function(anchorLink, index, slideAnchor, slideIndex){
					$("#banner-overlay__slider__animate-1").animate({width: "100%", height: "100%", left: "0", top: "0px", opacity: "1"}, 250);
					$("#banner-1__content__animate-1").animate({opacity: "1"}, 500);
					$("#banner-1__content__title__animate-1").delay(250).animate({opacity: "1", marginTop: "0"}, 500);
					$("#banner-1__content__desc__animate-1").delay(500).animate({opacity: "1", marginTop: "0"}, 500);
				},
				afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
					// $('#callbacksDiv').append('<p>afterSlideLoad - anchorLink:' + anchorLink + " index:" + index + " slideAnchor:" + slideAnchor +" slideIndex:" + slideIndex + '</p>');
					// deleteLog = true;
					// console.log("afterSlideLoad--" + "anchorLink: " + anchorLink + " index: " + index + " slideAnchor: " + slideAnchor + " slideIndex: " + slideIndex);
					// console.log("----------------");

					var own_index = slideAnchor + 1;
					if(slideAnchor==0 || slideAnchor==1 || slideAnchor==2){
						$("#banner-overlay__slider__animate-"+own_index).animate({width: "100%", height: "100%", left: "0", top: "0px", opacity: "1"}, 250);
						$("#banner-1__content__animate-"+own_index).animate({opacity: "1"}, 500);
						$("#banner-1__content__title__animate-"+own_index).delay(250).animate({opacity: "1", marginTop: "0"}, 500);
						$("#banner-1__content__desc__animate-"+own_index).delay(500).animate({opacity: "1", marginTop: "0"}, 500);
					}else if(slideAnchor==3 || slideAnchor==4){
						$("#banner-overlay__slider__animate-"+own_index).animate({width: "100%", height: "100%", left: "0", top: "0px", opacity: "1"}, 250);
						if (slideAnchor==3){
							$("#our-team__content__animate").delay(500).animate({opacity: "1"}, 500);
						}else{
							$("#our-executive__content__animate").delay(500).animate({opacity: "1"}, 500);
						}
					}
				}
			});
		});
	</script>
    
    <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scrollspy.js"></script>
    <script src="<?= base_url() ?>assets/js/function.js"></script>
    <script>
	  

	  // Helper function for add element box list in WOW
	  WOW.prototype.addBox = function(element) {
	    this.boxes.push(element);
	  };

	  // Init WOW.js and get instance
	  var wow = new WOW();
	  wow.init();

	  // Attach scrollSpy to .wow elements for detect view exit events,
	  // then reset elements and add again for animation
	  $('.wow').on('scrollSpy:exit', function() {
	    $(this).css({
	      'visibility': 'hidden',
	      'animation-name': 'none'
	    }).removeClass('animated');
	    wow.addBox(this);
	  }).scrollSpy();

	</script>



  </body>
</html>
