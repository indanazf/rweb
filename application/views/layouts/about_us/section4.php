<?php foreach($get_involved as $row){?>
<div class="banner-4" id="involved">
	<div class="col-md-6 u-pad" style="overflow:auto;">
		<div class="banner-overlay wow animated fadeInUp">
	      <img src="<?= base_url('uploads/'.$row->IMG) ?>" style="min-width: 950px;max-width: 950px;">
	    </div>
		<div class="banner-4__content  wow animated fadeIn"  data-wow-delay="0.5s">
			<div class="banner-4__content__title">
				<?=$row->SUBJECT?> 
			</div>

			<div class="banner-4__content__desc">
				<?=$row->CONTENT?> 
				<div class="button__readmore"></div>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-md-6 u-pad">
		<a href="<?php echo site_url('get_involved/join_us') ?>" style="text-decoration: none;">
			<div class="banner-4__join-us wow animated fadeInRight">
				
			</div>
			<div class="banner-4__join-us__circle  wow animated fadeIn" data-wow-delay="0.5s">Join Us</div>
		</a>
		<div>
			<a href="#contact_us">
			<div class="banner-4__contact-us wow animated fadeInUp" data-wow-delay="0.5s">
				<div class="banner-4__contact-us__frame wow animated fadeIn" data-wow-delay="1.5s">
					<div class="banner-4__contact-us__icon">
					</div>
					<div class="banner-4__contact-us__title">
						Contact Us
					</div>
				</div>
			</div>
			</a>
			<a href="<?php echo site_url('get_involved/faq') ?>">
			<div class="banner-4__faq wow animated fadeInUp" data-wow-delay="1s">
				<div class="banner-4__faq__frame wow animated fadeIn" data-wow-delay="2s">
					<div class="banner-4__faq__icon">
					</div>
					<div class="banner-4__faq__title">
						FAQ
					</div>
				</div>
			</div>
			</a>
		</div>
	</div>
	</div>
</div>
<?php }?>