<?php
$overall_vote_rows = $blog_vote_overall_rows;
$overall_vote_rate = $blog_vote_overall_rate;
$overall_vote_dec_rate = $blog_vote_overall_dec_rate;
$ip_vote_rate = $blog_vote_ip_rate;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Voting Rating System using Codeigniter MySQL AJAX</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blog_rating.css"/>
        <!--<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/blog_rating.js"></script>
    </head>
    <body>
        <div class='singlepost'>
            <div class='fullpost clearfix'>
                <div class='entry'>
                    <h1 class='post-title'>
                        This is a sample blog content
                    </h1>
                    <p>
                        Posted By:&nbsp;roytuts.com,&nbsp;&nbsp;
                        Posted On:&nbsp;25-08-2015
                    </p>
                    <input type="hidden" name="blog_content_id" id="blog_content_id" value="1"/>
                    <?php
                    $stars = '';
                    echo '<div id="ajax_vote">';
                    for ($i = 1; $i <= floor($overall_vote_rate); $i++) {
                        $stars .= '<div class="star" id="' . $i . '"></div>';
                    }
                    //THE OVERALL RATING (THE OPAQUE STARS)
                    echo '<div class="r"><div class="rating">' . $stars . '</div>';

                    //THE TRANSPARENT STARS (OPAQUE STARS WILL COVER AS MANY STARS AS THE RATING REPRESENTS)
                    echo '<div class="transparent">
						<div class="star" id="1"></div>
						<div class="star" id="2"></div>
						<div class="star" id="3"></div>
						<div class="star" id="4"></div>
						<div class="star" id="5"></div>
						<div class="votes">(' . $blog_vote_overall_dec_rate . '/5, ' . $overall_vote_rows . ' ' . ($overall_vote_rows > 1 ? ' votes' : ' vote') . ') ' . ($blog_vote_ip_rate > 0 ? '<strong>You rated this: <span style="color:#39C;">' . $blog_vote_ip_rate . '</span></strong>' : '') . '</div>
					  </div>
					</div>';
                    echo '</div>';
                    ?>
                    <div>&nbsp;</div>
                    <p style="text-align: justify;">
                        The topic of blogging seems to come up a lot in our social media training workshops. The benefits of a quality blog are obvious – fresh content is good for your readers and your rankings. Blogs are easy to set up and even easier to update. We often tell people that if they can use Microsoft Word… they can update a blog.

                        As easy as they are to set up, they can be difficult to maintain. A good blog is filled with relevant, timely content that is updated on a regular basis. New bloggers often start out with a bang but then fizzle out when they realize that creating content can be challenging.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>