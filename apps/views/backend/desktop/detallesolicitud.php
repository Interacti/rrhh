<script type="text/javascript">



function DeleteCanjeSolicitud(id){

	 $( "#dialog-confirm" ).dialog({
		 resizable: false,
		 height:'auto',
		 modal: true,
		 buttons: {
		 "Eliminar": function() {
	           $.ajax({
	                    type: "POST",		   
	                    url: '<?php echo BASE_URL ?>bo/desktop/eliminar/'+id,
	                    data: $("#frmStatus").serialize(),
			            dataType: "json",
	                    success: function(data)
	                    {

                          if(data['success']==='OK'){
                        	 $( "#dialog-confirm" ).dialog( "close" ); 
                             $( "#dialog-message" ).dialog({
	                        		 modal: true,
	                        		 buttons: {
	                        		 Ok: function() {
	                        		 $(location).attr('href','<?php echo BASE_URL ?>bo/desktop/solicitudes');       	 
	                        		 $( this ).dialog( "close" );
	                        		 
	                        		 
                      		 	}
                      		 }
                      	});

                          }

		                             
	                    }
	           })    


			 
		 },
		 Cancelar: function() {
		 $( this ).dialog( "close" );
		 }
		 }
		 });


}
 

</script>



<div id="dialog-message" title="Eliminar Canje">
<p>
<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
	El canje se ha eliminado de forma correcta
</p>
</div>
<div id="dialog-confirm" title="Eliminar Canje">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Esta apunto de eliminar este canje<br>Desea Continuar ?</p>
</div>


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
							<?php /*if (count($solicitudes)>0):?>
								<a
									href="<? echo BASE_URL ?>bo/desktop/SolicitudesToExecel/<?php echo isset($fInicio)? $fInicio : '';?>/<?php echo isset($fTermino)? $fTermino : '';?>"
									class="btn btn-primary"><i class=" icon-download icon-white"></i>
									Exportar a Excel</a>
							<?php endif */?>		
							</div>
						</div>
					</div>
					
					
					
					
         		</form>
         	</div>
          fin filtro -->	
         <div class="separador"></div>
         
         <div class="row-fluid">
         	<table cellpadding="0" cellspacing="0" border="0" class="table "
			id="example">
			<thead>
				<tr>
					<th width="1%">ORDEN</th>
					<th width="1%">CODIGO</th>
					<th width="5%">PRODUCTO</th>
					<th width="1%">VALOR</th>
					<th width="3%">FECHA SOL</th>
					<th width="3%">PROVEEDOR</th>
					<th width="3%">ACCION</th>

				</tr>
			</thead>
			<tbody>


				<?php foreach ($solicitudes as $sol):
                
                ?>	
					<tr>
					<td align="left"><?php echo $sol->nro_orden ?></td>
					<td align="left"><?php echo $sol->codigo_antiguo?></td>
					<td align="left"><?php echo $sol->producto?></td>
					<td align="right"><?php echo number_format( $sol->valor_en_puntos,0,',','.') ?></td>
					<td align="left"><?php echo setea_fecha($sol->fecha)?></td>
					<td align="left"><?php echo $sol->proveedor ?></td>
					<td>
					<!-- <a class="btn btn-small"
						href="<? echo BASE_URL ?>bo/desktop/eliminar/<?php echo $sol->id_canje ?>/<?php echo $sol->nro_orden ?>">
							<i class="icon-remove" title="Eliminar"></i> Eliminar
					</a>-->
				    <?php if ($sol->estado!=3):?>
					<a class="btn btn-small" rel="tooltip" title="Eliminar Canje"
						href="javascript:;" onClick="DeleteCanjeSolicitud(<?php echo $sol->id_canje ?>)">
							<i class="icon-trash" title="Eliminar"></i> 
					</a>
                    <?php else: ?>
                    
                    <a class="btn disabled" rel="tooltip" title="Eliminar Canje"
						href="javascript:;" >
							<i class="icon-trash" title="Eliminar"></i> 
					</a>
					
					<?php endif;?>
					</td>
				</tr>
				<?php endforeach;?>


				</tbody>
		</table>
         
         
         
         </div>
         
		</div>
</div>






















  