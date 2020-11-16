<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>HighChart using AJAX, Codeigniter 3.1.11</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.css">
        <!--<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.js"></script>-->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!--<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3-custom.min.js"></script>-->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/sugar.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/highcharts.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/highcharts-more.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/exporting.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/script.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/daterangepicker.js'></script>
    </head>
    <body>
        <div style="margin: 10px 0 0 10px;">
            <h3>Highchart Example using AJAX, Codeigniter 3.1.11</h3>
            <form class="form-horizontal">
                <fieldset>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-calendar"></i> </span> <input
                            type="text" name="range" id="range" />
                    </div>
                </fieldset>
            </form>
            <div id="msg"></div>
            <div id="chart"></div>
        </div>
    </body>
</html>