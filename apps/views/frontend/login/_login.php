<style>
.login label {
    font-size: 13px;
    font-weight: 400;
    margin-bottom: 5px;
    margin-top: 25px;
    width: 100%;
    text-align: left;
}

.bg {
    background: url('http://rrhh.caren.cl/assets/frontend/img/banners/web-fondo.gif');
    background-position: center center;
    background-repeat: no-repeat;
    min-height: 850px;
}

.page {
    padding: 50px 0 0;
}

</style>
<div class="login-page page fix bg" ><!--start login Area-->
	<div class="container" style="margin-bottom: 200px;">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-md-5 col-lg-4 col-lg-offset-4" style="background: #fff;padding: 15px;">
			    <div class="col-lg-12 col-xs-12" style="margin-bottom: 15px">
			     <img alt="" src="/responsive/assets/frontend/img/header/logo.png" class="responsive center-block">
			    </div>
			    <div class="clearfix"></div>
				<div class="login col-lg-12 text-center">
					<form id="login-form" action="<?php echo base_url()?>login/validar" method="post" >
						<h2>Iniciar Sesi&oacute;n</h2> 
						<label>Ingresa tus datos de acceso para iniciar sesi&oacute;n</label>
                        
                        <label>Rut</label>
						<input type="text" name="rut" id="rut" placeholder="Ej: 12345678-9" maxlength="12" />
                        
                        <label>Password</label>
						<input type="password" name="pass" id="pass" placeholder="" maxlength="12" />
						
						<input type="submit" value="login" />
					</form>
					<div class="clearfix" ></div>
					<?php if ($this->session->flashdata('errors')!="") : ?>
    					<div class="alert alert-danger " style="margin-top: 15px">
							<?php echo $this->session->flashdata ( 'errors' );?>
						</div>
   			 		<?php endif ?>
					<div style="margin-top: 20px;" class="col-lg-12 col-xs-12 col-sm-12  "><!--<img src="http://rrhh.caren.cl/assets/frontend/img/header/logo.png" />--></div>
					
				</div>
			</div>
		</div>
	</div>
</div><!--End login Area-->


