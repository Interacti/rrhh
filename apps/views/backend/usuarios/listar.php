
<script>
$(document).ready(function(){
    jQuery("#msg").show('slow').fadeIn();		    

sw=0;
setTimeout(function(){
	if (sw==0) {
	   
	  $("#msg").hide('slow');
      sw=1
     } 
      		    
	},3000);

})
</script>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>
<!-- fin modal -->





<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
			<div class="row-fuid">
		 			<?php if ($this->session->flashdata('success')!="") : ?>
    		<div class="alert alert-success" id="msg">
            <?php
							echo $this->session->flashdata ( 'success' );
							?>
        	</div>
    		<?php endif ?>
		 	
		 	<div class="separador"></div>

				<a href="<? echo BASE_URL ?>bo/usuarios/Agregar"
					class="btn btn-primary btn-small"> <i
					class="icon-plus-sign icon-white"></i> Nuevo Usuario
				</a>
				<div class="separador"></div>
				<table cellpadding="0" cellspacing="0" border="0"
					class="table table-striped table-bordered table-hover" id="example">
					<thead class="text-center">

						<tr>
							<th width="1%" height="20">Id</th>
							<th width="10%">NOMBRE</th>
							<th width="7%">EMAIL</th>
							<th width="5%">PREFIL</th>
							<th width="2%">ESTADO</th>
							<th width="10%" class="center"></th>
						</tr>
					</thead>
					<tbody>
		
    <?php
				
				if (is_array ( $data )) :
					
					foreach ( $data as $ls ) :
						
						?>

 			    
                <tr>
							<td align="left"><?php echo $ls->id?></td>
							<td align="left"><?php echo $ls->nombre?>&nbsp;<?php echo $ls->apellido?></td>
							<td align="left"><?php echo $ls->email?></td>
							<td align="left"><?php echo $ls->descripcion?></td>
							<td align="left"><?php echo $ls->estatus==1 ? 'Activo' : 'Inactivo' ?></td>
							<td align="right">

							
							<div class="btn-group">
									<a class="btn btn-small"
										href="<? echo BASE_URL ?>bo/usuarios/Editar/<?php echo $ls->id?>">
										<i class="icon-edit" title="Editar"></i> Editar
									</a>
						
									<a class="btn btn-small"
										href="<? echo BASE_URL ?>bo/usuarios/Activar/<?php echo $ls->id?>/<?php echo $ls->estatus?>">
                            <?php if  ($ls->estatus==0){ ?>
                            <i class="icon-ok" title="Activar"></i> Activar
                            <?php }else{ ?>
                            <i class="icon-ban-circle "
										title="Desactivar"></i> Desactivar
                            <?php } ?>
                            </a>
								</div>


								



							</td>
						</tr>
                <?php
					endforeach
					;
				
				
                
                   endif;
				
				?>
                
		
			</tbody>
				</table>


			</div>
		</div>
	</div>
</div>







