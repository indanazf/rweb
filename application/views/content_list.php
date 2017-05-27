
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>CONTENT LIST</h3><div class='pull-right'>
				  <?php echo anchor('content/create/','<i class="fa fa-plus"></i> Create',array('class'=>'btn btn-default btn-sm'));?>
		<?php echo anchor(site_url('content/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('content/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('content/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-warning btn-sm"'); ?></div>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>ID TYPE</th>
		    <th>ID CATEGORY</th>
		    <th>SUBJECT</th>
		    <th>CONTENT</th>
		    <th>CONTENT NUMMBER</th>
		    <th>TAGS</th>
		    <th>CREATED BY</th>
		    <th>CREATED DATE</th>
		    <th>UPDATE BY</th>
		    <th>LAST UPDATE</th>
		    <th>ICON TYPE</th>
		    <th>IMG</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($content_data as $content)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $content->ID_TYPE ?></td>
		    <td><?php echo $content->ID_CATEGORY ?></td>
		    <td><?php echo $content->SUBJECT ?></td>
		    <td><?php echo $content->CONTENT ?></td>
		    <td><?php echo $content->CONTENT_NUMMBER ?></td>
		    <td><?php echo $content->TAGS ?></td>
		    <td><?php echo $content->CREATED_BY ?></td>
		    <td><?php echo $content->CREATED_DATE ?></td>
		    <td><?php echo $content->UPDATE_BY ?></td>
		    <td><?php echo $content->LAST_UPDATE ?></td>
		    <td><?php echo $content->ICON_TYPE ?></td>
		    <td><?php echo $content->IMG ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('content/read/'.$content->ID_CONTENT),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			echo anchor(site_url('content/update/'.$content->ID_CONTENT),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('content/delete/'.$content->ID_CONTENT),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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