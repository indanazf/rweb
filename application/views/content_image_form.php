<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTENT_IMAGE</h3>
                      <div class='box box-primary'>
       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
	    <tr><td>CONTENT <?php echo form_error('ID_CONTENT') ?></td>
            <td>
            <select name="ID_CONTENT" id="ID_CONTENT" class="form-control" disabled="">
                    <option value=''></option>
                    <?php
                        $cat = $this->db->get('content');
                        foreach ($cat->result() as $c){
                            echo "<option value='$c->ID_CONTENT' ";
                            echo $c->ID_CONTENT==$ID_CONTENT?'selected':'';
                            echo">".  strtoupper($c->SUBJECT)."</option>";
                        }
                    ?>
                </select>
        </td>
	    <tr><td>IMAGE <?php echo form_error('IMAGE') ?></td>
            <td> <input type="file" class="form-control" name="IMAGE" id="IMAGE" placeholder="IMAGE" value="<?php echo $IMAGE; ?>" size="20" />
        </td>
	    <tr><td> NAME <?php echo form_error('NAME_IMAGE') ?></td>
            <td><input type="text" class="form-control" name="NAME_IMAGE" id="NAME_IMAGE" placeholder="NAME IMAGE" value="<?php echo $NAME_IMAGE; ?>" />
        </td>
	    <tr><td><?php if($PAGE=="our_team"){echo"JABATAN";}else{echo"INFO";} ?> <?php echo form_error('INFO') ?></td>
            <td><input type="text" class="form-control" name="INFO" id="INFO" placeholder="<?php if($PAGE=="our_team"){echo"JABATAN";}else{echo"INFO";} ?>" value="<?php echo $INFO; ?>" />
        </td>
      <input type="hidden" name="ID_IMAGE" value="<?php echo $ID_IMAGE; ?>" /> 
      <input type="hidden" name="ID_CONTENT" value="<?php echo $ID_CONTENT; ?>" /> 
	    <input type="hidden" name="PAGE" value="<?php echo $PAGE; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content_image') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->