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
        <h2>Internship List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID</th>
		<th>NAME</th>
		<th>UNIVERSITY</th>
		<th>SKILL</th>
		<th>EMAIL</th>
		<th>PHONE</th>
		<th>MOTIVATION</th>
		<th>ID POSITION</th>
		
            </tr><?php
            foreach ($internship_data as $internship)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $internship->ID ?></td>
		      <td><?php echo $internship->NAME ?></td>
		      <td><?php echo $internship->UNIVERSITY ?></td>
		      <td><?php echo $internship->SKILL ?></td>
		      <td><?php echo $internship->EMAIL ?></td>
		      <td><?php echo $internship->PHONE ?></td>
		      <td><?php echo $internship->MOTIVATION ?></td>
		      <td><?php echo $internship->ID_POSITION ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>