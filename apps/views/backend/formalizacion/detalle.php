<script>
    $(document).ready(function() {
        
        $('#myTab').tab();

        $('#myTab a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
    })

</script>

<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 <?php //echo "<pre>"; print_r($data);?>
            <div class="row-fuid">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#agentes">Agentes</a></li>
                    <li><a href="#supervisores" >Supervisores</a></li>
                    
                </ul>

		        <div class="tab-content">
                    <div class="tab-pane active" id="agentes"> 
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                <thead>
                    <tr>
                        <th  height="20">RUT</th>
                        <th>SOCIO</th>
                        <th >TIPO</th>
                        <th >NEGOCIOS</th>
                        <th >PERMANENCIA</th>
                        <th >CAP.PROM</th>
                        <th >COMISION</th> 
                        <th >ANTIGUEDAD</th>
                        <th >PERIODO</th>
                        <th >FECHA CARGA</th>
                        <th >PUNTOS</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                  if (is_array($data)) :
                 foreach ($data as $ls) : 
                ?>
                <tr>
                    <td align="left"><?php echo $ls->RUT?></td>
                    <td align="left"><?php echo $ls->nombre?>&nbsp;<?php echo $ls->apellido?></td>
                    <td align="left"><?php echo $ls->TIPO?>
                    <td align="left"><?php echo $ls->NEGNOAPV + $ls->NEGAPV ?></td>
                    <td align="left"><?php echo $ls->PERM ?></td>
                    <td align="left"><?php echo $ls->CPROM ?></td>
                    <td align="left"><?php echo $ls->COMISION ?></td>
                    <td align="left"><?php echo $ls->ANTIGUEDAD ?></td>
                    <td align="left"><?php echo $ls->PERIODO ?></td>
                    <td align="left"><?php echo setea_fecha($ls->FCARGA) ?></td>
                    <td align="right"><?php echo $ls->PUNTOS ?></td>
                </tr>
                <?php 
                
                 
                
                    endforeach;
                
                   endif; 
                
                 ?>
                
        
    </tbody>
</table>




			        </div>     
<div class="tab-pane" id="supervisores"> 
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example2">
                <thead>
                    <tr>
                        <th width="5%" height="20">RUT</th>
                        <th width="15%">SOCIO</th>
                        <th width="5%">FACTOR</th>
                        <th width="5%">UFAS</th>
                        <th width="5%">PERIODO</th>
                        <th width="5%">FECHA CARGA</th>
                        <th width="5%">PUNTOS</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                  $ls='';
                  if (is_array($sup)) :
                 foreach ($sup as $ls) : 
                ?>
                <tr>
                    <td align="left"><?php echo $ls->RUT?></td>
                    <td align="left"><?php echo $ls->nombre?>&nbsp;<?php echo $ls->apellido?></td>
                    <td align="left"><?php echo $ls->FACTOR ?></td>
                    <td align="left"><?php echo $ls->UFAS ?></td>
                    <td align="left"><?php echo $ls->PERIODO ?></td>
                    <td align="left"><?php echo setea_fecha($ls->FCARGA) ?></td>
                    <td align="right"><?php echo $ls->PUNTOS ?></td>
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
</div>






