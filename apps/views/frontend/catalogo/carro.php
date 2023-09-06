<section class="product-page page fix">
	<div class="container">
		<div class="row">
		  <?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
          <div class="col-md-9 no-padding">
            <form action="<?php echo BASE_URL ?>catalogo/enviarsolicitud/" method="post" name="frmSolicitud">
            <div class="box box-primary">
                <div class="box-header with-border">
					<h3 class="box-title">Solicitud de Canje</h3>
				</div>
                <div class="box-body">
                    <!-- datos -->
                     <div class="col-lg-8 col-sm-8">
                        <div class="col-lg-5 col-sm-5 separacion"><strong>Rut</strong></div>
                        <div class="col-lg-7 col-sm-7 separacion">&nbsp;<?php echo $this->session->userdata('id')?></div>
                        <div class="col-lg-5 col-sm-5 separacion"><strong>Nombre</strong></div>
						<div class="col-lg-7 col-sm-7 separacion">&nbsp;<?php echo $this->session->userdata('nombre') .' '.  $this->session->userdata('apellido');?></div>
						<div class="col-lg-5 col-sm-5 separacion"><strong>Sucursal</strong></div>
						<div class="col-lg-7 col-sm-7 separacion">&nbsp;<?php echo $this->session->userdata('id_sucursal')?></div>
						<div class="col-lg-5 col-sm-5 separacion"><strong>Fono Contacto</strong></div>
						<div class="col-lg-7 col-sm-7 separacion">&nbsp;<?php echo $this->session->userdata('telefono')?></div>
                        <div class="col-lg-5 col-sm-5 separacion"><strong>Fecha Solicitud</strong></div>
						<div class="col-lg-7 col-sm-7 separacion">&nbsp;<?php echo date('m/d/Y')?></div>
                    </div>
                    <div class="col-lg-12">
                    <hr style="border: 2px solid;" />
                    </div>
                   <!-- fin datos--> 
                     <?php  if ($carrito = $this->cart->contents()) :?>
                      <div class="col-sm-12">
                      <div class="col-md-12 text-center" ><h3>Detalle Solicitud</h3></div>
                      <br /><br />
                      <?php 
                        $carrito = $this->cart->contents();
                        foreach ($carrito as $item)  :
                      ?>
                           <div class="col-lg-6 col-sm-6 col-xs-12" style="border: 1px solid #ccc;padding:9px">
                                <h6><a href="#"><?php echo ucfirst($item['name']) ?></a></h6>
                           </div>
                           <div class="col-lg-3 col-sm-3 col-xs-6 text-center " style="border: 1px solid #ccc;padding:5px">
                              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="<?php echo BASE_URL?>catalogo/UpdateItemRest/<?php echo $item['rowid']?>" onclick="AddCart"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>
                              <div class="col-lg-4 col-md-4 col-xs-4 text-center "><input style="text-align: center;" type="text"  readonly="readonly" maxlength="4" size="1" value="<?php echo number_format($item['qty'],0,',','.')  ?>" name="qtybutton" class="cart-plus-minus-box"></div>
                              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="<?php echo BASE_URL?>catalogo/UpdateItemAdd/<?php echo $item['rowid']?>" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                           </div>
                           <div class="col-lg-3 col-sm-3 col-xs-6 text-center" style="border: 1px solid #ccc;padding:6px">
                            <a href="<?php echo BASE_URL.'catalogo/DeleteItemCart/' . $item['rowid'] ?>"><i class="fa fa-trash-o"></i></a>
                           </div>
                           <div class="clearfix"></div>
                       <?php endforeach ?>	
                      </div>
                      <div class="clearfix"></div>
                      <?php if ($this->session->flashdata('error_stock')!="") : ?>
                                <div class="alert alert-danger" > <?php echo $this->session->flashdata ( 'error_stock' ); ?></div>
                      <?php endif?>
                      
                      
                      
                    
                      <div class="col-lg-12">
                        <div class="total">
                    						<h6>Total <span><?php echo number_format($this->cart->total(),0,',','.')  ?></span></h6>
 					    </div>
                      </div>
                      <div class="clearfix"></div>
                      <?php if ($this->cart->total()<PuntosSocio($this->session->userdata('id'))) : ?>
                                <div class="col-sm-5 col-sm-offset-4 col-xs-10 col-xs-offset-2">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;Solicitar</button>
                                    <!--<a class="btn btn-primary btn-md" href="http://www.hardsoft.cl/rutaparaiso_new/catalogo/solicitud"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;Solicitar</a>-->
                                    <a class="btn btn-primary btn-md" href="<?php echo BASE_URL?>catalogo/cancelarsolicitud" onclick="AddCart"><i class="fa fa-shopping-cart"></i>&nbsp;cancelar</a>
                                </div>
                            <div class="clearfix"></div>
                            <?php else:?>
                            <div class="clearfix"></div>
                                <div class="alert alert-danger" > No es posible realizar el canje debido a que su puntaje es insuficiente.
                                <ul><li>- Reduzca la cantidad de productos.</li><li>- Elimine Productos del carro.</li></ul></div>
                            <?php endif?>
                            <div class="clearfix" style="padding-top: 25px;"></div>
                      
                      
                      
                     <?php  else :?>
                     <div class="clearfix"></div>
                     <div class="col-lg-12">
                        <div class="alert alert-danger text-center" > No existen productos en su carror , por favor agregelos </div>
                     </div>
                     <?php endif;?>
                </div>
            </div>
          </div>
          </form>
		</div>
	</div>
</section>




