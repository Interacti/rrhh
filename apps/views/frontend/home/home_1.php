<!-- INICIO BANNERS-->
<style>
    .cycle-slideshow {

        margin: 0px auto !important;

    }

    .carousel-caption-home {
        position: absolute;
        right: 0%;
        bottom: 0;
        left: 0%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
        background: rgba(0, 0, 0, 0.5);
    }






    #car-noticias>.carousel-inner>.item>a>img,
    #car-noticias>.carousel-inner>.item>img,
    #car-cumple>.carousel-inner>.item>a>img,
    #car-cumple>.carousel-inner>.item>img {
        width: 350px;
        height: 350px;
    }



    .casco {
        width: 28px !important;
        height: 28px !important;
    }
</style>


<?php $this->load->view('frontend/_carrusel') ?>




<div class="clearfix"></div>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
            <div class="col-md-9 ">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titulo-destacado-bienestar"> <strong> DESTACADOS / BIENESTAR </strong></h2>
                    </div>
                    <!-- Noticias -->
                    <div class="col-md-5 col-md-offset-1 col-sm-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="0.5s" style="padding-bottom:30px">
                        <div class="col-md-12 no-padding">

                            <div id="car-noticias" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!--<ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>-->

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $a = 0;
                                    foreach ($noticias as $not) : ?>
                                        <div class="item <?php echo $a == 0 ? 'active' : '' ?>">
                                            <a href="/bienestar/noticias-internas/detalle/<?php echo $not->slug ?>">
                                                <img width="100%" src="/assets/frontend/img/noticias/<?php echo $not->list_image ?>" alt="Chania" class="img-responsive">
                                                <div class="carousel-caption-home">
                                                    <h5><?php echo $not->title ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $a++;
                                    endforeach; ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#car-noticias" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#car-noticias" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2  cuadro_azul"><i class="fa fa-newspaper-o fa-2x"></i></div>
                        <div class="col-md-10 col-sm-10  text-center titulo-destacado-lista"><a href="<?php echo base_url() ?>bienestar/noticias-internas">
                                <h3>Noticias</h3>
                            </a></div>
                    </div>

                    <!-- Fin Noticias -->
                    <!-- concurso -->

                    <div class="col-md-5 col-sm-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.3s" style="padding-bottom:30px">
                        <div class="col-md-12 no-padding">
                            <div class="col-md-12 no-padding">
                                <div id="car-concurso" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!--<ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>-->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <?php
                                        $a = 0;



                                        foreach ($concurso as $concur) : ?>
                                            <div class="item <?php echo $a == 0 ? 'active' : ''; ?>">
                                                <a href="/comercial-e-incentivo/concursos/detalle/<?php echo $concur->slug ?>">
                                                    <img src="/assets/frontend/img/concurso/<?php echo $concur->list_image ?>" alt="">
                                                    <div class="carousel-caption-home">
                                                        <h5><?php echo $concur->title ?></h5>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php $a++;
                                        endforeach;
                                        ?>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#car-concurso" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#car-concurso" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2  col-sm-2 cuadro_verde" style="text-align:center"><img src="/assets/frontend/img/iconos/Casco.png" class="casco img-responsive center-block" width="28"></i></div>
                        <div class="col-md-10 col-sm-10  text-center titulo-destacado-lista-verde"><a href="<?php echo base_url() ?>comercial-e-incentivo/concursos">
                                <h3>Prevenci&oacute;n de Riesgos</h3>
                            </a></div>
                    </div>

                    <!-- concurso -->






                    <div class="clearfix"></div>

                    <!-- Bienvenidos -->

                    <div class="col-md-5 col-md-offset-1 col-sm-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="1.5s" style="padding-bottom:30px">
                        <div class="col-lg-12 col-sm-12 no-padding">
                            <div id="car-abordo" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $a = 0;
                                    foreach ($abordo as $abo) : ?>
                                        <div class="item <?php echo $a == 0 ? 'active' : '' ?>">
                                            <a href="/rrhh/nuevos-a-bordo-equipo-caren">
                                                <img src="/assets/frontend/img/abordo/<?php echo $abo->list_image ?>" alt="Chania">
                                                <div class="carousel-caption-home">
                                                    <h5><?php echo $abo->title ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $a++;
                                    endforeach; ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#car-abordo" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#car-abordo" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 cuadro_azul"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></div>
                        <div class="col-md-10 col-sm-10  text-center titulo-destacado-lista"><a href="<?php echo base_url() ?>rrhh/nuevos-a-bordo-equipo-caren">
                                <h3>Bienvenidos</h3>
                            </a></div>
                    </div>
                    <!-- Bienvenidos -->


                    <!-- Cumpleaños -->
                    <div class="col-md-5 col-sm-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay="1s" style="padding-bottom:30px">
                        <div class="col-md-12 col-sm-12 no-padding">
                            <div id="car-cumple" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!--<ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>-->

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $a = 0;

                                    if (count($cumples) > 0) :
                                        foreach ($cumples as $cumple) : ?>
                                            <div class="item <?php echo $a == 0 ? 'active' : ''; ?>">
                                                <a href="/temas/bienestar/cumpleanos">
                                                    <img src="/assets/frontend/img/personal/<?php echo $cumple->imagen_socio ?>" alt="">
                                                    <div class="carousel-caption-home">
                                                        <h5><?php echo $cumple->nombre_full ?></h5>
                                                        <h6><?php echo date('d-m', strtotime($cumple->fecha_nacimiento)) ?></h6>
                                                        <h6><?php echo $cumple->centrocosto ?></h6>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php $a++;
                                        endforeach;
                                    else :
                                        ?>
                                        <div class="item active">
                                            <a href="/temas/bienestar/cumpleanos">
                                                <img src="/assets/frontend/img/intranet.gif" alt="">
                                            </a>
                                        </div>
                                    <?php endif ?>

                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#car-cumple" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#car-cumple" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-2  col-sm-2 cuadro_azul"><i class="fa fa-birthday-cake fa-2x"></i></div>
                        <div class="col-md-10 col-sm-10 text-center titulo-destacado-lista"><a href="<?php echo base_url() ?>/temas/bienestar/cumpleanos">
                                <h3>Cumpleaños del Día</h3>
                            </a></div>
                    </div>

                    <!-- Fin Cumpleaños -->



                    <!-- Destacado -->
                    <div class="col-md-5  col-md-offset-1 col-sm-6  wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1.3s" style="padding-bottom:30px">
                        <div class="col-md-12  col-sm-12 no-padding">
                            <div id="car-destacado" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!--<ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>-->

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $a = 0;
                                    foreach ($personal as $perso) : ?>
                                        <div class="item <?php echo $a == 0 ? 'active' : ''; ?>">
                                            <a href="/bienestar/personal-destacado">
                                                <img class="img-responsive" src="/assets/frontend/img/destacado/<?php echo $perso->list_image ?>" alt="">
                                                <div class="carousel-caption-home">
                                                    <h5><?php echo $perso->title ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $a++;
                                    endforeach; ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#car-destacado" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#car-destacado" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                        </div>
                        <div class="col-md-2  col-sm-2  cuadro_azul"><i class="fa  fa-user fa-2x"></i></div>
                        <div class="col-md-10 col-sm-10  text-center titulo-destacado-lista"><a href="<?php echo base_url() ?>bienestar/personal-destacado">
                                <h3>Personal Destacado</h3>
                            </a></div>
                    </div>
                    <!-- Fin Destacado -->

                    <!-- Idea -->


                    <div class="col-md-5 col-sm-6  wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.7s" style="padding-bottom:30px">
                        <div class="col-md-12 no-padding"><img src="<?php echo base_url() ?>assets/frontend/img/banners/super-idea3.jpg" alt="" width="350" height="350" class=""></div>
                        <div class="col-md-2 col-sm-2  cuadro_verde"><i class="fa fa-lightbulb-o fa-2x"></i></div>
                        <div class="col-md-10 col-sm-10 text-center titulo-destacado-lista-verde"><a href="<?php echo base_url() ?>temas/comercial-e-incentivo/super-idea">
                                <h3>Super Idea</h3>
                            </a></div>
                    </div>
                    <!-- Fin Idea -->


                </div>


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