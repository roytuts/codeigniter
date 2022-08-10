<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Multiple Table Rows Deletion Example in Codeigniter, AJAX, jQuery, MySQL</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/table.css"/>
	<!--<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?=base_url()?>assets/js/product.js"></script>
</head>
<body>

<div>
	<h1>Multiple Table Rows Deletion Example in Codeigniter, AJAX, jQuery, MySQL</h1>

	<div id="body">
		<?php
			if ($products) {
		?>
		<div id="msg"></div>
		<button id="delete_selected">Delete Selected Product(s)</button>
        <table class="datatable">
            <thead>
				<tr>
					<th><input id="check_all" type="checkbox"></th>
					<th>ID</th>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
                </tr>
            </thead>
			<tbody>
				<?php
					$i = 0;
					foreach ($products as $p) {
						$col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
						$i++;
					?>
					<tr class="<?php echo $col_class; ?>">
						<td><input type="checkbox" name="row-check" value="<?php echo $p->id;?>"></td>
						<td><?php echo $p->id; ?></td>
						<td><?php echo $p->code; ?></td>
						<td><?php echo $p->name; ?></td>
						<td><?php echo $p->price; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
        </table>
    <?php
        } else {
            echo '<div style="color:red;"><p>No Record Found</p></div>';
        }
    ?>
	</div>
</div>

</body>
</html>
