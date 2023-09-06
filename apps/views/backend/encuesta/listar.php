<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
		 	 
        	</div>
    		
           
          
            <div class="separador"></div>
            <div class="row-fuid">
			
			<table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" height="20">ID</th>
            			<th width="5%">Preg_1</th>
                        <th width="5%">Preg_2</th>
            		    <th width="5%">Preg_3</th>
                        <th width="5%">Preg_4</th>
                       	<th width="5%">Preg_5</th> 
                        <th width="5%">Preg_6</th>
                        <th width="5%">Preg_7</th>
                        <th width="40%">Preg_8</th>
                        <th width="10%">Fecha</th>
                        <th width="10%">Usuario</th>
					</tr>
				</thead>
				<tbody>
		        <?php 
				  if (is_array($data)) :
                 foreach ($data as $ls) : 
                ?>
                <tr>
                    <td align="left"><?php echo $ls->id?></td>
                    <td align="left"><?php echo $ls->preg_1?></td>
                    <td align="left"><?php echo $ls->preg_2?></td>
                    <td align="left"><?php echo $ls->preg_3?></td>
                    <td align="left"><?php echo $ls->preg_4?></td>
                    <td align="left"><?php echo $ls->preg_5?></td>
                    <td align="left"><?php echo $ls->preg_6?></td>
                    <td align="left"><?php echo $ls->preg_7?></td>
                    <td align="left"><?php echo $ls->preg_8?></td>
                    <td align="left"><?php echo $ls->fecha?></td>
                    <td align="left"><?php echo $ls->usuario?></td>
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