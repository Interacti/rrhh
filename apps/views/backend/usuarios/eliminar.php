<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
                
		 		<div class="alert alert-info">
                   Esta a punto de eliminar un usuario. ¿ Desea Continuar ?

						
						<a class="btn btn-primary btn-small" href="<?php echo BASE_URL?>bo/usurio/Borrar/<?php echo $id ?>">
							<i class=" icon-remove icon-white"></i> 
							Eliminar 
						</a>

						<a id="btn-aceptar" name="aceptar" class="btn btn-primary btn-small" >
							<i class=" icon-cancel icon-white"></i> 
							Cancelar
						</a>
					
		 	   </div>
		</div>
	</div>
</div>			