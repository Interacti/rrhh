
<script>
 $(document).ready(function(){
     $('#dp3').datepicker(); 
	 $('#dp4').datepicker();
		
 
 })   

 </script>





<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
			<?php
			$myFormData = $this->session->flashdata ( 'formdata' );
			if ($this->session->flashdata ( 'msg' ) != "") :
				?>
	
					<div class="alert alert-success">
						<?php
				echo $this->session->flashdata ( 'msg' );
				?>
					</div>
					
					
					
					
			<?php endif ?>
			
			
			<?php
			$myFormData = $this->session->flashdata ( 'formdata' );
			if ($this->session->flashdata ( 'error' ) != "") :
				?>
	
					<div class="alert alert-success">
						<?php
				echo $this->session->flashdata ( 'error' );
				?>
					</div>
			<?php endif ?>
			
         <!-- Filtro de fechas -->
			<div class="row-fluid" id="filtro-fechas">
				<form action="<?php echo BASE_URL ?>bo/desktop/PlanillaCanje"
					method="post" name="filter">

					<!-- Inicio Fecha Inicio -->
					<div class="span2">
						<div class="controls">
							<div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
								class="input-append date">
								<label class="control-label" for="appendedInputButton">Fecha
									Inicio</label> <input type="text" readonly
									value="<?php echo isset($fInicio)? $fInicio : '';?>" size="16"
									class="input-small" id="fecha_inicio" name="fecha_inicio" /> <span
									class="add-on"><i class="icon-calendar"></i></span>
							</div>
						</div>
					</div>
					<!-- Fin Fecha Inicio -->

					<!-- Inicio Fecha Termibo -->

					<div class="span2">
						<div class="control-group">
							<label class="control-label" for="appendedInputButton">Fecha
								Termino</label>
							<div class="controls">
								<div data-date-format="yyyy-mm-dd" data-date="" id="dp4"
									class="input-append date">
									<input type="text" readonly fecha_inicio size="16"
										class="input-small" id="fecha_termino" name="fecha_termino"
										value="<?php echo isset($fTermino)? $fTermino : '';?>" /> <span
										class="add-on"><i class="icon-calendar"></i></span>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin Fecha Termino -->

					<!-- Boton Aceptar -->
					<div class="span2" id="btn-filtro-fechas">
						<div class="controls">
							<a href="javascript:;" onClick="document.filter.submit()"
								class="btn btn-primary"><i class=" icon-filter icon-white"></i>
								Filtrar Fechas </a>
						</div>
					</div>
					<!-- Fin Boton Aceptar -->

					<!-- Boton Excel -->
					<div class="span3" id="btn-filtro-fechas">
						<div class="control-group">
							<div class="controls">
							<?php if (count($solicitudes)>0):?>
								<a
									href="<?php echo BASE_URL ?>bo/desktop/SolicitudesToExecel/<?php echo isset($fInicio)? $fInicio : '';?>/<?php echo isset($fTermino)? $fTermino : '';?>"
									class="btn btn-primary"><i class=" icon-download icon-white"></i>
									Exportar a Excel</a>
							<?php endif ?>		
							</div>
						</div>
					</div>
					<!-- Fin Boton Excel -->



				</form>
			</div>
			<!-- fin filtro -->
			<div class="separador"></div>

			<div class="row-fluid">
				<table cellpadding="0" cellspacing="0" border="0" class="table "
					id="example">
					<thead>
						<tr>
							
							<th width="7%">FECHA SOL.</th>
							<th width="5%">RUT SOCIO.</th>
							<th width="20%">NOMBRE.</th>
							<th width="10%">PRODUCTO</th>
							<th width="5%">ITEMS</th>
							<th width="5%">PUNTOS.</th>
							
							<th width="7%">SUCURSAL.</th>

						</tr>
					</thead>
					<tbody>


				<?php foreach ($solicitudes as $sol):?>	
					<tr>
							
							<td align="left"><?php echo setea_fecha($sol->fecha)?></td>
							<td align="left"><?php echo $sol->rut_socio?></td>
							<td align="left"><?php echo $sol->nombre ?> <?php echo $sol->apellido ?> </td>
							<td align="left"><?php echo strtoupper( $sol->producto) ?></td>
							<td align="left"><?php echo $sol->items?></td>
							<td align="right"><?php echo number_format( $sol->puntos,0,',','.') ?></td>
							
							<td align="left"><?php echo strtoupper( $sol->sucursal )?></td>
							

						</tr>
				<?php endforeach;?>


				</tbody>


				</table>
			</div>

		</div>
	</div>

	<div class="separador"></div>