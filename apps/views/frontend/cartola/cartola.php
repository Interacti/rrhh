<script>
$(document).ready(function() {
//$(".tbl").fixedtableheader();
//Date picker
   
});

function validaFiltro(){
    

    
    
}

</script>
<style>
.separacion {
	padding: 10px 0px;
}

.input-group .input-group-addon {
	background-color: #fff;
	border-color: #d2d6de;
	border-radius: 0;
}

.form-control {
	border-color: #d2d6de;
	border-radius: 0;
	box-shadow: none;
}

.btn.btn-flat {
	border-radius: 0;
	border-width: 1px;
	box-shadow: none;
}

.bg-navy {
	background-color: #001f3f;
	color: #fff;
}

.bg-navy:hover {
	background-color: #53A8E1;
	color: #fff;
}
</style>
<section class="product-page page fix">
	<div class="container">
		<div class="row">
			<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
			<div class="col-md-9 no-padding">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Mis Datos</h3>
					</div>
					<div class="box-body">
						<div class="col-sm-6">
							<div class="col-lg-5 col-xs-4 separacion"><strong>Nombre</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo $this->session->userdata('nombre') .' '.  $this->session->userdata('apellido');?></div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>Tipo Socio</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo $this->session->userdata('tipo')?>(<?php echo $this->session->userdata('desc_tipo')?>)</div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>Fecha Ingreso</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo setea_fecha($this->session->userdata('fecha_ingreso'))?></div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>Fono Contacto</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo $this->session->userdata('telefono')?></div>
						</div>
						<div class="col-sm-6">
                        <div class="clearfix"></div>
							<div class="col-lg-5 col-xs-4 separacion"><strong>RUT</strong></div>
							<div class="col-lg-7 col-xs-8 separacion"> <?php echo $this->session->userdata('id')?></div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>Oficina</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo $this->session->userdata('sucursal')?></div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>Fecha Registro</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo setea_fecha($this->session->userdata('fecha_ingreso'))?></div>
							<div class="clearfix"></div>
                            <div class="col-lg-5 col-xs-4 separacion"><strong>E-mail</strong></div>
							<div class="col-lg-7 col-xs-8 separacion">&nbsp;<?php echo $this->session->userdata('email')?></div>
							<div class="col-lg-7 col-xs-8 separacion text-right"><a href="<?php echo base_url()?>actualizar"><button class="btn bg-navy btn-flat margin">Actualiza tus datos</button></a></div>
						</div>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cartola de Puntos</h3>
					</div>
					<div class="box-body">
						<div class="h5">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Filtro</strong></div>
						<form action="" method="post" >
                        <div class="col-sm-3">
							<div class="form-group">
                            
								<div class="input-group datepicker_carto date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input class="form-control pull-right"
										id="datepicker_cartola_1" type="text" name="inicio" readonly="true">
								</div>
								<!-- /.input group -->
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<div class="input-group datepicker_carto date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input class="form-control pull-right"
										id="datepicker_cartola_2" type="text" name="termino" readonly="true">
								</div>
								<!-- /.input group -->
							</div>
						</div>

						<div class="col-sm-3 col-xs-6">
							<input class="btn bg-navy btn-flat margin" type="submit" value="Filtrar">
						</div>
                        <div class="col-sm-3 col-xs-6">
							<button class="btn bg-navy btn-flat margin" type="submit"><i class="fa fa-file-excel-o"></i> &nbsp;Descargar</button>
						</div>
                        </form>
						

						<div class="clearfix"></div>
						
						<hr>

						<div class="col-sm-12">
						
						<div class="col-md-12 no-padding"	>
							<h3 class="log-link-orange">Tus Puntos hoy : <?php echo number_format(PuntosSocio(),0,',','.') ?></h5>
						</div>	
						
						
						 <div class="table-responsive"> 
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Descripci&oacute;n</th>
										<th>Descuento</th>
										<th>Abono</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($cartola->getData() as $crt) :?>
									<tr>
										<td><?php echo setea_fecha($crt->fecha)?></td>
										<td><?php echo ucfirst(strtolower($crt->descripcion))?></td>
										<td><?php
                                          if($crt->tipo_operacion=='-'){
                                                echo number_format( $crt->monto,0 ,';','.');
                                          }else {
                                                echo "-";
                                          }
                                          ?>
                                        </td>
										<td><?php
                                         if($crt->tipo_operacion=='+'){
                                                 echo number_format( $crt->monto,0 ,';','.');
                                          }else {
                                                echo "-";
                                          }
                                          ?>
										</td>
									</tr>
								<?php endforeach; ?>	
									
								</tbody>
							</table>
							</div>
							<div class="pagination ">
                            	<?php echo $cartola->ShowLinks('class');?>    
                            </div>
						</div>
						<div class="clearfix"></div>
						<div class="alert alert-info" style="margin-top: 20px">
                            
                            <ul>
                                <li>Recuerda que los puntos de Ruta se calculan en base a las ventas formalizadas. Para estas últimas, no se consideran los últimos días del mes (a diferencia del cierre realizado por comisiones). </li>
                            </ul>
                     </div>
						
						
						
					</div>
					
				</div>
			</div>
		</div>
		
		
		
	</div>
	
	
</section>