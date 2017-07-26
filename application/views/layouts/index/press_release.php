<div class="container">
	<div class="press-release__title">Press Release</div>
	<?php for($i=0;$i<=3;$i++){ ?>
	<div class="press-release__content">
		<div class="col-md-4">
			<a href="<?php echo site_url('newsroom/detail_press_release') ?>"><div class="press-release__content__img"><img src="<?= base_url('assets/images/sample-background.jpg') ?>"></div></a>
		</div>
		<div class="col-md-8">
			<div class="press-release__content__date">7/10/17</div>
			<a href="<?php echo site_url('newsroom/detail_press_release') ?>"><div class="press-release__content__title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div></a>
			<div class="press-release__content__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
	}
	?>
</div>