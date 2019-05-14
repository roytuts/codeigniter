<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Nested Comment using Codeigniter, MySQL, AJAX</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/comments.css"/>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3-custom.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/comments_blog.js"></script>
    </head>
    <body>
        <div class='singlepost'>
            <div class='fullpost clearfix'>
                <div class='entry'>
                    <h1 class='post-title'>
                        <?php echo $blog_detail->blog_title; ?>
                    </h1>
                    <div>&nbsp;</div>
                    <div class="entry">
                        <p><?php echo $blog_detail->blog_text; ?></p>
                    </div>
                    <div>&nbsp;</div>
                    <div style="width: 600px;">
                        <div id="comment_wrapper">
                            <div id="comment_form_wrapper">
                                <div id="comment_resp"></div>
                                <h4>Please Leave a Reply<a href="javascript:void(0);" id="cancel-comment-reply-link">Cancel Reply</a></h4>
                                <form id="comment_form" name="comment_form" action="" method="post">
                                    <div>
                                        Comment<textarea name="comment_text" id="comment_text" rows="6"></textarea>
                                    </div>
                                    <div>
                                        <input type="hidden" name="content_id" id="content_id" value="<?php echo $blog_detail->blog_id; ?>"/>
                                        <input type="hidden" name="reply_id" id="reply_id" value=""/>
                                        <input type="hidden" name="depth_level" id="depth_level" value=""/>
                                        <input type="submit" name="comment_submit" id="comment_submit" value="Post Comment" class="button"/>
                                    </div>
                                </form>
                            </div>
                            <?php
                            echo $blog_comments;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>