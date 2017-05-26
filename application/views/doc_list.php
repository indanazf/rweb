<!-- Main content -->
<section class='content'>
    <div class='row'>

        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <!--<h3 class="box-title">Pencarian</h3>-->
                </div>
                <form action="<?= site_url('doc/index') ?>" method="post" enctype="multipart/form-data">
                    <div class='box-body'>
                        <div class='col-xs-3'>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?= $nik ?>">
                            </div>
                        </div>
                        <div class='col-xs-3'>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $nama ?>">
                            </div>
                        </div>
                        <div class='col-xs-3'>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <select class="form-control" name="id_company">
                                    <option value="" disabled selected>-- Company --</option>
                                    <?php foreach ($company as $row) { ?>
                                        <option value="<?= $row->id_company ?>" <?php if ($id_company == $row->id_company) echo "selected" ?>><?= $row->company ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>                        
                        <div class='col-xs-3'>
                            <div class="form-group">
                                <label for="company">Jenis Dokumen</label>
                                <select class="form-control" name="id_jenis_doc">
                                    <option value="" disabled selected>-- Jenis Document --</option>
                                    <?php foreach ($jenis as $row) { ?>
                                        <option value="<?= $row->id_jenis_doc ?>" <?php if ($id_jenis_doc == $row->id_jenis_doc) echo "selected" ?>><?= $row->jenis_doc ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <input type="submit" class="btn btn-info pull-right" style="margin-left: 8px;" value="Search" name="search">
                        <a href="<?= site_url('doc') ?>" class="btn btn-default pull-right">Reset</a>
                    </div>
                </form>
            </div>
        </div>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        <?php if($id_partisipan)echo anchor('doc/create/' . $id_partisipan, 'Create', array('class' => 'btn btn-danger btn-sm')); ?>
                        <?php echo anchor(site_url('doc/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
                        <?php echo anchor(site_url('doc/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                        <?php echo anchor(site_url('doc/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-warning btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Company Type</th>
                                <th>Company</th>
                                <th>Jenis Dokumen</th>
                                <th>Date</th>
                                <th>Created Date</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($doc_data as $doc) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><a href="<?= site_url('doc/partisipan/' . $doc->id_partisipan) ?>"><?php echo $doc->nik ?></a></td>
                                    <td><a href="<?= site_url('doc/partisipan/' . $doc->id_partisipan) ?>"><?php echo $doc->nama ?></a></td>
                                    <td><a href="<?= site_url('doc/company_type/' . $doc->id_company_type) ?>"><?php echo $doc->company_type ?></a></td>
                                    <td><a href="<?= site_url('doc/company/' . $doc->id_company) ?>"><?php echo $doc->company ?></a></td>
                                    <td><a href="<?= site_url('doc/jenis_doc/' . $doc->id_jenis_doc) ?>"><?php echo $doc->jenis_doc ?></a></td>
                                    <td><?php echo $doc->date ?></td>
                                    <td><?php echo $doc->created_date ?></td>
                                    <td><a href="<?php echo site_url('doc/download/' . $doc->path) ?>"><i class="fa fa-file"></i></a></td>
                                    <td style="text-align:center" width="140px">
                                        <?php
                                        echo anchor(site_url('doc/read/' . $doc->id_doc), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-danger btn-sm'));
                                        echo '  ';
                                        echo anchor(site_url('doc/update/' . $doc->id_doc), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-danger btn-sm'));
                                        echo '  ';
                                        echo anchor(site_url('doc/delete/' . $doc->id_doc), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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