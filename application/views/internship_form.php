<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>INTERNSHIP</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID <?php echo form_error('ID') ?></td>
            <td><input type="text" class="form-control" name="ID" id="ID" placeholder="ID" value="<?php echo $ID; ?>" />
        </td>
	    <tr><td>NAME <?php echo form_error('NAME') ?></td>
            <td><input type="text" class="form-control" name="NAME" id="NAME" placeholder="NAME" value="<?php echo $NAME; ?>" />
        </td>
	    <tr><td>UNIVERSITY <?php echo form_error('UNIVERSITY') ?></td>
            <td><input type="text" class="form-control" name="UNIVERSITY" id="UNIVERSITY" placeholder="UNIVERSITY" value="<?php echo $UNIVERSITY; ?>" />
        </td>
	    <tr><td>SKILL <?php echo form_error('SKILL') ?></td>
            <td><input type="text" class="form-control" name="SKILL" id="SKILL" placeholder="SKILL" value="<?php echo $SKILL; ?>" />
        </td>
	    <tr><td>EMAIL <?php echo form_error('EMAIL') ?></td>
            <td><input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" value="<?php echo $EMAIL; ?>" />
        </td>
	    <tr><td>PHONE <?php echo form_error('PHONE') ?></td>
            <td><input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="PHONE" value="<?php echo $PHONE; ?>" />
        </td>
	    <tr><td>MOTIVATION <?php echo form_error('MOTIVATION') ?></td>
            <td><textarea class="form-control" rows="3" name="MOTIVATION" id="MOTIVATION" placeholder="MOTIVATION"><?php echo $MOTIVATION; ?></textarea>
        </td></tr>
	    <tr><td>ID POSITION <?php echo form_error('ID_POSITION') ?></td>
            <td><input type="text" class="form-control" name="ID_POSITION" id="ID_POSITION" placeholder="ID POSITION" value="<?php echo $ID_POSITION; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('internship') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->