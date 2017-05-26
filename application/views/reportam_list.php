
<!-- Main content -->
<section class='content'>
    <div class='row'>

        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <div class="callout callout-warning">
                        <h4>Warning!</h4>
                        Harap download format rekap sebelum menguploadnya ke aplikasi melalui link berikut ini : <a href="<?= base_url() ?>uploads/example/CONTOH_INFOMEDIA.xls"><?= base_url() ?>uploads/example/CONTOH_INFOMEDIA.xls</a>
                    </div>
                </div>
                <form action="<?= site_url('reportam/import') ?>" method="post" enctype="multipart/form-data">
                    <div class='box-body'>
                        <div class='col-xs-3'>
                            <div class="form-group">
                                <label for="rekap">File Rekap</label>
                                <input type="file" class="form-control" id="rekap" name="rekap" placeholder="rekap">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-info pull-right" style="margin-left: 8px;" value="Submit" name="submit">
                        <a href="<?= site_url('reportam') ?>" class="btn btn-default pull-right">Reset</a>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($rekap) { ?>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>
                            <form action="<?= site_url('reportam/export'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" required="required" id="rekap" class="form-control" name="rekap" value="<?php echo htmlentities(serialize($rekap)); ?>">
                                <input type="submit" name="excel" value="Excel" class="btn btn-success btn-sm">
    <!--                                <input type="submit" name="word" value="Word" class="btn btn-primary btn-sm">
                                <input type="submit" name="pdf" value="PDF" class="btn btn-warning btn-sm">-->
                            </form>
                        </h3> 
                    </div><!-- /.box-header -->
                    <div class='box-body' style="overflow-y: scroll;">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px" rowspan="2">No</th>
                                    <th  rowspan="2">NAMA</th>
                                    <th rowspan="2">NIK</th>
                                    <th rowspan="2">ANGKATAN</th>
                                    <th rowspan="2">TANGGAL</th>
                                    <th colspan="13" style="text-align: center">KOMPETENSI</th>
                                    <th colspan="2" style="text-align: center">HATS</th>
                                    <th rowspan="2">PLATINUM</th>
                                    <th rowspan="2">GOLD</th>
                                    <th rowspan="2">SILVER</th>
                                    <th rowspan="2">BRONZE</th>
                                    <th rowspan="2">BUSOL</th>
                                    <th rowspan="2">FINAL PLATINUM</th>
                                    <th rowspan="2">FINAL GOLD</th>
                                    <th rowspan="2">FINAL SILVER</th>
                                    <th rowspan="2">FINAL BRONZE</th>
                                    <th rowspan="2">FINAL BUSOL</th>
                                </tr>
                                <tr>
                                    <th>NET</th>
                                    <th>BAC</th>
                                    <th>AT</th>
                                    <th>BP</th>
                                    <th>AO</th>
                                    <th>TW</th>
                                    <th>RT</th>
                                    <th>CREA</th>
                                    <th>PRE</th>
                                    <th>TFS</th>
                                    <th>CT</th>
                                    <th>NEG</th>
                                    <th>AM</th>
                                    <th>AM</th>
                                    <th>BUSOL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($rekap as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td><?php echo $row['B'] ?></td>
                                        <td><?php echo $row['C'] ?></td>
                                        <td><?php echo $row['D'] ?></td>
                                        <td><?php echo $row['E'] ?></td>
                                        <td><?php echo $row['F'] ?></td>
                                        <td><?php echo $row['G'] ?></td>
                                        <td><?php echo $row['H'] ?></td>
                                        <td><?php echo $row['I'] ?></td>
                                        <td><?php echo $row['J'] ?></td>
                                        <td><?php echo $row['K'] ?></td>
                                        <td><?php echo $row['L'] ?></td>
                                        <td><?php echo $row['M'] ?></td>
                                        <td><?php echo $row['N'] ?></td>
                                        <td><?php echo $row['O'] ?></td>
                                        <td><?php echo $row['P'] ?></td>
                                        <td><?php echo $row['Q'] ?></td>
                                        <td><?php echo $row['R'] ?></td>
                                        <td><?php echo $row['S'] ?></td>
                                        <td><?php echo $row['T'] ?></td>
                                        <td><?php echo $row['U'] ?></td>
                                        <td><?php echo $row['V'] ?></td>
                                        <td><?php echo $row['W'] ?></td>
                                        <td><?php echo $row['X'] ?></td>
                                        <td><?php echo $row['Y'] ?></td>
                                        <td><?php echo $row['Z'] ?></td>
                                        <td><?php echo $row['AA'] ?></td>
                                        <td><?php echo $row['AB'] ?></td>
                                        <td><?php echo $row['AC'] ?></td>
                                        <td><?php echo $row['AD'] ?></td>
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
                            $('#mytable').dataTable({
                                "pageLength": 100
                            });
                        </script>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        <?php } ?>
    </div><!-- /.row -->
</section><!-- /.content -->