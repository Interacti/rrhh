<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo BASE_CSS_BO ?>bootstrap.css" rel="stylesheet">
        <link href="<?php echo BASE_CSS_BO ?>datepicker.css" rel="stylesheet">
        
        <link href="<?php echo BASE_CSS_BO ?>global.css" rel="stylesheet">
       
        <link href="<?php echo BASE_JS_BO ?>/fancybox/jquery.fancybox.css" rel="stylesheet">
  
        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
	  		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
 
        <script src="<?php echo BASE_JS_BO ?>jquery.js"></script>
       
        
        <script src="<?php echo BASE_JS_BO ?>bootstrap-transition.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-alert.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-modal.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-dropdown.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-scrollspy.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-tab.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-tooltip.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-popover.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-button.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-collapse.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-carousel.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-typeahead.js"></script>
        <script src="<?php echo BASE_JS_BO ?>bootstrap-datepicker.js"></script>
        <script src="<?php echo BASE_JS_BO ?>AjaxUpload.2.0.min.js"></script>
        <script src="<?php echo BASE_JS_BO ?>jquery.dataTables.js"></script>
        <script src="<?php echo BASE_JS_BO ?>DT_bootstrap.js"></script>
        <script src="<?php echo BASE_JS_BO ?>tiny_mce/jquery.tinymce.js"></script>
        <script src="<?php echo BASE_JS_BO ?>expand.js"></script>
        <script src="<?php echo BASE_JS_BO ?>globals.js"></script>
        <script src="<?php echo BASE_JS_BO ?>/fancybox/jquery.fancybox.js"></script>
    
        <script src="<?php echo BASE_JS_BO ?>highcharts/js/highcharts.js"></script>
       
    </head>

    <body >
        
        <?php 
      
         if (!$hide) {
         $this->load->view('backend/_header');
        
         }  
        ?>
        
       
     	 <div class="clearfix"></div>  
	     <div class="container-fluid"> 
                 <?php
                 
                 if (!$hide) {
					$this->load->view('backend/_breadcrum');
        		}
				  
				  
				  if (isset($content)){
					  
                     $this->load->view($content) ;
                  }else{
                    echo "<h1>No existe Contenido</h1>"; 
                  }       
                 
                 ?>
        </div>

        <?php  if (!$hide) { echo $this->load->view('backend/_footer');} ?>
        

    </body>
</html>
