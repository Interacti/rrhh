
 
<!--<div id="dialog"></div>
<div id="dialog-message" title="Eliminar Canje">
	<p>
		<span class="ui-icon ui-icon-circle-check"
			style="float: left; margin: 0 7px 50px 0;"></span> El canje se ha
		eliminado de forma correcta
	</p>
</div>
<div id="dialog-confirm" title="Eliminar Canje">
	<p>
		<span class="ui-icon ui-icon-alert"
			style="float: left; margin: 0 7px 20px 0;"></span>Esta apunto de
		eliminar esta solicitud de canje, si esta posee canjes asociados
		tambien se borraran<br />&iquest; Desea continuar de todas formas?
	</p>
</div>--> 

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
			<?php endif 
            
           
            
            ?>
         <!-- Filtro de fechas 
         	<div class="row-fluid" id="filtro-fechas">
         		<form action="<? echo BASE_URL ?>bo/desktop/DetalleSolicitud"	method="post" name="filter">
         		
         	
					<div class="span2">
						<div class="controls">
							<div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
								class="input-append date">
								<label class="control-label" for="appendedInputButton">Fecha
									Inicio</label> <input type="text" readonly
									value="<?php //echo isset($fInicio)? $fInicio : '';?>" size="16"
									class="input-small" id="fecha_inicio" name="fecha_inicio" /> <span
									class="add-on"><i class="icon-calendar"></i></span>
							</div>
						</div>
					</div>
				

					<div class="span2">
						<div class="control-group">
							<label class="control-label" for="appendedInputButton">Fecha
								Termino</label>
							<div class="controls">
								<div data-date-format="yyyy-mm-dd" data-date="" id="dp4"
									class="input-append date">
									<input type="text" readonly fecha_inicio size="16"
										class="input-small" id="fecha_termino" name="fecha_termino"
										value="<?php //echo isset($fTermino)? $fTermino : '';?>" /> <span
										class="add-on"><i class="icon-calendar"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="span2" id="btn-filtro-fechas">
						<div class="controls">
							<a	href="javascript:;" onClick="document.filter.submit()" class="btn btn-primary" ><i class=" icon-filter icon-white"></i> Filtrar Fechas	</a>
						</div>
					</div>
				
					<div class="span3" id="btn-filtro-fechas">
						<div class="control-group">
							<div class="controls">
							<?php
							/*
							 * if (count($solicitudes)>0):?> <a href="<? echo BASE_URL ?>bo/desktop/SolicitudesToExecel/<?php echo isset($fInicio)? $fInicio : '';?>/<?php echo isset($fTermino)? $fTermino : '';?>" class="btn btn-primary"><i class=" icon-download icon-white"></i> Exportar a Excel</a> <?php endif
							 */
							?>		
							</div>
						</div>
					</div>
					
					
					
					
         		</form>
         	</div> 
          fin filtro -->
          
          
           
			<div class="separador"></div>
           
			<div class="row-fluid">
				<table cellpadding="0" cellspacing="0" border="0" class="table " id="">
					<thead>
						<tr>
							<th width="1%">ORDEN</th>
							<th width="2%">RUT</th>
							<th width="7%">NOMBRE</th>
							<th width="3%">TIPO AGENTE</th>
							<th width="2%">MONTO</th>
							<th width="1%">ITEMS</th>
							<th width="2%">FECHA EMI.</th>
							<th width="2%">FECHA DES.</th>
							<th width="5%">ESTADO</th>
							<th width="6%">ACCION</th>

						</tr>
					</thead>
					<tbody>


				<?php
                print_r($solicitudes); 
				$cls = '';
				$clsboton = '';
				$enviada = '';
                //die();
				foreach ( $solicitudes as $sol ) :
					if ($sol->descripcion === 'Enviada') {
						$cls = 'success';
						$enviada = true;
					}else{
					   
                       	$cls = '';
						$enviada = false;
					}
					;
					?>	
                
					<tr class="<?php echo $cls?>">
							<td align="left"><?php echo $sol->id_solicitud ?></td>
							<td align="left"><?php echo $sol->rutsocio?></td>
							<td align="left"><?php echo strtoupper(strtolower($sol->nombre)) .' '.strtoupper(strtolower($sol->apellido)) ?></td>
							<td align="left"><?php echo $sol->tipo?></td>
							<td align="right"><?php echo number_format( $sol->monto,0,',','.') ?></td>
							<td align="left"><?php echo $sol->cantidad ?></td>
							<td align="left"><?php echo setea_fecha($sol->fecha)?></td>
							<td align="left"><?php echo setea_fecha($sol->fecha_des)?></td>
							<td align="left"><?php echo strtoupper($sol->descripcion)?></td>

							<td>
								<div class="btn-group">
                                 
									<a class="btn " rel="tooltip" title="Modificar Solicitud"
										href="javascript:EditaEstatus(<?php echo $sol->id_solicitud ?>)">
										<i class="icon-edit"></i>
									</a> 
                                    
                                    <a class="btn " rel="tooltip" title="Detalle Solicitud"
										href="<?php echo BASE_URL ?>bo/desktop/detalleSolicitud/<?php echo $sol->id_solicitud;?>">
										<i class=" icon-th-list"></i>
									</a>
								    <?php if(!$enviada) : ?>
									<a class="btn" rel="tooltip" title="Eliminar Solicitud"
										href="javascript:;"
										onclick="DeleteSolicitud(<?php echo $sol->id_solicitud;?>)"> <i
										class=" icon-trash"></i>
									</a>
									<?php else :?>
										<a class="btn disabled" rel="tooltip"
										title="Eliminar Solicitud" href="javascript:;"> <i
										class=" icon-trash"></i>
									</a>
									<?php endif; ?>									
								</div>
							</td>
						</tr>
				<?php endforeach;?>


				</tbody>
				</table>



			</div>

		</div>
	</div>