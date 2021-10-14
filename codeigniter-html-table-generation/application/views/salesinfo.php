<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Generate HTML Table Data From MySQL Database Using Codeigniter 3</title>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width:
			100%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
	<div style="margin: auto;width: 600px">
		<h3>Sales Information</h3>

		<?php			
			$this->table->set_heading('Product Id', 'Price', 'Sale Price', 'Sales Count', 'Sale Date');
			
			foreach ($salesinfo as $sf):
				$this->table->add_row($sf->id, $sf->price, $sf->sale_price, $sf->sales_count, $sf->sale_date);
			endforeach;
			
			echo $this->table->generate();
		?>
		
	</div>
</body>
</html>