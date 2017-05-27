<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTENT_IMAGE</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID CONTENT <?php echo form_error('ID_CONTENT') ?></td>
            <td><input type="text" class="form-control" name="ID_CONTENT" id="ID_CONTENT" placeholder="ID CONTENT" value="<?php echo $ID_CONTENT; ?>" />
        </td>
	    <tr><td>IMAGE <?php echo form_error('IMAGE') ?></td>
            <td><input type="text" class="form-control" name="IMAGE" id="IMAGE" placeholder="IMAGE" value="<?php echo $IMAGE; ?>" />
        </td>
	    <tr><td>THUMBNAIL <?php echo form_error('THUMBNAIL') ?></td>
            <td><input type="text" class="form-control" name="THUMBNAIL" id="THUMBNAIL" placeholder="THUMBNAIL" value="<?php echo $THUMBNAIL; ?>" />
        </td>
	    <tr><td>NAME CONTACT <?php echo form_error('NAME_CONTACT') ?></td>
            <td><input type="text" class="form-control" name="NAME_CONTACT" id="NAME_CONTACT" placeholder="NAME CONTACT" value="<?php echo $NAME_CONTACT; ?>" />
        </td>
	    <input type="hidden" name="ID_IMAGE" value="<?php echo $ID_IMAGE; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content_image') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->