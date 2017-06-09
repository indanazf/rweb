<?php foreach($get_involved as $row){?>
<div class="banner-4">
	<div class="col-md-6 u-pad">
		<div class="banner-overlay">
      <img src="<?= base_url('uploads/'.$row->IMG) ?>">
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
		<div class="banner-4__join-us">
			<div class="banner-4__join-us__circle">Join Us</div>
		</div>
		<div>
			<div class="banner-4__contact-us">
				<div class="banner-4__contact-us__icon">
				</div>
				<div class="banner-4__contact-us__title">
					Contact Us
				</div>
			</div>
			<div class="banner-4__faq">
				<div class="banner-4__faq__icon">
				</div>
				<div class="banner-4__faq__title">
					FAQ
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>