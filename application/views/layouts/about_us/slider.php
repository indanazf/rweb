		<?php 
		$index__slider = 1;
		foreach($about_us as $row){
		if($index__slider == 1){
		?>
			<div class="slide">
 				<div class="banner" id="aboutus">
 					<div class="banner-overlay__slider__animate" id="banner-overlay__slider__animate-<?=$index__slider?>">
 						<img src="<?= base_url('uploads/'.$row->IMG) ?>">
 					</div>
 					<div class="col-md-5 u-pad">
 						<div class="banner-1__content" id="banner-1__content__animate-<?=$index__slider?>">
 							<div class="banner-1__content__title  wow animated fadeInUp" id="banner-1__content__title__animate-<?=$index__slider?>"><?=$row->SUBJECT?></div>
 							<div class="banner-1__content__desc wow animated fadeInUp" data-wow-delay="1s" id="banner-1__content__desc__animate-<?=$index__slider?>"><?=$row->CONTENT?></div>
 							<a href="<?php echo site_url($row->LINK) ?>"><div class="button__readmore"><?=$row->TAGS?></div></a>
 						</div>
 					</div>
 				</div>
 			</div>
		<?php
		} else {
		?>
		
			<div class="slide">
				<div class="banner" id="aboutus">
					<div class="banner-overlay__slider__animate" id="banner-overlay__slider__animate-<?=$index__slider?>">
						<img src="<?= base_url('uploads/'.$row->IMG) ?>" class="banner-overlay__slider__img">
					</div>
					<div class="col-md-5 u-pad">
						<div class="banner-1__content banner-1__content__animate" id="banner-1__content__animate-<?=$index__slider?>">
							<div class="banner-1__content__title banner-1__content__title__animate" id="banner-1__content__title__animate-<?=$index__slider?>"><?=$row->SUBJECT?></div>
							<div class="banner-1__content__desc banner-1__content__desc__animate" id="banner-1__content__desc__animate-<?=$index__slider?>"><?=$row->CONTENT?></div>
							<a href="<?php echo site_url($row->LINK) ?>"><div class="button__readmore"><?=$row->TAGS?></div></a>
						</div>
					</div>
				</div>
			</div>
		<?php 
		}
		$index__slider++;
		} ?>
		
		<div class="slide">
			<?php foreach($team as $t){?>
				<div class="our-team">
					<div class="banner-overlay__slider__animate" id="banner-overlay__slider__animate-4">
						<img src="<?= base_url('uploads/'.$t->IMG) ?>" class="banner-overlay__slider__img">
					</div>
					
					  <div class="our-team__content our-team__content__animate" id="our-team__content__animate">
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
					<div class="banner-overlay__slider__animate" id="banner-overlay__slider__animate-5">
						<img src="<?= base_url('uploads/'.$e->IMG) ?>" class="banner-overlay__slider__img">
					</div>
					
					<div class="container">
					  <div class="our-executive__content our-executive__content__animate" id="our-executive__content__animate">
					    <div class="our-executive__content__title"><?=$e->SUBJECT?></div>
					    <div class="our-executive__content__subtitle"><?=$e->SUBTITLE?></div>
					    <div class="our-executive__content__desc"><?=$e->CONTENT?></div>
					    <a href="<?php echo site_url($e->LINK) ?>"><span class="our-executive__content__button"><?=$e->TAGS?></span></a>
					  </div>
					</div>
				</div>
			<?php }?>
		</div>