<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
		  iframe:true
          
		});
	});
</script>

<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		    <?php if ($this->session->flashdata('success')!="") : ?>
    		<div class="alert alert-success">
            <?php 
            
            echo $this->session->flashdata('success'); 
            
         
        	?>
        	</div>
    <?php endif ?>
       
        <div class="row-fuid">
           
        	<a href="<?php echo BASE_URL ?>bo/banners/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Nuevo Banner
           </a>
          
        </div>  
        <br />
         
		  <!-- Inicio Tabla -->
		  <table cellpadding="0" cellspacing="0" border="0"
				class="table  table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" height="20">ID</th>
						<th width="5%">NOMBRE</th>
						<th width="5%">FECHA INICIO</th>
						<th width="5%">FECHA TERMINO</th>
						<th width="5%">ESTADO</th>
						<th width="10%">ACCION</th>
					</tr>
				</thead>
				<tbody>
		
    <?php
				
				if (is_array ( $data )) :
					
					foreach ( $data as $ls ) :
						
						?>

                <tr>
						<td align="left"><?php echo $ls->id_banner?></td>
						<td align="left"><?php echo $ls->bnr_descripcion?></td>
						<td align="left"><?php echo $ls->bnr_inicio?></td>
						<td align="left"><?php echo $ls->bnr_termino?></td>
						<td align="left"><?php echo $ls->bnr_estado==1 ? 'Activo' : 'Inactivo' ?></td>
						<td align="right">
                        
                        

							


							<div class="btn-group">
								<a class="btn btn-small btn-success"
									href="<?php echo BASE_URL ?>bo/banners/Editar/<?php echo $ls->id_banner?>">
									<i class="icon-edit icon-white" title="Editar"></i> Editar
								</a>
						
								<a class="btn btn-small fancybox btn-info" 
									href="<?php echo BASE_URL ?>assets/frontend/img/banners/<?php echo $ls->bnr_image?>">
									<i class="icon-camera icon-white" title="Editar"></i> Ver Imagen
								</a>
							<?php if  ($ls->bnr_estado==0){ ?>
								<a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/banners/Activar/<?php echo $ls->id_banner?>/<?php echo $ls->bnr_estado?>">
                            	<i class="icon-ok icon-white" title="Activar"></i> Activar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php }else{ ?>
                            <a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/banners/Activar/<?php echo $ls->id_banner?>/<?php echo $ls->bnr_estado?>">
                            <i class="icon-ban-circle icon-white "
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
		  
		  
		  
		  <!-- Fin Tabla -->
		
		</div>
    </div>
</div>     



