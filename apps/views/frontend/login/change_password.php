<div class="login-page page fix"><!--start login Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-md-5 col-lg-4 col-lg-offset-4" style="background: #fff;padding: 15px;">
			    <div class="col-lg-12 col-xs-12" style="margin-bottom: 15px">
			     <img alt="" src="/responsive/assets/frontend/img/header/logo.png" class="responsive center-block">
			    </div>
			    <div class="clearfix"></div>
				<div class="login col-lg-12 text-center">
					<form id="login-form" action="<?php echo base_url()?>home/cambiar" method="post" >
						<h2>Cambiar Clave</h2> 
						<label>Para mayor seguridad le rogamos realizar cambio de contraseña</label>
                        
                        <label>Nueva Contraseña</label>
						<input type="password" name="password" id="pass" placeholder="" maxlength="12" />
					    <label>Reigrese su nueva contraseña</label>
						<input type="password" name="repassword" id="re_password" placeholder="" maxlength="12" />
						
						<input type="submit" value="login" />
					</form>
					<div class="clearfix" ></div>
					<?php 
                    
                    $this->session->userdata('id');
                    if ($this->session->flashdata('errors')!="") : ?>
    					<div class="alert alert-danger " style="margin-top: 15px">
							<?php echo $this->session->flashdata ( 'errors' );?>
						</div>
   			 		<?php endif ?>
					
					
				</div>
			</div>
			<div style="margin-top: 150px;" class="col-lg-4 col-lg-offset-4  col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 "><img src="http://rrhh.caren.cl/assets/frontend/img/header/logo.png" /></div>
			
		</div>
	</div>
</div><!--End login Area-->


