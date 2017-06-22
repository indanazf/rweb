<script src="<?= base_url() ?>assets/js/function.js"></script>

<div id="fullpage">
	<div class="section active" id="section1">
		
		<?php foreach($about_us as $row){?>
			<div class="slide">
				<div class="banner" id="aboutus">
					<div class="banner-overlay wow animated zoomIn">
						<img src="<?= base_url('uploads/'.$row->IMG) ?>">
					</div>
					<div class="col-md-5 u-pad">
						<div class="banner-1__content">
							<div class="banner-1__content__title  wow animated fadeInUp"><?=$row->SUBJECT?></div>
							<div class="banner-1__content__desc wow animated fadeInUp" data-wow-delay="1s"><?=$row->CONTENT?></div>
							<a href="<?php echo site_url($row->LINK) ?>"><div class="button__readmore"><?=$row->TAGS?></div></a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="slide">
			<?php foreach($team as $t){?>
				<div class="our-team">
					<div class="banner-overlay  wow animated zoomIn">
						<img src="<?= base_url('uploads/'.$t->IMG) ?>">
					</div>
					
					  <div class="our-team__content">
					    <div class="our-team__content__title"><?=$t->SUBJECT?></div>
					    <div class="our-team__content__desc"><?=$t->CONTENT?></div>
					    <a href="<?php echo site_url($t->LINK) ?>"><span class="our-team__content__button"><?=$t->TAGS?></span></a>
					  </div>
					 
				</div>
			<?php }?>
		</div>
		<div class="slide">
			<?php foreach($executive as $e){?>
				<div class="our-executive">
					<div class="banner-overlay wow animated zoomIn">
						<img src="<?= base_url('uploads/'.$e->IMG) ?>">
					</div>
					
					<div class="container">
					  <div class="our-executive__content">
					    <div class="our-executive__content__title"><?=$e->SUBJECT?></div>
					    <br>
					    <br>
					    <br>
					    <br>
					    <div class="our-executive__content__subtitle"><?=$e->SUBTITLE?></div>
					    <div class="our-executive__content__desc"><?=$e->CONTENT?></div>
					    <a href="<?php echo site_url($e->LINK) ?>"><span class="our-executive__content__button"><?=$e->TAGS?></span></a>
					  </div>
					</div>
				</div>
			<?php }?>
		</div>
		
	</div>
</div>

