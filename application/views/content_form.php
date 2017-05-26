<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTENT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Type <?php echo form_error('id_type') ?></td>
            <td><input type="text" class="form-control" name="id_type" id="id_type" placeholder="Id Type" value="<?php echo $id_type; ?>" />
        </td>
	    <tr><td>Id Category <?php echo form_error('id_category') ?></td>
            <td><input type="text" class="form-control" name="id_category" id="id_category" placeholder="Id Category" value="<?php echo $id_category; ?>" />
        </td>
	    <tr><td>Subject <?php echo form_error('subject') ?></td>
            <td><textarea class="form-control" rows="3" name="subject" id="subject" placeholder="Subject"><?php echo $subject; ?></textarea>
        </td></tr>
	    <tr><td>Content <?php echo form_error('content') ?></td>
            <td><textarea class="form-control" rows="3" name="content" id="content" placeholder="Content"><?php echo $content; ?></textarea>
        </td></tr>
	    <tr><td>Tags <?php echo form_error('tags') ?></td>
            <td><input type="text" class="form-control" name="tags" id="tags" placeholder="Tags" value="<?php echo $tags; ?>" />
        </td>
	    <tr><td>Created Date <?php echo form_error('created_date') ?></td>
            <td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </td>
	    <tr><td>Created By <?php echo form_error('created_by') ?></td>
            <td><textarea class="form-control" rows="3" name="created_by" id="created_by" placeholder="Created By"><?php echo $created_by; ?></textarea>
        </td></tr>
	    <tr><td>Last Update <?php echo form_error('last_update') ?></td>
            <td><input type="text" class="form-control" name="last_update" id="last_update" placeholder="Last Update" value="<?php echo $last_update; ?>" />
        </td>
	    <input type="hidden" name="id_content" value="<?php echo $id_content; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->