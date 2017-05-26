
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><?php echo anchor('partisipan/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('partisipan/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('partisipan/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('partisipan/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-warning btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>NIK</th>
		    <th>Nama</th>
		    <th>Company Type</th>
		    <th>Company</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($partisipan_data as $partisipan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
                    <td><a href="<?=site_url('doc/partisipan/'.$partisipan->id_partisipan)?>"><?php echo $partisipan->nik ?></a></td>
                    <td><a href="<?=site_url('doc/partisipan/'.$partisipan->id_partisipan)?>"><?php echo $partisipan->nama ?></a></td>
                    <td><a href="<?=site_url('doc/company_type/'.$partisipan->id_company_type)?>"><?php echo $partisipan->company_type ?></a></td>
                    <td><a href="<?=site_url('doc/company/'.$partisipan->id_company)?>"><?php echo $partisipan->company ?></a></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('partisipan/read/'.$partisipan->id_partisipan),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('partisipan/update/'.$partisipan->id_partisipan),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('partisipan/delete/'.$partisipan->id_partisipan),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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