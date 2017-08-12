
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>CAREER LIST</h3><div class='pull-right'>
				  <?php echo anchor('career/create/','<i class="fa fa-plus"></i> Create',array('class'=>'btn btn-default btn-sm'));?>
		<?php echo anchor(site_url('career/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('career/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('career/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-warning btn-sm"'); ?></div>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Title</th>
		    <th>Subtitle</th>
		    <th>Descriptions</th>
		    <th>Jobdesc</th>
		    <th>Benefits</th>
		    <th>Requirements</th>
		    <th>Positions Available</th>
		    <th>Deadline</th>
		    <th>Image</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($career_data as $career)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $career->title ?></td>
		    <td><?php echo $career->subtitle ?></td>
		    <td><?php echo $career->descriptions ?></td>
		    <td><?php echo $career->jobdesc ?></td>
		    <td><?php echo $career->benefits ?></td>
		    <td><?php echo $career->requirements ?></td>
		    <td><?php echo $career->positions_available ?></td>
		    <td><?php echo $career->deadline ?></td>
		    <td><?php echo $career->image ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('career/read/'.$career->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			echo anchor(site_url('career/update/'.$career->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('career/delete/'.$career->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->