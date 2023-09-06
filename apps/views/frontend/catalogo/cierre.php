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
                      <div class="alert alert-info" style="margin: 30px 0 30px 0;">
<h5>Su Solicitud ha sido enviada de forma correcta <br />Su Numero de Solicitud es <?php echo $solicitud ?></h5>
</div>

                </div>
            </div>
          </div>
          </form>
		</div>
	</div>
</section>
 
 
 
<div class="alert alert-info" style="margin: 30px 0 30px 0;">
<h5>Su Solicitud ha sido enviada de forma correcta <br />Su Numero de Solicitud es <?php echo $solicitud ?></h5>
</div>
