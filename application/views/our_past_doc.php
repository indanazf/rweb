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
        <h2>Our_past List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID CONTENT</th>
		<th>JUDUL</th>
		<th>OBJECTIVE</th>
		<th>MARGIN X</th>
		<th>MARGIN Y</th>
		<th>LOCATION</th>
		<th>SECTOR</th>
		<th>BENEFICIARIES</th>
		<th>VALUE</th>
		<th>PARTNER</th>
		<th>YEAR AWARDED</th>
		<th>YEAR COMPLETED</th>
		
            </tr><?php
            foreach ($our_past_data as $our_past)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $our_past->ID_CONTENT ?></td>
		      <td><?php echo $our_past->JUDUL ?></td>
		      <td><?php echo $our_past->OBJECTIVE ?></td>
		      <td><?php echo $our_past->MARGIN_X ?></td>
		      <td><?php echo $our_past->MARGIN_Y ?></td>
		      <td><?php echo $our_past->LOCATION ?></td>
		      <td><?php echo $our_past->SECTOR ?></td>
		      <td><?php echo $our_past->BENEFICIARIES ?></td>
		      <td><?php echo $our_past->VALUE ?></td>
		      <td><?php echo $our_past->PARTNER ?></td>
		      <td><?php echo $our_past->YEAR_AWARDED ?></td>
		      <td><?php echo $our_past->YEAR_COMPLETED ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>