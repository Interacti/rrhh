<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
            <!-- MENU  LATERAL -->
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>	
            <!-- FIN MENU LATERAL -->
            <div class="col-md-9 " >
                <div class="col-md-12">
                    <h2 class="titulo-staticos">
                        <strong>
                            <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower(str_replace('-', ' ', $subcategoria))); ?> 
                        </strong>
                    </h2> 
                </div>	


                <?php if ($banner): ?>
                    <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
                        <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>"  class="center-block  img-responsive">    
                    </div>
                <?php endif; ?>

                <?php 
                
                //var_dump($info->Data);
                //echo $info->data ="" ? "s" : "n";
                if ($info->Data) : ?>
                    <div class="col-md-12 no-padding">
                        <?php foreach ($info->Data as $in): ?>
                            <div class="col-md-12 noticias-bienestar-box"  >
                                <div class="col-md-3 no-padding"> <img src="<?php echo LIST_IMAGE . 'noticias/' . $in->list_image ?>"  tr class="img-responsive" alt=""> </div>
                                <div class="col-md-9" >
                                    <div class="col-md-12 noticias-bienestar-title" ><?php echo $in->title ?></div>
                                    <div class="col-md-12 noticias-bienestar-short-text"><?php echo $in->excerpt ?></div>
                                    <div class="col-md-4 col-md-push-8 m-t-70"  >
                                        <a  href="<?php echo base_url() . '' . strtolower($categoria) . '/' . strtolower($subcategoria) . '/detalle/' . $in->slug ?>"   type="button" class="btn btn-large btn-block btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="pagination">
                        <?php echo $info->ShowLinks('class'); ?>    
                    </div>
                <?php else : ?>
                    <div class="col-md-12 noticias-bienestar-box"  >
                        <h3 class="text-center">No se encontraron noticias para esta categoria</h3>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>