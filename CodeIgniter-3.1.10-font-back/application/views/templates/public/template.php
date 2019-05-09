<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        {_meta}
        <title>{title}</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/template.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/widget_css_bundle.css"/>
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
        <div id='headerpic-wrapper'>
            <div class='clearfix' id='topnav'>
                <div class='menu-topnav-container'>
                    <ul class='menu' id='menu-topnav'>
                        <?php
                        if (!$this->userauth->is_logged_in()) {
                            ?>
                            <li><a href='<?php echo site_url('signin'); ?>'>Signin</a></li>
                            <?php
                        } else {
                            ?>
                            <?php
                            if (!$this->userauth->is_admin()) {
                                ?>
                                <li><a class='trigger' href='#'>My Activities</a>
                                    <ul>
                                        <li>
                                            <a href='#'>My Blogs</a>
                                        </li>
                                        <li>
                                            <a href='#'>Post Blog</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <li><a class='trigger' href='#'>Account</a>
                                <ul>
                                    <li>
                                        <a href='#'>Change Email</a>
                                    </li>
                                    <li>
                                        <a href='#'>Change Password</a>
                                    </li>
                                    <?php
                                    if (!$this->userauth->is_admin()) {
                                        ?>
                                        <li>
                                            <a href='#'>Delete A/C</a>                                    
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                            if ($this->userauth->is_admin()) {
                                $attributes = array('target' => '_blank');
                                echo '<li>' . anchor('admin', 'Control Panel', $attributes) . '</li>';
                            }
                            ?>
                            <li><a href='<?php echo site_url('signin/logout'); ?>'>Singout</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div><!-- end header-wrapper -->
        <div id='menuwrapperpic'>
            <div id='menuwrapper'>
                <ul id='menubar'>
                    <li><a href='<?php echo site_url(); ?>'><img border='0' src='<?php echo base_url(); ?>assets/img/template/home_white.png' style='padding:0px;'/></a></li>
                    <li><a href='#'>About</a></li>
                    <li><a href='#'>Contact</a></li>
                </ul>
                <br class='clearit'/>
            </div>
        </div>
        <div class='clearfix' id='page'>
            <div class='maincontent' id='contentleft'>  
                <div class='posts-by-3'>
                    <div class='main section' id='main'>
                        {content}
                    </div>
                    <div style='clear: both;'></div>
                </div>
            </div>
            <div id='sidebar-wrapper'>
                <div class='sidebar section' id='sidebar'>
                    <div class='widget PopularPosts' id='PopularPosts1'>
                        <h2>Popular Posts</h2>
                        <div class='widget-content popular-posts'>                            
                            <div class='clear'></div>
                        </div>
                    </div>
                    <div class='widget LinkList' id='LinkList1'>
                        <h2>Recent Posts</h2>
                        <div class='widget-content'>
                            <div class='clear'></div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class='picfooter'>
        </div>
        <div class='clearfix' id='footer'>
            <a href='<?php echo site_url(); ?>'>www.roytuts.com</a> &#169; 2014 - <?php echo date('Y'); ?>
        </div>        
    </body>
</html>