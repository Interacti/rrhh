

<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 <div class="row-fuid">
           
        	<a href="<?php echo BASE_URL ?>bo/temas/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                     Agregar Tema
            </a>
          
        </div>  
        <div class="separador"></div>
        <div class="row-fluid">
        	<table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
	<thead>
		<tr>
			<th width="1%" height="20">ID</th>
            <th width="15%" height="20">TITULO</th>
            <th width="10%" height="20">SUB CATEGORIA</th>
            <th width="10%" height="20">CATEGORIA</th>
            <th width="5%">FECHA</th>
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
                    <td align="left"><?php echo $ls->id?></td>
                    <td align="left"><?php echo $ls->titulo?></td>   
                    <td align="left"><?php echo $ls->glosa_sub_categoria ?></td>
                    <td align="left"><?php echo $ls->glosa_categoria ?></td>
                    
                    <td align="left"><?php echo $ls->fecha?></td>     
                    <td align="left"><?php echo $ls->estado==1 ? 'Activo' : 'Inactivo' ?></td>
                    <td align="right">
                    

                    <div class="btn-group">
                            <a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/temas/Editar/<?php echo $ls->id?>">
                            <i class="icon-edit" title="Editar"></i> Editar</a>
                  			<?php if  ($ls->estado==0){ ?>
    						<a class="btn btn-small btn-danger  " href="<?php echo BASE_URL ?>bo/temas/Activar/<?php echo $ls->id?>/<?php echo $ls->estado?>">
                            <i class="icon-ok" title="Activar"></i> Activar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php }else{ ?>
                            <a class="btn btn-small btn-success " href="<?php echo BASE_URL ?>bo/temas/Activar/<?php echo $ls->id?>/<?php echo $ls->estado?>">
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



