<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- page title specific to the page -->
        <title><?php echo $this->config->item('website_name'); ?> | {title}</title>
        <!-- meta keywords specific to the page -->
        {_meta}
        <!-- common style sheets for every page -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/reset.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/960.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/menu.css'; ?>">
        <!-- style sheets specific to the page -->
        {_styles}
        <!-- js files specific to the page -->
        {_scripts}
    </head>
    <body>
        <div class="container_12">
            {header}
            <div class="clear"></div>
            {content}
            <div class="clear"></div>
            {footer}
            <div class="clear"></div>
        </div>
    </body>
</html>