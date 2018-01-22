<div class="join-us">
	<?php foreach($join_us as $row){?>
	<div class="join-us__banner">
		<div class="banner-overlay wow animated fadeIn">
      		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
    	</div>
    	<div class="join-us__banner__title wow animated fadeIn" data-wow-delay="0.5s"><!-- <?=$row->SUBJECT?> --></div>
	</div>
	<?php }?>
	<div class="container">
		<div class="join-us__content-1">
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo site_url('join_us/career') ?>">
					<img src="<?= base_url() ?>assets/images/join-us__icon-1.png" class="join-us__content-1__img  wow animated fadeInUp" data-wow-delay="1s">
					<div class="join-us__content-1__title  wow animated fadeIn">Career with Us</div></a>
					<div class="join-us__content-1__desc wow animated fadeIn" data-wow-delay="1s">Be a part of our diverse professional team</div>
				</div>
				<div class="col-md-4">
					<a href="<?php echo site_url('internship') ?>">
					<img src="<?= base_url() ?>assets/images/join-us__icon-2.png" class="join-us__content-1__img  wow animated fadeInUp" data-wow-delay="1s">
					<div class="join-us__content-1__title wow animated fadeIn">Internship</div></a>
					<div class="join-us__content-1__desc wow animated fadeIn" data-wow-delay="1s">Join our internship program</div>
				</div>
				<div class="col-md-4">
					<a href="<?php echo site_url('join_us/partner') ?>">
					<img src="<?= base_url() ?>assets/images/join-us__icon-3.png" class="join-us__content-1__img  wow animated fadeInUp" data-wow-delay="1s">
					<div class="join-us__content-1__title wow animated fadeIn">Become a Partner</div></a>
					<div class="join-us__content-1__desc wow animated fadeIn" data-wow-delay="1s">Allow us to help you design an impactful community empowerment program</div>
				</div>
			</div>
		</div>
		<div class="join-us__content-2">
			<div class="row">
				<div class="join-us__content-2__title wow animated fadeIn" data-wow-delay="1s">Employee Testimonials</div>
				<div class="h4 wow animated fadeIn" data-wow-delay="1s">Let's hear what the employees themselves have to say about Sahabat Cipta</div>

				<div class="col-md-4 wow animated fadeInUp">
					<iframe width="300" height="200" src="https://www.youtube.com/embed/IwzsXv4sw6k"></iframe>
					<div class="join-us__content-2__video__title">
						Testimonial 1
					</div>
				</div>
				<div class="col-md-4 wow animated fadeInUp" >
					<iframe width="300" height="200" src="https://www.youtube.com/embed/IwzsXv4sw6k"></iframe>
					<div class="join-us__content-2__video__title">
						Testimonial 2
					</div>
				</div>
				<div class="col-md-4 wow animated fadeInUp" >
					<iframe width="300" height="200" src="https://www.youtube.com/embed/IwzsXv4sw6k"></iframe>
					<div class="join-us__content-2__video__title">
						Testimonial 3
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- <div class="join-us__content-3 wow animated fadeIn" data-wow-delay="1s">
=======
<!--	<div class="join-us__content-3 wow animated fadeIn" data-wow-delay="1s">
>>>>>>> 9cbabcb1421e4700f63b07aeab2d91536bd919ca
		<div class="container">
			<div class="join-us__content-3__title">Apply today then Empower and Inspires the Nation</div>
			<div class="row">
				

				<div class="col-md-4">
					<div class="join-us__content-3__menu">Creative</div>
					<div class="join-us__content-3__menu">Hardworking</div>
					<div class="join-us__content-3__menu">Culture of Learning</div>
				</div>
				<div class="col-md-4">
					<div class="join-us__content-3__menu">Creative</div>
					<div class="join-us__content-3__menu">Hardworking</div>
					<div class="join-us__content-3__menu">Culture of Learning</div>
				</div>
				<div class="col-md-4">
					<div class="join-us__content-3__menu">Creative</div>
					<div class="join-us__content-3__menu">Hardworking</div>
					<div class="join-us__content-3__menu">Culture of Learning</div>
				</div>
				
				
			</div>
			<div class="join-us__content-3__button">Apply today</div>

		</div>
	</div> -->
</div>
   