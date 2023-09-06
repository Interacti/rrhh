
<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php

echo $titulo .' de ' .  ucwords(strtolower($socio[0]->nombre)) .' ' . strtolower(ucwords($socio[0]->apellido))

?> 
</strong>
		</div>
		<div class="panel-body">
        
        <h3>Datos del Socio</h3>
        
          <table class="table table-bordered">
            <tr> 
                <th>RUT</th>
                <th>CODIGO</th>
                <th>TIPO</th>
                <th>FECHA INGRESO</th>
                <th>ABONOS</th>
                <th>DESCUENTOS</th>
                <th>DISPONIBLE</th>
            </tr>
            
            <tr>
                <td><?php echo $socio[0]->rut?></td>
                <td><?php echo $socio[0]->codigo?></td>
                <td><?php echo $socio[0]->descripcion?></td>
                <td><?php echo setea_fecha($socio[0]->f_ingreso)?></td>
                <td><?php echo number_format($abono,0,',','.') ;?></td>
                <td><?php echo number_format($descuento[0]->descuento + $canje[0]->canje,0,',','.');?></td>
                <td><?php echo number_format((($abono) - ($descuento[0]->descuento + $canje[0]->canje)),0,',','.');?></td>
            
            </tr>
            
          
          </table>
          
          
            <div style="height: 30px ;"></div>
            
             <h3>Datos Transacciones</h3>
            
             <table cellpadding="0" cellspacing="0" border="0"	class="table  table-hover" id="example">
				<thead>
					<tr>
    					<th >Fecha</th>
                        <th>Descripcion</th>
                        <th>Descuento</th>
                        <th >Abono</th>     
					</tr>
				</thead>
				
                <tbody>
                  <?php 
    
     foreach($data as $crt) :
    
    ?> 
        <tr class="row_inter_1">
        	<td ><?php echo setea_fecha($crt->fecha)?></td>
            <td ><?php echo $crt->descripcion?></td>
           
            <td >
            <?php
                if($crt->tipo_operacion=='-'){
                echo number_format($crt->monto,0,',','.');
                }else {
                    echo "-";
                }
            ?>
            
            </td>
            
            <td > 
            <?php
                if($crt->tipo_operacion=='+'){
                    echo number_format($crt->monto,0,',','.');
                }else {
                    echo "-";
                }
            ?></td> 
            
            
             
        </tr>
        
    <?php endforeach ?>
                </tbody>
                
                <tfoot>
                
                </tfoot>
                </table>
            
            
        
        </div>
    </div>
 </div>       