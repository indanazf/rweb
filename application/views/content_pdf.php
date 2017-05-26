<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Content List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Type</th>
		<th>Id Category</th>
		<th>Subject</th>
		<th>Content</th>
		<th>Tags</th>
		<th>Created Date</th>
		<th>Created By</th>
		<th>Last Update</th>
		
            </tr><?php
            foreach ($content_data as $content)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $content->id_type ?></td>
		      <td><?php echo $content->id_category ?></td>
		      <td><?php echo $content->subject ?></td>
		      <td><?php echo $content->content ?></td>
		      <td><?php echo $content->tags ?></td>
		      <td><?php echo $content->created_date ?></td>
		      <td><?php echo $content->created_by ?></td>
		      <td><?php echo $content->last_update ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>