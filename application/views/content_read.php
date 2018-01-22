
<!-- Main content -->
<section class='content'>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='box'>
				<div class='box-header'>
					<h3 class='box-title'>Content Read</h3>
					<table class="table table-bordered">
						<tr><td>CONTENT TYPE</td><td><?php echo $TYPE; ?></td></tr>
						<tr><td>CONTENT CATEGORY</td><td><?php echo $CATEGORY; ?></td></tr>
						<tr><td>SUBJECT</td><td><?php echo $SUBJECT; ?></td></tr>
						<tr><td>CONTENT</td><td><?php echo $CONTENT; ?></td></tr>
						<tr><td>CONTENT NUMMBER</td><td><?php echo $CONTENT_NUMMBER; ?></td></tr>
						<tr><td>TAGS</td><td><?php echo $TAGS; ?></td></tr>
						<tr><td>CREATED BY</td><td><?php echo $CREATED_BY; ?></td></tr>
						<tr><td>CREATED DATE</td><td><?php echo $CREATED_DATE; ?></td></tr>
						<tr><td>UPDATE BY</td><td><?php echo $UPDATE_BY; ?></td></tr>
						<tr><td>LAST UPDATE</td><td><?php echo $LAST_UPDATE; ?></td></tr>
						<tr><td>ICON TYPE</td><td><?php echo $ICON_TYPE; ?></td></tr>
						<tr><td>IMG</td><td><?php echo $IMG; ?></td></tr>
						<tr><td></td><td><a href="<?php echo site_url($page.'/admin'); ?>" class="btn btn-default">Back</a></td></tr>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</section><!-- /.content -->