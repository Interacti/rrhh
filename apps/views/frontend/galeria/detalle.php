<?php /*
  ?>
  <section id="product" style="margin-top:25px">
  <div class="container no-padding">
  <div class="row">
  <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
  <div class="col-md-9 " >

  <div class="col-md-12 no-padding">
  <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->titulo)); ?> </strong></h2>
  </div>

  <div class="col-md-12">
  <div id="slick1">

  <?php
  $i = 1;
  $dirFotos = 'assets/frontend/img/galerias/' . $contenido[0]->seo;
  if (is_dir($dirFotos)) :
  $total_imagenes = count(glob("{$dirFotos}/{*.jpg,*.gif,*.png}", GLOB_BRACE));
  for ($i == 1; $i <= $total_imagenes; $i++):
  ?>
  <div class="col-md-4 noticias-bienestar-box item"  >
  <a href="<?php echo base_url() . $dirFotos . '/' . $i . '.jpg'; ?>" data-title="Galeria de Imagenes" data-toggle="lightbox" data-gallery="example-gallery">
  <img src="<?php echo base_url() . $dirFotos . '/' . $i . '.jpg'; ?>" />
  </a>
  <a class="float-right" href="<?php echo base_url() . $dirFotos . '/' . $i . '.jpg'; ?>" >
  <i class="fa fa-download"></i>
  </a>
  <div class="clearfix"></div>
  </div>
  <?php
  endfor;
  endif;
  ?>
  </div>
  </div>
  </div>
  </div>
  </section>

  <?php */ ?>
<style>

    .theBox{
        padding: 10px;  
        border: 1px solid #ccc;
    }
    .thePaddingBottom{
        padding-bottom: 20px;
    }
</style>

<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
            <div class="col-md-9 " >

                <div class="col-md-12 no-padding">
                    <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower($subcategoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->title)); ?> </strong></h2> 
                </div>

                <div class="col-md-12">
                    <?php
                    foreach ($contenido as $foto):
                        ?>
                        <div class="col-md-4  item thePaddingBottom"  >
                            <div class="theBox">
                                <a href="<?php echo base_url() . $foto->path_saved ?>/<?php echo $foto->list_image ?>" data-title="Galeria de Imagenes" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="<?php echo base_url() . $foto->path_saved ?>/<?php echo $foto->list_image ?>" />
                                </a> 

                                <a class="float-right" href="<?php echo base_url() . $foto->path_saved ?>/<?php echo $foto->list_image ?>" >
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </div>
</section>