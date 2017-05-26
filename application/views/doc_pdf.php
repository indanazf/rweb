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
        <h2>List Dokumen</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Company Type</th>
                <th>Company</th>
                <th>Jenis Dokumen</th>
                <th>Nama File</th>
                <th>Date</th>
                <th>Created Date</th>

            </tr><?php
            foreach ($doc_data as $doc) {
                ?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $doc->nama ?></td>
                    <td><?php echo $doc->company_type ?></td>
                    <td><?php echo $doc->company ?></td>
                    <td><?php echo $doc->jenis_doc ?></td>
                    <td><?php echo $doc->path ?></td>
                    <td><?php echo $doc->date ?></td>
                    <td><?php echo $doc->created_date ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>