<?php if ($contenido[0]->seo_sub_categoria == 'beneficios-y-convenios') : ?>

    <section id="product" style="margin-top:25px">
        <div class="container no-padding">
            <div class="row">
                <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
                <div class="col-md-9 " >
                    <?php if (count($contenido) > 0) : ?>
                        <div class="col-md-12 no-padding">
                            <?php foreach ($contenido as $co): ?>
                                <div class="col-md-12 noticias-bienestar-box"  >
                                    <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>"  class="imh-responsive" alt=""> </div>
                                    <div class="col-md-9" >
                                        <div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo ?></div>
                                        <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                                        <div class="col-md-12 noticias-bienestar-short-text" style="padding-top: 25px;;">
                                            <?php if ($co->seo == 'beneficios-de-la-mutual-de-seguridad'): ?>
                                            <a href="http://rrhh.caren.cl/temas/bienestar/beneficios-y-convenios/beneficios-de-la-mutual-de-seguridad" class="btn btn-large btn-block btn-primary">CONVENIOS MUTUAL</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    </section>

<?php endif; ?>



<?php if ($contenido[0]->seo_sub_categoria == 'noticias-internas') : ?>

    <section id="product" style="margin-top:25px">
        <div class="container no-padding">
            <div class="row">
                <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
                <div class="col-md-9 " >
                    <?php if (count($contenido) > 0) : ?>
                        <div class="col-md-12 no-padding">
                            <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->titulo)); ?> </strong></h2> </div>
                        <?php foreach ($contenido as $co): ?>
                            <div class="col-md-12 noticias-bienestar-box"  >
                                <div class="col-md-12 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img2 ?>"  class="imh-responsive" alt=""> </div>
                                <div class="col-md-12" >
                                    <div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo ?></div>
                                    <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                                    <div class="col-md-4 col-md-push-8 m-t-70"  >

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php if ($contenido[0]->seo_sub_categoria == 'galeria-de-fotos') : ?>

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














<?php endif; ?>


<?php if ($contenido[0]->seo_sub_categoria == 'personal-destacado') : ?>

    <section id="product" style="margin-top:25px">
        <div class="container no-padding">
            <div class="row">
                <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
                <div class="col-md-9 " >
                    <?php if (count($contenido) > 0) : ?>
                        <div class="col-md-12 no-padding">
                            <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->titulo)); ?> </strong></h2> </div>
                        <?php foreach ($contenido as $co): ?>
                            <div class="col-md-12 noticias-bienestar-box"  >
                                <div class="col-md-4 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img2 ?>"  class="imh-responsive" alt=""> </div>    
                                <div class="col-md-8" >
                                    <div class="col-md-12 noticias-bienestar-short-text">
                                        <h3 style="color:#36a9e0"><?php echo $co->titulo ?></h3>
                                        <br>
                                        <?php echo $co->texto ?>
                                    </div>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>


<?php if ($contenido[0]->seo_sub_categoria == 'concursos') : ?>

    <section id="product" style="margin-top:25px">
        <div class="container no-padding">
            <div class="row">
    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
                <div class="col-md-9 " >
                <?php if (count($contenido) > 0) : ?>
                        <div class="col-md-12 no-padding">
                            <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->titulo)); ?> </strong></h2> </div>
        <?php foreach ($contenido as $co): ?>
                            <div class="col-md-12 noticias-bienestar-box"  >
                                <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img2 ?>"  class="imh-responsive" alt=""> </div>
                                <div class="col-md-9" >
                                    <div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo ?></div>
                                    <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                                    <div class="col-md-4 col-md-push-8 m-t-70"  >

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
        <?php endforeach; ?>

                    </div>
    <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

