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
        <h2>Career List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Title</th>
		<th>Subtitle</th>
		<th>Descriptions</th>
		<th>Jobdesc</th>
		<th>Benefits</th>
		<th>Requirements</th>
		<th>Positions Available</th>
		<th>Deadline</th>
		<th>Image</th>
		
            </tr><?php
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>