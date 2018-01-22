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
		
            </tr><?php
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>