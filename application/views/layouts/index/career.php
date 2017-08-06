
<div class="career">
	<div class="banner-overlay  banner-overlay-career wow animated fadeIn ">
		
			<img src="<?= base_url('/assets/images/career-1.jpg') ?>">

	</div>
	<div class="banner-overlay-dark "></div>
	
	<div class="container">
	  <div class="career__content">
	    <div class="career__content__title">Be Part of The Experience</div>

	    
	  </div>
	  <div class="career__content__icon">
	  	<div class="career__content__icon__item"><img src="<?= base_url('/assets/images/Asset-2.png') ?>"></div>
	  	<div class="career__content__icon__item"><img src="<?= base_url('/assets/images/Asset-3.png') ?>"></div>
	  	<div class="career__content__icon__item"><img src="<?= base_url('/assets/images/Asset-4.png') ?>"></div>
	  </div>
	 </div>
	 
</div>

	
<div class="container">
  <div class="career__content2">
    <div class="career__content2__title">Available Vacancies at Sahabat Cipta</div>
	<?php 
	for($i=0;$i<=3;$i++){
	?>
	<div class="col-md-6">
    	
    	<div class="career__content2__item">
    		<div class="col-md-5">
	    		<div class="career__content2__item__img"><img src="<?= base_url('/assets/images/career-1.jpg') ?>"></div>
	    	</div>
	    	<div class="col-md-7">
	    		<div class="career__content2__item__title">Project Manager PRISMA Program</div>
	    		<div class="career__content2__item__desc">Deliver the analysis and insights we use to innovate.</div>
	    		<div class="career__content2__item__read-more"><a href="<?php echo site_url('/career/detail') ?>">Click here for more details</a></div>
	    	</div>
	    </div>
	    
    </div>

    <div class="modal fade" id="myModal-<?= $i?>" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
              
              <div class="career__content-detail">
              	<div class="career__content-detail__title">People</div>
              	<div class="career__content-detail__desc">Keep Sahabat Cipta going and growing.
Our People Operations team (known elsewhere as HR) and
administrative sta are the curious and creative colleagues
that anchor us to our foundations and help us reach our
dreams.</div>
				<span class="career__content-detail__position">1 positions available | </span>
	              <span class="career__content-detail__deadline">Deadline 31 October 2017</span>
	              <div class="career__content-detail__download-button">download application form</div>
	              <div class="clear"></div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <?php
	}
    ?>
    <div class="clear"></div>
  </div>
 </div>
	 
<div class="career">
	<div class="banner-overlay  banner-overlay-career wow animated fadeIn ">
		
			<img src="<?= base_url('/assets/images/volunteer1.png') ?>">

	</div>
	<div class="banner-overlay-dark "></div>
	
	<div class="container">
	  <div class="career__content3">
	  	<div class="career__content3__title2">How to Apply</div>
	  	<div class="career__content3__subtitle">Send your application, CV,<br> and motivation letter to</div>
	    <div class="career__content3__title">career@sahabatcipta.com</div>

	    
	  </div>
	 </div>
	 
</div>






