<!-- INICIO BANNERS-->
<style>


    .cycle-slideshow { 

        margin: 0px auto !important; 

    }


</style>


<?php $this->load->view('frontend/_carrusel') ?>
<div class="clearfix" ></div>
<section id="product" style="margin-top:25px">
    <div class="container-fluid no-padding">
        <div class="row">
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12"><h2 class="titulo-destacado-bienestar"> <strong>   DESTACADOS DEL MES / BIENESTAR </strong></h2> </div>
                   

                    <div class="col-md-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="0.5s"  style="padding-bottom:30px">
                        <div class="col-md-12 no-padding"><a href="<?php echo base_url() ?>temas/bienestar/noticias-internas">   <img src="<?php echo base_url() ?>assets/frontend/img/temas/02.jpg" alt="" class="img-responsive"></a></div>
                        <div class="col-md-1   cuadro_azul"  ><i class="fa fa-newspaper-o fa-2x" ></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista" ><a href="<?php echo base_url() ?>temas/bienestar/noticias-internas"><h3>Noticias del mes</h3></a></div>
                    </div>  

			 <div class="col-md-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="1.5s" style="padding-bottom:30px">
                        <div class="col-md-12 no-padding"><img src="<?php echo base_url() ?>assets/frontend/img/temas/bv.jpg" width="668" ></div>
                        <div class="col-md-1 cuadro_azul"  ><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista" ><a href="<?php echo base_url() ?>rrhh/nuevos-a-bordo-equipo-caren"><h3>Bienvenidos</h3></a></div>
                    </div>  
                    


                    <div class="col-md-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.7s"  style="padding-bottom:30px">
                        <div class="col-md-12 no-padding"><img src="<?php echo base_url() ?>assets/frontend/img/temas/03.jpg" alt="" class="img-responsive"></div>
                        <div class="col-md-1   cuadro_verde"  ><i class="fa fa-lightbulb-o fa-2x" ></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista-verde" ><a href="<?php echo base_url() ?>temas/comercial-e-incentivo/super-idea"><h3>Super Idea del Mes</h3></a></div>
                    </div>  

                    <div class="col-md-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="1s"  style="padding-bottom:30px">
                        <div class="col-sm-12 no-padding">
                            <?php if (count($cumples) > 0) { ?>
                                <div class="cycle-slideshow" 
                                     data-cycle-fx=scrollHorz
                                     data-cycle-timeout=4000
                                     >
                                    <!-- empty element for overlay -->
                                    <div class="cycle-overlay"></div>

                                    <?php foreach ($cumples as $co): ?>
                                        <?php if (file_exists("./assets/frontend/img/personal/" . $co->rutdv . ".jpg")) { ?>
                                            <img data-cycle-title="<?php echo $co->nombre . ' ' . $co->apellido ?>"  data-cycle-desc="<?php echo $co->centrocosto ?> / <?php echo date('d-m', strtotime($co->fecha_nacimiento)) ?>"     src="<?php echo base_url() ?>assets/frontend/img/personal/<?php echo $co->rutdv ?>.jpg" width="400" height="400" alt="">
                                        <?php } elseif (file_exists("./assets/frontend/img/personal/" . $co->rutdv . ".JPG")) { ?>
                                            <img data-cycle-title="<?php echo $co->nombre . ' ' . $co->apellido ?>"  data-cycle-desc="<?php echo $co->centrocosto ?> / <?php echo date('d-m', strtotime($co->fecha_nacimiento)) ?>" src="<?php echo base_url() ?>assets/frontend/img/personal/<?php echo $co->rutdv ?>.JPG"  width="400" height="400">
                                        <?php } else { ?>
                                            <img data-cycle-title="<?php echo $co->nombre . ' ' . $co->apellido ?>"  data-cycle-desc="<?php echo $co->centrocosto ?> / <?php echo date('d-m', strtotime($co->fecha_nacimiento)) ?>" src="<?php echo base_url() ?>assets/frontend/img/banners/foto.jpg"  width="400" height="400" >
                                        <?php
                                        };
                                    endforeach;
                                    ?>

                                </div>
                                <?php
                            } else {
                                ?>
                                <img src="<?php echo base_url() ?>assets/frontend/img/intranet.gif" alt="" class="img-responsive">

                            <?php } ?>


                        </div>

                        <div class="col-md-1   cuadro_azul"  ><i class="fa fa-birthday-cake fa-2x" ></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista" ><a href="<?php echo base_url() ?>/temas/bienestar/cumpleanos"><h3>Cumpleaños del Día</h3></a></div>
                    </div>  
                    <div class="clearfix"></div>   
                    <div class="col-md-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1.3s"  style="padding-bottom:30px">
                        <div class="col-md-12 no-padding"><img src="<?php echo base_url() ?>assets/frontend/img/temas/05.jpg" alt="" class="img-responsive"></div>
                        <div class="col-md-1   cuadro_azul"  ><i class="fa  fa-user fa-2x" ></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista" ><a href="<?php echo base_url() ?>temas/bienestar/personal-destacado"><h3>Personal del Mes</h3></a></div>
                    </div>  

                    <div class="col-md-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.3s" style="padding-bottom:30px">
                        <div class="col-md-12 no-padding">
                            <div class="col-md-12 no-padding"><img src="<?php echo base_url() ?>assets/frontend/img/temas/01.jpg" alt="" class="img-responsive"></div>                                             
                        </div>
                        <div class="col-md-1   cuadro_verde"  ><i class="fa fa-trophy fa-2x" ></i></div>
                        <div class="col-md-11  text-center titulo-destacado-lista-verde" ><a href="<?php echo base_url() ?>temas/comercial-e-incentivo/concursos"><h3>Concurso del mes</h3></a></div>
                    </div>

                </div>
                <?php /* ?>
                  <div class="row margin-row">
                  <div class="col-md-12"><h2 class="titulo-destacado-rrhh"> <strong>   DESTACADOS DEL MES / RRHH </strong></h2> </div>
                  <div class="col-md-6">
                  <div class="col-md-12 no-padding"><img src="<?php echo base_url()?>assets/frontend/img/temas/caluga_incentivos.jpg" alt="" class="img-responsive"></div>
                  <div class="col-md-1 cuadro_fuxia"  ><h3>B</h3></div>
                  <div class="col-md-11  text-center titulo-destacado-lista-rrhh" ><h3>CONCURSOS / INCENTIVOS </h3></div>
                  </div>

                  <div class="col-md-6">
                  <div class="col-md-12 no-padding"><img src="<?php echo base_url()?>assets/frontend/img/temas/caluga_noticias.jpg" alt="" class="img-responsive"></div>
                  <div class="col-md-1 cuadro_fuxia"  ><h3>B</h3></div>
                  <div class="col-md-11  text-center titulo-destacado-lista-rrhh" ><h3>MIS NOTICIAS</h3></div>
                  </div>
                  </div>


                  <div class="row margin-row">
                  <div class="col-md-12"><h2 class="titulo-destacado-inc"> <strong>   DESTACADOS DEL MES / COMERCIAL / INCENTIVO </strong></h2> </div>
                  <div class="col-md-6">
                  <div class="col-md-12 no-padding"><img src="<?php echo base_url()?>assets/frontend/img/temas/caluga_revista.jpg" alt="" class="img-responsive"></div>
                  <div class="col-md-1 cuadro_verde"  ><h3>B</h3></div>
                  <div class="col-md-11  text-center titulo-destacado-lista-inc" ><h3>REVISTA INTERNA</h3></div>
                  </div>

                  <div class="col-md-6">
                  <div class="col-md-12 no-padding"><img src="<?php echo base_url()?>assets/frontend/img/temas/caluga_noticias.jpg" alt="" class="img-responsive"></div>
                  <div class="col-md-1 cuadro_verde"  ><h3>B</h3></div>
                  <div class="col-md-11  text-center titulo-destacado-lista-inc" ><h3>MIS NOTICIAS</h3></div>
                  </div>
                  </div>

                  <?php */ ?>

            </div>			
        </div>
    </div>
</section>


<div id="Modal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Importante</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-center"></h4>
        <p style="text-align: center;">
            Hola! Por favor no cierres la intranet, tendremos información en línea que será de gran utilidad. Gracias!!! 
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Pincha Aquí</button>
        
      </div>
    </div>

  </div>
</div> 
