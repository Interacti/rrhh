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
						<h3 class="box-title">Mis Solicitudes</h3>
					</div>
					<div class="box-body">
						<div class="h5">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Consulte Fecha Aqu&iacute;</strong></div>
						<div class="col-sm-3">
							<div class="form-group">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input class="form-control pull-right"
										id="datepicker_solicitud_1" type="text" readonly="readonly">
								</div>
								<!-- /.input group -->
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input class="form-control pull-right"
										id="datepicker_solicitud_2" type="text" readonly="readonly">
								</div>
								<!-- /.input group -->
							</div>
						</div>

						<div class="col-sm-3">
							<input class="btn bg-navy btn-flat margin" type="submit" value="Filtrar">
						</div>

						<!--<button class="btn bg-navy btn-flat margin" type="submit">
							<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Exportar a
							Excel
						</button>-->

						<div class="clearfix"></div>
						
						<hr>

						<div class="col-sm-12">
						 <div class="table-responsive"> 
							<table class="table table-bordered">
								<thead>
									<tr>
									    <th width="15%">ID SOL.</th>
                                        <th width="15%">FECHA SOL.</th>
                                        <th width="15%">ESTADO SOL.</th>
                                        <th width="15%">ITEMS SOL.</th>
                                        <th width="15%">MONTO SOL.</th>
                                        <th width="15%">DETALLE</th>
									</tr>
								</thead>
								<tbody>
							          <?php 
    
                                        foreach($lista as $p):
                                         if ($p->cantidad>0) {
                                        ?>
                                      <tr>
                                        <td class="tex-left"><?php echo $p->id_solicitud?></td>
                                        <td><?php echo setea_fecha($p->fecha)?></td>
                                        <td><?php echo $p->descripcion?></td>
                                        <td align="right"><?php echo $p->cantidad?></td>
                                        <td align="right"><?php echo number_format($p->monto,0,',','.')?></td>
                                        <td align="right"><a href="<?php echo BASE_URL  ?>solicitudes/detalle/<?php echo $p->id_solicitud?>">detalle</a></td>
                                        
                                      </tr>
                                       <?php 
                                          }
                                          endforeach
                                       ?>
								</tbody>
							</table>
							</div>
							<div class="pagination ">
                            	<?php //echo $cartola->ShowLinks('class');?>    
                             </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




<?php /*?>

<h3>Listado de Solicitudes realizadas</h3>
<div class="clear"></div>
<?php if (count($lista)>0) {?>
<table width="100%" class="carro" id="data">
  <thead>
  <tr>
    <th width="15%">ID SOL.</th>
    <th width="15%">FECHA SOL.</th>
    <th width="15%">ESTADO SOL.</th>
    <th width="15%">ITEMS SOL.</th>
    <th width="15%">MONTO SOL.</th>
    <th width="15%">DETALLE</th>
   
  </tr>
  </thead>
  <tbody>
    <?php 
    
    foreach($lista as $p):
     if ($p->cantidad>0) {
    ?>
  <tr>
    <td class="tex-left"><?php echo $p->id_solicitud?></td>
    <td><?php echo setea_fecha($p->fecha)?></td>
    <td><?php echo $p->descripcion?></td>
    <td align="right"><?php echo $p->cantidad?></td>
    <td align="right"><?php echo number_format($p->monto,0,',','.')?></td>
    <td align="right"><a href="<?php echo BASE_URL  ?>solicitudes/detalle/<?php echo $p->id_solicitud?>">detalle</a></td>
    
  </tr>
   <?php 
      }
      endforeach?>
  </tbody>
  <tfoot>
  
  
  </tfoot> 
  
</table>

<div class="paginacion paginacion-centered">
	<?php 
    // echo $lista->ShowLinks('class'); 
     ?>    
    </div>

<?php
} 
   
     else
      { ?>
        
         <div class="info"> No tienes solicitudes de canjes  </div>
      <?php 
      }
   
*/
?>
