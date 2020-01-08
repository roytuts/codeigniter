<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Pagination Example</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pagination.css">
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

            h1 {
                margin-left: 15px;
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
            <h1>CodeIgniter Pagination Example</h1>            
            <div id="body">
                <?php
                foreach ($blog_list->result() as $blog) {
                    ?>
                    <div class="post">
                        <h2 class="title"><?php echo $blog->blog_title; ?></h2>
                        <p class="meta">
                            <?php
                            echo $blog->blog_date;
                            ?>
                        <div class="entry">
                            <p><?php echo $blog->blog_content; ?></p>
                        </div>
                    </div>
                    <?php
                }
                if (strlen($pagination)) {
                    echo $pagination;
                }
                ?>
            </div>
        </div>
    </body>
</html>