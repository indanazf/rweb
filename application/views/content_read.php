
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Content Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Type</td><td><?php echo $id_type; ?></td></tr>
	    <tr><td>Id Category</td><td><?php echo $id_category; ?></td></tr>
	    <tr><td>Subject</td><td><?php echo $subject; ?></td></tr>
	    <tr><td>Content</td><td><?php echo $content; ?></td></tr>
	    <tr><td>Tags</td><td><?php echo $tags; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Last Update</td><td><?php echo $last_update; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('content') ?>" class="btn btn-default">Back</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->