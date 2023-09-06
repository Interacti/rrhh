<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
		 	 <?php if ($this->session->flashdata('success')!="") : ?>
    		<div class="alert alert-success">
            <?php 
            echo $this->session->flashdata('success'); 
           	?>
        	</div>
    		<?php endif ?>
           <div class="separador"></div>
          <a href="<? echo BASE_URL ?>bo/proveedor/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                     Agregar Proveedor
            </a>
            <div class="separador"></div>
            <div class="row-fuid">
			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" height="20">ID</th>
                        <th width="5%">RUT</th>
            			<th width="5%">PROVEEDOR</th>
            			<th width="5%">CONTACTO</th>
                        <th width="5%">ESTADO</th>
            			<th width="10%">ACCION</th> 
					</tr>
				</thead>
				<tbody>
		        <?php 
				  if (is_array($data)) :
                 foreach ($data as $ls) : 
                ?>
                <tr>
                    <td align="left"><?php echo $ls->id_proveedor?></td>
                    <td align="left"><?php echo $ls->rut_empresa?></td>
                    <td align="left"><?php echo $ls->nombre_empresa?></td>
                    <td align="left"><?php echo $ls->nombre_contacto?></td>
                    <td align="left"><?php echo $ls->estado==1 ? 'Activo' : 'Inactivo' ?></td>
                    <td align="right">

                     <div class="btn-group">
                            <a class="btn btn-small " href="<?php echo BASE_URL ?>bo/proveedor/Editar/<?php echo $ls->id_proveedor?>">
                            <i class="icon-edit" title="Editar"></i> Editar</a>
                 
    						<a class="btn btn-small " href="<?php echo BASE_URL ?>bo/proveedor/Activar/<?php echo $ls->id_proveedor?>/<?php echo $ls->estado?>">
                            <?php if  ($ls->estado==0){ ?>
                            <i class="icon-ok" title="Activar"></i> Activar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php }else{ ?>
                            <i class="icon-ban-circle " title="Desactivar"></i> Desactivar
                            <?php } ?>
                            </a>
    			    </div>
				   
                  
                       
                    </td>
                </tr>
                <?php 
                
                 
                
                    endforeach;
                
                   endif;   
                
                 ?>
                
		
	</tbody>
</table>
			
		</div>
		 	
		 	</div>
		 </div>
 	</div>
</div>








<