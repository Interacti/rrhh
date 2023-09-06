<!-- HOME SLIDER -->

<style>
.carousel-caption {
    right: 0;
    left: 0;
    padding-bottom: 80px;
    width: 100%;
    text-align: center;
    padding-left: 200px;
    padding-right: 200px;
    background: rgba(0,0,0,0.5);
}

</style>

<?php 
$NumOfBanner=count($banners);
$i=0;
/*?>
<div class="slider-wrap home-1-slider hidden-xs">
	<div id="mainSlider" class="nivoSlider slider-image">
	   <?php foreach ( $banners as $ls ) : ?>
	   		<a href="<?php echo $ls->bnr_url?>"	target="<?php echo $ls->bnr_target?>">
				<img src="<?php echo base_url()?>assets/frontend/images/banners/<?php echo $ls->bnr_imagen_r?>" 	alt="<?php echo $ls->bnr_descripcion?>" />
			</a>
		<?php endforeach;  ?>
	</div>
</div>
<?php */?>

<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
        <? for($i=0 ; $i<=$NumOfBanner-1;$i++):?>        
			<li data-target="#carousel-id" data-slide-to="<? echo $i?>" class="<?php echo $i==0 ? 'active' : ''  ?>"></li>
        <? endfor;?>    
	</ol>
	<div class="carousel-inner">
         <?php
            $nb=0; 
            foreach ( $banners as $banner ) : 
         ?>
		 <div class="item <?php echo $nb==0 ? 'active' : '';$nb++;  ?>">
			<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner->bnr_image?>" 	alt="<?php echo $banner->bnr_descripcion?>" class="img-responsive" width="100%" />
			<div class="container">
				<div class="carousel-caption hidden-xs hidden-sm hidden-md">
					<h1>¡Bienvenido!</h1>
					<p>Nuestra Intranet quiere poner a tu disposición antecedentes útiles de nuestra empresa, de nuestros convenios y del personal con el fin que estemos unidos a través de la información en línea.  Te invitamos a navegar y observar todas las opciones de comunicación que hemos preparado para ti.</p>
					
				</div>
			</div>
		</div>
        <?php endforeach;  ?>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>

<style>

 .bajo-banner {
    height: 75px;
    line-height: 70px;
    text-align: center;
}
 

.bajo-banner > div > img {
    width:65% !important;
}
 

 .bajo-banner > div > span {
    display: inline-block;
    vertical-align: middle;
    line-height: 1;
    color: #fff;
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
}
 

.bajo-banner > div > img 
{
    display:inline-block;
	vertical-align:middle;
	line-height:normal;
  
}

 .color-01
{
    background: #94C120;
}
.color-02
{
    background: #E61974;
}
 .color-03
{
    background: #F9B234;
}  
 .color-04
{
    background: #2DAAE2;
}  
</style>

<!-- HOME SLIDER -->   

<div class="col-sm-3 col-xs-3 bajo-banner color-01 no-padding">
   <div class="col-sm-3 col-sm-offset-2 padding-iconos"><i  class="color-iconos fa fa fa-building fa-3x" aria-hidden="true"></i></div>
   <div class="col-sm-3 hidden-xs"><span><a href="<?php echo base_url()?>induccion-a-la-compania" style="color: #fff ;">Inducción a la compañia</a></span></div>
</div>
<div class="col-sm-3 col-xs-3 bajo-banner color-02 no-padding">
	<div class="col-sm-3 col-sm-offset-2 padding-iconos"><i  class="color-iconos fa fa-book fa-3x" aria-hidden="true"></i></div>
    <div class="col-sm-3  hidden-xs"><span><a href="<?php echo base_url()?>politicas-y-procedimientos-internos" style="color: #fff ;">Politicas y Procedimientos internos</a></span></div>
   
</div>
<div class="col-sm-3 col-xs-3 bajo-banner color-03 no-padding">
	<div class="col-sm-3 col-sm-offset-2 padding-iconos"><i  class="color-iconos fa fa-file-text fa-3x" aria-hidden="true"></i></div>
    <div class="col-sm-3  hidden-xs"><span><a href="<?php echo base_url()?>reglamento-interno" style="color: #fff ;">Reglamento Interno</a></span></div>
    
</div>
<div class="col-sm-3 col-xs-3 bajo-banner color-04 no-padding">
	<div class="col-sm-3 col-sm-offset-2 padding-iconos"><i  class="color-iconos fa fa-users fa-3x" aria-hidden="true"></i></div>
    <div class="col-sm-3  hidden-xs"><span><a  style="color: #fff ;"href="<?php echo base_url()?>mision">Misión / Visión</a></span></div>

</div>





