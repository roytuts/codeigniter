<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Codeigniter Datatable Example</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
        <!--<link type="text/css" rel="stylesheet" href="<?php //echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>-->
		<link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
        <!--<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--<script type= 'text/javascript' src="<?php //echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>-->
		<script type= 'text/javascript' src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>		
        <script type= 'text/javascript'>
            $(document).ready(function () {
                $('#cd-grid').DataTable({
                    "processing": true,
                    "serverSide": true,
                    //"ajax": "http://localhost/codeigniter-datatable-ajax/index.php/cdcontroller/cd_list"
					"ajax": "http://localhost/cdcontroller/cd_list"
                });
            });
        </script>
    </head>
    <body>
        <table id="cd-grid" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cd Id</th>
                    <th>Title</th>
                    <th>Interpret</th>
                    <th>Release Date</th>
                    <th>No of Copies</th>
                    <th>Type</th>
                    <th>Owner</th>
                    <th>Content Type</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Cd Id</th>
                    <th>Title</th>
                    <th>Interpret</th>
                    <th>Release Date</th>
                    <th>No of Copies</th>
                    <th>Type</th>
                    <th>Owner</th>
                    <th>Content Type</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
