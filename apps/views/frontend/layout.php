<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <?php 
        if (!isset($hide)){$hide=false;}
        echo $this->load->view('frontend/_metas','FALSE')  ;
    
    ?>
	
</head>
<body >


<?php if (!$hide){?>
<?php $this->load->view('frontend/_header',  FALSE); ?>
<?php $this->load->view('frontend/_menu_superior',  FALSE); ?>
<?php //echo $this->load->view('frontend/_breadcrum');?>
<?php }?>
<?php if (isset($content)){$this->load->view($content) ; }else{echo "<h1>No existe Contenido</h1>";} ?>




<?php //$this->load->view('frontend/layout/brands',  FALSE); ?>
<!-- Footer Area-->

<?php 
if (!$hide){
    $this->load->view('frontend/_footer',  FALSE); 
}
?>
<!--End Footer Area-->
<!--Script Area-->	


<?php $this->load->view('frontend/_scripts',  FALSE); ?>

</body>

</html>
