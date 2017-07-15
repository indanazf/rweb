<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>VOLUNTEER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Position <?php echo form_error('id_position') ?></td>
            <td><input type="text" class="form-control" name="id_position" id="id_position" placeholder="Id Position" value="<?php echo $id_position; ?>" />
        </td>
	    <tr><td>Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <tr><td>Activity <?php echo form_error('activity') ?></td>
            <td><input type="text" class="form-control" name="activity" id="activity" placeholder="Activity" value="<?php echo $activity; ?>" />
        </td>
	    <tr><td>Email <?php echo form_error('email') ?></td>
            <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </td>
	    <tr><td>Phone <?php echo form_error('phone') ?></td>
            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </td>
	    <tr><td>Motivation <?php echo form_error('motivation') ?></td>
            <td><textarea class="form-control" rows="3" name="motivation" id="motivation" placeholder="Motivation"><?php echo $motivation; ?></textarea>
        </td></tr>
	    <input type="hidden" name="id_volunteer" value="<?php echo $id_volunteer; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('volunteer') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->