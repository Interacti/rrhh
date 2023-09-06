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


                <div class="col-md-12">
                    <p>
                        En esta sección usted podrá acceder en formato pdf a sus últimos 3 cobranzas , para los tramites que estime conveniente.
                    </p>
                </div>

               
                <div class="col-md-12 no-padding">
                    <?php if($liq) :?>
                    <div class="col-md-12 noticias-bienestar-box"  >
                     
                        <table class="table table-bordered table-hover">
                            <tbody>
                              
                                <?php foreach ($liq as $lq):?>
                                <tr>
                                    <td>Descargar Cobranza <?php echo MonthNameCL($lq->month) ?> <?php echo ($lq->year) ?></td>
                                    <td class="text-center"><a target="_blank"  href="<?php echo base_url() ?>rrhh/cobranzas/descargar/<?php echo $lq->serial ?>"><i class="fa fa-download"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                               
                            </tbody>
                        </table>

                    </div>
                    <?php else:?>
                    <div class="col-md-12 noticias-bienestar-box text-center" style="margin-top: 50px;" >
                        <h3>No existen archivos para descargar</h3>
                        <p>Esta seccion es exclusiva para area de ventas</p>
                    </div>
                    
                    <?php endif;?>
                    
                </div>


            </div>
        </div>
    </div>
</section>