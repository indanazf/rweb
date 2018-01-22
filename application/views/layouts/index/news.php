<div class="container">
	<div class="press-release__title">News</div>
	<?php foreach($row as $row){?>
	<div class="press-release__content">
		<div class="col-md-4">
			<a href="<?php echo site_url('newsroom/detail_news/'.$row->ID_CONTENT) ?>">
			<div class="press-release__content__img"><img src="<?= base_url('uploads/'.$row->IMG) ?>"></div></a>
		</div>
		<div class="col-md-8">
			<div class="press-release__content__date"><?=$row->LAST_UPDATE?></div>
			<a href="<?php echo site_url('newsroom/detail_press_release/'.$row->ID_CONTENT) ?>">
			<div class="press-release__content__title"><?=$row->SUBJECT?></div></a>
			<div class="press-release__content__desc"><?=$row->CONTENT?></div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
	}
	?>
</div>