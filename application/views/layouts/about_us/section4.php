<?php foreach($get_involved as $row){?>
<div class="banner-4" id="involved">
	<div class="col-md-6 u-pad" style="overflow:auto;">
		<div class="banner-overlay">
      <img src="<?= base_url('uploads/'.$row->IMG) ?>" style="min-width: 950px;max-width: 950px;">
    </div>
		<div class="banner-4__content">
			<div class="banner-4__content__title">
				<?=$row->SUBJECT?> 
			</div>

			<div class="banner-4__content__desc">
				<?=$row->CONTENT?> 
				<div class="button__readmore"></div>
			</div>
		</div>
	</div>
		
	<div class="col-md-6 u-pad">
		<a href="<?php echo site_url('get_involved/join_us') ?>" style="text-decoration: none;">
		<div class="banner-4__join-us">
			<div class="banner-4__join-us__circle" >Join Us</div>
		</div>
		</a>
		<div>
			<a href="#contact_us">
			<div class="banner-4__contact-us">
				<div class="banner-4__contact-us__icon">
				</div>
				<div class="banner-4__contact-us__title">
					Contact Us
				</div>
			</div>
			</a>
			<a href="<?php echo site_url('get_involved/faq') ?>">
			<div class="banner-4__faq">
				<div class="banner-4__faq__icon">
				</div>
				<div class="banner-4__faq__title">
					FAQ
				</div>
			</div>
			</a>
		</div>
	</div>
</div>
<?php }?>