<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>OUR_PAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID CONTENT <?php echo form_error('ID_CONTENT') ?></td>
            <td><input type="text" class="form-control" name="ID_CONTENT" id="ID_CONTENT" placeholder="ID CONTENT" value="<?php echo $ID_CONTENT; ?>" />
        </td>
	    <tr><td>JUDUL <?php echo form_error('JUDUL') ?></td>
            <td><input type="text" class="form-control" name="JUDUL" id="JUDUL" placeholder="JUDUL" value="<?php echo $JUDUL; ?>" />
        </td>
	    <tr><td>OBJECTIVE <?php echo form_error('OBJECTIVE') ?></td>
            <td><textarea class="form-control" rows="3" name="OBJECTIVE" id="OBJECTIVE" placeholder="OBJECTIVE"><?php echo $OBJECTIVE; ?></textarea>
        </td></tr>
	    <tr><td>MARGIN X <?php echo form_error('MARGIN_X') ?></td>
            <td><input type="text" class="form-control" name="MARGIN_X" id="MARGIN_X" placeholder="MARGIN X" value="<?php echo $MARGIN_X; ?>" />
        </td>
	    <tr><td>MARGIN Y <?php echo form_error('MARGIN_Y') ?></td>
            <td><input type="text" class="form-control" name="MARGIN_Y" id="MARGIN_Y" placeholder="MARGIN Y" value="<?php echo $MARGIN_Y; ?>" />
        </td>
	    <tr><td>LOCATION <?php echo form_error('LOCATION') ?></td>
            <td><input type="text" class="form-control" name="LOCATION" id="LOCATION" placeholder="LOCATION" value="<?php echo $LOCATION; ?>" />
        </td>
	    <tr><td>SECTOR <?php echo form_error('SECTOR') ?></td>
            <td><input type="text" class="form-control" name="SECTOR" id="SECTOR" placeholder="SECTOR" value="<?php echo $SECTOR; ?>" />
        </td>
	    <tr><td>BENEFICIARIES <?php echo form_error('BENEFICIARIES') ?></td>
            <td><input type="text" class="form-control" name="BENEFICIARIES" id="BENEFICIARIES" placeholder="BENEFICIARIES" value="<?php echo $BENEFICIARIES; ?>" />
        </td>
	    <tr><td>VALUE <?php echo form_error('VALUE') ?></td>
            <td><input type="text" class="form-control" name="VALUE" id="VALUE" placeholder="VALUE" value="<?php echo $VALUE; ?>" />
        </td>
	    <tr><td>PARTNER <?php echo form_error('PARTNER') ?></td>
            <td><input type="text" class="form-control" name="PARTNER" id="PARTNER" placeholder="PARTNER" value="<?php echo $PARTNER; ?>" />
        </td>
	    <tr><td>YEAR AWARDED <?php echo form_error('YEAR_AWARDED') ?></td>
            <td><input type="text" class="form-control" name="YEAR_AWARDED" id="YEAR_AWARDED" placeholder="YEAR AWARDED" value="<?php echo $YEAR_AWARDED; ?>" />
        </td>
	    <tr><td>YEAR COMPLETED <?php echo form_error('YEAR_COMPLETED') ?></td>
            <td><input type="text" class="form-control" name="YEAR_COMPLETED" id="YEAR_COMPLETED" placeholder="YEAR COMPLETED" value="<?php echo $YEAR_COMPLETED; ?>" />
        </td>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('our_past') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->