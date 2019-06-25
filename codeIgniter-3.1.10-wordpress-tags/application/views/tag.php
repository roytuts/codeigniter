<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create WordPress like add tags using Codeigniter</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tags/textext.core.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tags/textext.plugin.tags.css"/>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/tags/textext.core.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/tags/textext.plugin.tags.js"></script>
    </head>
    <body>
        <?php
        if (isset($success) && strlen($success)) {
            echo '<div style="color:green;">';
            echo $success;
            echo '</div>';
        }
        if (isset($errors) && strlen($errors)) {
            echo '<div style="color:red;">';
            echo $errors;
            echo '</div>';
        }
        if (validation_errors()) {
            echo '<div style="color:red;">';
            echo validation_errors();
            echo '</div>';
        }
        echo form_open($this->uri->uri_string(), array('id' => 'add_tags_form'));
        ?>
        <p>
            <label>Tags (type and press 'Enter')</label><br/>
            <textarea name="tags" id="tags" rows="5" cols="50" class="textarea"></textarea>
        </p>
        <p>
            <input type="submit" name="add_tags" id="add_tags" value="Save tags"/>
        </p>
        <?php
        echo form_close();
        ?>

        <script type="text/javascript">
            $('#tags').textext({
                        plugins: 'tags',
                        tagsItems: [<?php
							if (isset($tags) && (is_array($tags) || is_object($tags))) {
								$i = 1;
								foreach ($tags as $tag) {
									echo "'" . $tag . "'";
									if (count($tags) == $i) {
										echo '';
									} else {
										echo ',';
									}
									$i++;
								}
							}
						?>]
                    }).bind('tagClick', function (e, tag, value, callback) {
                        var newValue = window.prompt('Enter New value', value);
                        if (newValue)
                            callback(newValue);
                    });
        </script>
    </body>
</html>