<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTACT_US</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>NAME CONTACT <?php echo form_error('NAME_CONTACT') ?></td>
            <td><input type="text" class="form-control" name="NAME_CONTACT" id="NAME_CONTACT" placeholder="NAME CONTACT" value="<?php echo $NAME_CONTACT; ?>" />
        </td>
	    <tr><td>NO CONTACT <?php echo form_error('NO_CONTACT') ?></td>
            <td><input type="text" class="form-control" name="NO_CONTACT" id="NO_CONTACT" placeholder="NO CONTACT" value="<?php echo $NO_CONTACT; ?>" />
        </td>
	    <tr><td>EMAIL <?php echo form_error('EMAIL') ?></td>
            <td><input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" value="<?php echo $EMAIL; ?>" />
        </td>
	    <tr><td>TEXT <?php echo form_error('TEXT') ?></td>
            <td><textarea class="form-control" rows="3" name="TEXT" id="TEXT" placeholder="TEXT"><?php echo $TEXT; ?></textarea>
        </td></tr>
	    <input type="hidden" name="ID_CONTACT" value="<?php echo $ID_CONTACT; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('contact_us') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->