<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Video Upload</title>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }            

            #body {
                margin: 0 15px 0 15px;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            .error {
                color: #E13300;
            }

            .success {
                color: darkgreen;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <h1>CodeIgniter Video Upload</h1>

            <div id="body">
                <p>Select a video file to upload</p>
                <?php
					if (isset($success) && strlen($success)) {
						echo '<div class="success">';
						echo '<p>' . $success . '</p>';
						echo '</div>';
						
						//traditional video play - less than HTML5
						echo '<object width="338" height="300">
						  <param name="src" value="' . $video_path . '/' . $video_name . '">
						  <param name="autoplay" value="false">
						  <param name="controller" value="true">
						  <param name="bgcolor" value="#333333">
						  <embed type="' . $video_type . '" src="' . $video_path . '/' . $video_name . '" autostart="false" loop="false" width="338" height="300" controller="true" bgcolor="#333333"></embed>
						  </object>';

						//HTML5 video play
						/*echo '<video width="320" height="240" controls>
						  <source src="' . $video_path . '/' . $video_name . '" type="' . $video_type . '">
						  Your browser does not support the video tag.
						  </video>';*/
					}
					if (isset($errors) && strlen($errors)) {
						echo '<div class="error">';
						echo '<p>' . $errors . '</p>';
						echo '</div>';
					}
					if (validation_errors()) {
						echo validation_errors('<div class="error">', '</div>');
					}
                ?>
                <?php
					$attributes = array('name' => 'video_upload', 'id' => 'video_upload');
					echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>
                <p><input name="video_name" id="video_name" readonly="readonly" type="file" /></p>
                <p><input name="video_upload" value="Upload Video" type="submit" /></p>
                <?php
					echo form_close();
                ?>
            </div>

        </div>
    </body>
</html>