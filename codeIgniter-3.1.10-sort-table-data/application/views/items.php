<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Table data sorting in asc or desc in Codeigniter</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css"/>
</head>
<body>

<div>
	<h1>Table data sorting in asc or desc example in Codeigniter</h1>

	<div id="body">
		<?php
			if ($item_list) {
		?>
        <table class="datatable">
            <thead>
				<tr>
					<th <?php echo($sort_by == 'item_name' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("items/item_list/item_name/" .
                                    (($sort_order == 'ASC' && $sort_by == 'item_name') ? 'DESC' : 'ASC'), 'Name');
                        ?>
					</th>
					<th <?php echo($sort_by == 'item_desc' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("items/item_list/item_desc/" .
                                    (($sort_order == 'ASC' && $sort_by == 'item_desc') ? 'DESC' : 'ASC'), 'Description');
                        ?>
                    </th>
					<th <?php echo($sort_by == 'item_price' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("items/item_list/item_price/" .
                                    (($sort_order == 'ASC' && $sort_by == 'item_price') ? 'DESC' : 'ASC'), 'Price');
                        ?>
                    </th>
                </tr>
            </thead>
			<tbody>
				<?php
					$i = 0;
					foreach ($item_list as $item) {
						$col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
						$i++;
					?>
					<tr class="<?php echo $col_class; ?>">
						<td>
							<?php echo $item->item_name; ?>
						</td>
						<td>
							<?php echo $item->item_desc; ?>
						</td>
						<td>
							<?php echo $item->item_price; ?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
        </table>
    <?php
        } else {
            echo '<div style="color:red;"><p>No Record Found!</p></div>';
        }
    ?>
	</div>
</div>

</body>
</html>