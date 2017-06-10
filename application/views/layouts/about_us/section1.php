<div id="myCarousel" class="banner carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>
<?php foreach($about_us as $row){?>
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	<div class="col-md-5 u-pad">
		<div class="banner-1__content">
			<div class="banner-1__content__title"><?=$row->SUBJECT?></div>
			<div class="banner-1__content__desc"><?=$row->CONTENT?></div>
			<a href="<?php echo site_url($row->LINK) ?>"><div class="button__readmore__long"><?=$row->TAGS?></div></a>
		</div>
	</div>
<?php } ?>
</div>
