<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>VOLUNTEER</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
            <tr><td>Position <?php echo form_error('id_position') ?></td>
              <td>
              <select name="id_position" class="form-control" placeholder="Id Position">
                <?php
                $volunteer  = $this->db->get('position_volunteer');
                foreach ($volunteer->result() as $m) {
                  echo "<option value='$m->id_position' ";
                  echo $m->id_position == $id_position ? 'selected' : '';
                  echo">" . strtoupper($m->position) . "</option>";
                }
                ?>
              </select>
              </td></tr>
              <tr><td>Name <?php echo form_error('name') ?></td>
                <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                </td></tr>
                <tr><td>Activity <?php echo form_error('activity') ?></td>
                  <td><input type="text" class="form-control" name="activity" id="activity" placeholder="Activity" value="<?php echo $activity; ?>" />
                  </td></tr>
                  <tr><td>Email <?php echo form_error('email') ?></td>
                    <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                    </td></tr>
                    <tr><td>Phone <?php echo form_error('phone') ?></td>
                      <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                      </td></tr>
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