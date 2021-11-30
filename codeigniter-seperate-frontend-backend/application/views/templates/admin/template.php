<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>{title}</title>
        <!--css-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/navi.css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form/sky-forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form/form.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/messages.css">
        <!--[if lt IE 9]>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form/sky-forms-ie8.css">
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3-custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/form/jquery.form.min.js"></script>
        <!--[if lt IE 9]>
                <script src="<?php echo base_url(); ?>assets/js/html5.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/form/sky-forms-ie8.js"></script>
        <![endif]-->
        {_styles}
        {_scripts}
    </head>
    <body>
        <div class="wrap">
            <div id="header">
                <div id="top">
                    <div class="left">
                        <p>
                            <a href="<?php echo site_url(); ?>" target="_blank">Visit site</a>   
                            &nbsp;&nbsp;<span style="color: #FFF !important;">Welcome,</span> <strong><?php echo $this->session->userdata('login_email'); ?></strong> 
                            <span style="color: #FFF !important;">[</span> <a href="<?php echo site_url('admin/logout'); ?>">logout</a> <span style="color: #FFF !important;">]</span>
                        </p>
                    </div>
                    <div class="right">
                        <div class="align-right">
                            <p>Last login: <strong><?php echo $this->session->userdata('last_login') == NULL ? 'First Time' : $this->session->userdata('last_login'); ?></strong></p>
                        </div>
                    </div>
                </div>
                <div id="nav">
                    <ul>
                        <li class="upp"><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                        <li class="upp"><a href="#">Blog Category</a></li>
                        <li class="upp"><a href="#">Blogs</a>
                            <ul>
                                <li>&#8250; <a href="#">User Blogs</a></li>
                                <li>&#8250; <a href="#">Archive Blogs</a></li>
                                <li>&#8250; <a href="#">Add New Blog</a></li>
                            </ul>
                        </li>
                        <li class="upp"><a href="#">Policy</a>
                            <ul>
                                <li>&#8250; <a href="#">Add new policy</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="content">
                <div id="main">
                    <div class="full_w">
                        {content}
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="footer">
                <div class="left">
                    <p><a href="<?php echo site_url(); ?>"> <?php echo $this->config->item('site_name'); ?></a></p>
                </div>
                <div class="right">
                    <p>&copy;2012-<?php echo date('Y'); ?> all rights reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>