<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CAREER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Title <?php echo form_error('title') ?></td>
            <td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </td>
	    <tr><td>Subtitle <?php echo form_error('subtitle') ?></td>
            <td><textarea class="form-control" rows="3" name="subtitle" id="subtitle" placeholder="Subtitle"><?php echo $subtitle; ?></textarea>
        </td></tr>
	    <tr><td>Descriptions <?php echo form_error('descriptions') ?></td>
            <td><textarea class="form-control" rows="3" name="descriptions" id="descriptions" placeholder="Descriptions"><?php echo $descriptions; ?></textarea>
        </td></tr>
	    <tr><td>Jobdesc <?php echo form_error('jobdesc') ?></td>
            <td><textarea class="form-control" rows="3" name="jobdesc" id="jobdesc" placeholder="Jobdesc"><?php echo $jobdesc; ?></textarea>
        </td></tr>
	    <tr><td>Benefits <?php echo form_error('benefits') ?></td>
            <td><textarea class="form-control" rows="3" name="benefits" id="benefits" placeholder="Benefits"><?php echo $benefits; ?></textarea>
        </td></tr>
	    <tr><td>Requirements <?php echo form_error('requirements') ?></td>
            <td><textarea class="form-control" rows="3" name="requirements" id="requirements" placeholder="Requirements"><?php echo $requirements; ?></textarea>
        </td></tr>
	    <tr><td>Positions Available <?php echo form_error('positions_available') ?></td>
            <td><input type="text" class="form-control" name="positions_available" id="positions_available" placeholder="Positions Available" value="<?php echo $positions_available; ?>" />
        </td>
	    <tr><td>Deadline <?php echo form_error('deadline') ?></td>
            <td><input type="text" class="form-control" name="deadline" id="deadline" placeholder="Deadline" value="<?php echo $deadline; ?>" />
        </td>
	    <tr><td>Image <?php echo form_error('image') ?></td>
            <td><input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('career') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->