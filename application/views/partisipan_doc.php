<!doctype html>
<html>
    <head>
        <title>ACI</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>List Peserta</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Company Type</th>
		<th>Company</th>
		
            </tr><?php
            foreach ($partisipan_data as $partisipan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $partisipan->nik ?></td>
		      <td><?php echo $partisipan->nama ?></td>
		      <td><?php echo $partisipan->company_type ?></td>
		      <td><?php echo $partisipan->company ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>