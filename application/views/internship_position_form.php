<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>INTERNSHIP_POSITION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID TYPE <?php echo form_error('ID_TYPE') ?></td>
            <td><input type="text" class="form-control" name="ID_TYPE" id="ID_TYPE" placeholder="ID TYPE" value="<?php echo $ID_TYPE; ?>" />
        </td>
	    <tr><td>TITLE <?php echo form_error('TITLE') ?></td>
            <td><input type="text" class="form-control" name="TITLE" id="TITLE" placeholder="TITLE" value="<?php echo $TITLE; ?>" />
        </td>
	    <tr><td>DETAIL <?php echo form_error('DETAIL') ?></td>
            <td><textarea class="form-control" rows="3" name="DETAIL" id="DETAIL" placeholder="DETAIL"><?php echo $DETAIL; ?></textarea>
        </td></tr>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('internship_position') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->