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
          <a href="<?php echo BASE_URL ?>bo/formalizacion/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                     Agregar Formalizaci&oacute;n
            </a>
            <div class="separador"></div>
            <div class="row-fuid">
			
			<table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" height="20">ID</th>
            			<th width="15%">DESCRIPCION</th>
                        <th width="10%">PERIODO</th>
            		    <th width="15%">ARCHIVO</th>
                        <th width="10%">FECHA</th>
                       	<th width="5%">ESTADO</th> 
                        <th width="20%">ACCION</th>
					</tr>
				</thead>
				<tbody>
		        <?php 
				  if (is_array($data)) :
                 foreach ($data as $ls) : 
                ?>
                <tr>
                    <td align="left"><?php echo $ls->id?></td>
                    <td align="left"><?php echo $ls->descripcion?></td>
                    <td align="left"><?php echo $ls->mes .'-'. $ls->ano ?></td>
                    <td align="left"><?php echo $ls->archivo?></td>
                    <td align="left"><?php echo $ls->fecha?></td>
                    <td align="left"><?php echo $ls->estado==1 ? 'Activo' : 'Inactivo' ?></td>
                    <td align="right"> 
                        <div class="btn-group">
    						<!--<a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/productos/Editar/<?php echo $ls->id?>">
                            <i class="icon-edit icon-white" title="Editar"></i> </a>-->
    			            <?php  if (!$ls->calculada) :?>    
                                <a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/formalizacion/calcular/<?php echo $ls->id?>">
                                <i class="icon-th-large icon-white" title="Calcular"></i> </a>
        			       	<?php else: ?>
                                <a class="btn btn-small btn-danger disabled" href="javascript:;">
                                <i class="icon-th-large icon-white" title="Calcular"></i> </a>
                            <?php endif ?>  

                               


                            <a class="btn btn-small btn-info" href="<?php echo BASE_URL ?>bo/formalizacion/Detalle/<?php echo $ls->id?>">
                            <i class="icon-list-alt icon-white" title="Detalle"></i></a>
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