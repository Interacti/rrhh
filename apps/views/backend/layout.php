<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php

echo $titulo

?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Daniel Nunez(Artanis_cl)">
        
        <link href="<?php echo BASE_CSS_BO ?>bootstrap.css" rel="stylesheet">
        <link href="<?php echo BASE_CSS_BO?>datepicker.css" rel="stylesheet">
      	<link rel="stylesheet" type="text/css" href="<?php echo BASE_CSS_BO?>DT_bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_CSS_BO?>global.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_CSS_BO?>custom-theme/jquery-ui-1.10.0.custom.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_JS_BO?>fancybox/jquery.fancybox.css"/>
        
        <style>
            *{
                border-radius: 0 !important;
            }
        </style>
       
          <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->

 
        <script src="<?php echo BASE_JS_BO?>jquery.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-button.js"></script>
        <script src="<?php echo BASE_JS_BO?>jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-transition.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-alert.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-modal.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-dropdown.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-scrollspy.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-tab.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-tooltip.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-popover.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-datepicker.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-collapse.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-carousel.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-typeahead.js"></script>
        <script src="<?php echo BASE_JS_BO?>bootstrap-datepicker.js"></script>
        <script src="<?php echo BASE_JS_BO?>AjaxUpload.2.0.min.js"></script>
        <script src="<?php echo BASE_JS_BO?>jquery.dataTables.js"></script>
        <script src="<?php echo BASE_JS_BO?>DT_bootstrap.js"></script>
        <script src="<?php echo BASE_JS_BO?>tiny_mce/jquery.tinymce.js"></script>
        <script src="<?php echo BASE_JS_BO?>expand.js"></script>
        <script src="<?php echo BASE_JS_BO?>globals.js"></script>
        <script src="<?php echo BASE_JS_BO?>script.js"></script>
        <script src="<?php echo BASE_JS_BO?>fancybox/jquery.fancybox.js"></script>
        <script src="<?php echo BASE_JS_BO?>highcharts/js/highcharts.js"></script>
        <script src="<?php echo BASE_JS_BO?>highcharts/js/modules/exporting.js"></script>
        
         
        <script>
        //jQuery.noConflict();
        </script>
       
    </head>

    <body >
        
        <?php

if (!$hide)
{
    $this->load->view('backend/_header');

}

?>
        
       
     	 <div class="clearfix"></div>  
	     <div class="container-fluid"> 
                 <?php

if (!$hide)
{
    $this->load->view('backend/_breadcrum');
}


if (isset($content))
{

    $this->load->view($content);
} else
{
    echo "<h1>No existe Contenido</h1>";
}

?>
        </div>

        <?php

if (!$hide)
{
    echo $this->load->view('backend/_footer');
}

?>
        

    </body>
</html>
