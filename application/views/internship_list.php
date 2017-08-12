
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>INTERNSHIP LIST</h3><div class='pull-right'>
				  <?php echo anchor('internship/create/','<i class="fa fa-plus"></i> Create',array('class'=>'btn btn-default btn-sm'));?>
		<?php echo anchor(site_url('internship/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('internship/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('internship/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-warning btn-sm"'); ?></div>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>NAME</th>
		    <th>UNIVERSITY</th>
		    <th>SKILL</th>
		    <th>EMAIL</th>
		    <th>PHONE</th>
		    <th>MOTIVATION</th>
		    <th>POSITION</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($internship_data as $internship)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $internship->NAME ?></td>
		    <td><?php echo $internship->UNIVERSITY ?></td>
		    <td><?php echo $internship->SKILL ?></td>
		    <td><?php echo $internship->EMAIL ?></td>
		    <td><?php echo $internship->PHONE ?></td>
		    <td><?php echo $internship->MOTIVATION ?></td>
		    <td><?php echo $internship->TITLE ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('internship/read/'.$internship->ID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			echo anchor(site_url('internship/update/'.$internship->ID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('internship/delete/'.$internship->ID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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