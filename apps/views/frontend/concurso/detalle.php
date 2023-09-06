<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
            <div class="col-md-9 " >
                <?php if (count($contenido) > 0) : ?>
                    <div class="col-md-12 no-padding">
                        <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower('Prevencion de riesgos')); ?> / <?php echo ucfirst(strtolower($contenido[0]->title)); ?> </strong></h2> </div>
                    <?php foreach ($contenido as $co): ?>
                        <div class="col-md-12 noticias-bienestar-box"  >
                            <div class="col-md-4 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/concurso/<?php echo $co->list_image ?>"  class="img-responsive" alt=""> </div>
                            <div class="col-md-8" >
                                <div class="col-md-12 noticias-bienestar-title" ><?php echo $co->title ?></div>
                                <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->content ?></div>
                                <div class="clearfix"></div>
                                <?php if (!empty($co->alternate_file)):?>
                                <div class="col-md-4 m-t-70" style="margin-top: 50px;"  >
                                    <a class="btn btn-primary" href="<?php echo base_url()?>assets/frontend/pdf/<?php echo $co->alternate_file?>" target="_blank"> <i class="fa fa-download"></i> DESCARGA PROGRAMA</a>
                                </div>
                                <?php endif;?>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>